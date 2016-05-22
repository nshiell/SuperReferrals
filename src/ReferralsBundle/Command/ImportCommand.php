<?php

namespace ReferralsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use ReferralsBundle\Entity\Referral;

class ImportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('import')
            ->setDescription('Import data')
        ;
    }

    /**
     * Will return an array of data, maybe for real
     * the data would be csv?
     * @return array
     */
    protected function getData()
    {
        return
            [
                [
                'title' => 'Mr',
                'firstName' => 'John',
                'surname' => 'Smith',
                'dateOfBirth' => new \Datetime('2011-05-02'),
                'email' => 'sdg@sfgh.com',
                'mobilePhone' => '0354867',
                'address1' => '1 ad1',
                'address2' => '2 ad 2',
                'address3' => '3 ad 3',
                'postcode' => 'IG1 1WW',
                'status' => 'referred'
            ],
            [
                'title' => 'Mr',
                'firstName' => '',
                'surname' => 'MissingFirstName!',
                'dateOfBirth' => new \Datetime('2011-05-02'),
                'email' => 'sdg@sfgh.com',
                'mobilePhone' => '0354867',
                'address1' => '1 ad1',
                'address2' => '2 ad 2',
                'address3' => '3 ad 3',
                'postcode' => 'IG1 1WW',
                'status' => 'referred'
            ],
            [
                'title' => 'Mr',
                'firstName' => 'Bob',
                'surname' => 'Smith',
                'dateOfBirth' => new \Datetime('2011-05-02'),
                'email' => 'sdg@sfgh.com',
                'mobilePhone' => '0354867',
                'address1' => '1 ad1',
                'address2' => '2 ad 2',
                'address3' => '3 ad 3',
                'postcode' => 'IG1 1WW',
                'status' => 'badStatus'
            ]
        ];
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $validator = $container->get('validator');
        $em = $container->get('doctrine')->getManager();

        $totalImported = 0;
        foreach ($this->getData() as $i => $referralRaw) {
            $referral = new Referral($referralRaw);
            $errors = $validator->validate($referral);

            if (count($errors) > 0) {
                /*
                 * Uses a __toString method on the $errors variable which is a
                 * ConstraintViolationList object. This gives us a nice string
                 * for debugging.
                 */
                $output->writeln([
                    'Referral invalid index: '.$i,
                    'Reasons: -',
                    (string) $errors,
                    null
                ]);
                continue;
            }

            $em->persist($referral);
            $em->flush();
            $totalImported++;
        }
        $output->writeln('Total imported: ' . $totalImported);
    }

}
