<?php

namespace ReferralsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;
use Symfony\Component\Validator\Constraints as Assert;
use ReferralsBundle\DBAL\Types\ReferralStatusType;

/**
 * Referral
 *
 * @ORM\Table(name="referral")
 * @ORM\Entity(repositoryClass="ReferralsBundle\Repository\ReferralRepository")
 */
class Referral
{
    public function __construct(array $data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    public function setData(array $data)
    {
        $this->setTitle($data['title']);
        $this->setFirstName($data['firstName']);
        $this->setSurname($data['surname']);
        $this->setDateOfBirth($data['dateOfBirth']);
        $this->setEmail($data['email']);
        $this->setMobilePhone($data['mobilePhone']);
        $this->setAddress1($data['address1']);
        $this->setAddress2($data['address2']);
        $this->setAddress3($data['address3']);
        $this->setPostcode($data['postcode']);
        $this->setStatus($data['status']);
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="first_name", type="string", length=100)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=100)
     */
    private $surname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="datetime")
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile_phone", type="string", length=50)
     */
    private $mobilePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="address_1", type="string", length=100)
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address_2", type="string", length=100)
     */
    private $address2;

    /**
     * @var string
     *
     * @ORM\Column(name="address_3", type="string", length=100)
     */
    private $address3;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=20)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="ReferralStatusType", length=8)
     * @DoctrineAssert\Enum(entity="ReferralsBundle\DBAL\Types\ReferralStatusType")
     */
    private $status;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Referral
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Referral
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Referral
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return Referral
     */
    public function setDateOfBirth(\DateTime $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Referral
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set mobilePhone
     *
     * @param string $mobilePhone
     *
     * @return Referral
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get mobilePhone
     *
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return Referral
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return Referral
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set address3
     *
     * @param string $address3
     *
     * @return Referral
     */
    public function setAddress3($address3)
    {
        $this->address3 = $address3;

        return $this;
    }

    /**
     * Get address3
     *
     * @return string
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return Referral
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Referral
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
