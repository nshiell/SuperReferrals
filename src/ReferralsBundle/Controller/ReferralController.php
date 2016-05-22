<?php

namespace ReferralsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ReferralsBundle\Entity\Referral;
use ReferralsBundle\Form\ReferralType;
use ReferralsBundle\DBAL\Types\ReferralStatusType;

/**
 * Referral controller.
 *
 */
class ReferralController extends Controller
{
    /**
     * Lists all Referral entities.
     *
     * @Route("/", name="referral_index")
     * @Route("/{status}", name="referral_index1", requirements={"status"="referred|accepted|rejected"})
     * @Method("GET")
     */
    public function indexAction($status = null)
    {
        $em = $this->getDoctrine()->getManager();

        $referralRepo = $em->getRepository('ReferralsBundle:Referral');
        $referrals = ($status)
            ? $referralRepo->findByStatus($status)
            : $referralRepo->findAll();

        return $this->render('referral/index.html.twig', array(
            'referrals' => $referrals,
            'statuses'  => ReferralStatusType::getChoices()
        ));
    }

    /**
     * Creates a new Referral entity.
     *
     * @Route("/new", name="referral_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $referral = new Referral();
        $form = $this->createForm('ReferralsBundle\Form\ReferralType', $referral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($referral);
            $em->flush();

            return $this->redirectToRoute('referral_show', array('id' => $referral->getId()));
        }

        return $this->render('referral/new.html.twig', array(
            'referral' => $referral,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Referral entity.
     *
     * @Route("/{id}", name="referral_show")
     * @Method("GET")
     */
    public function showAction(Referral $referral)
    {
        $deleteForm = $this->createDeleteForm($referral);

        return $this->render('referral/show.html.twig', array(
            'referral' => $referral,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Referral entity.
     *
     * @Route("/{id}/edit", name="referral_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Referral $referral)
    {
        $deleteForm = $this->createDeleteForm($referral);
        $editForm = $this->createForm('ReferralsBundle\Form\ReferralType', $referral);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($referral);
            $em->flush();

            return $this->redirectToRoute('referral_edit', array('id' => $referral->getId()));
        }

        return $this->render('referral/edit.html.twig', array(
            'referral' => $referral,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Referral entity.
     *
     * @Route("/{id}", name="referral_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Referral $referral)
    {
        $form = $this->createDeleteForm($referral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($referral);
            $em->flush();
        }

        return $this->redirectToRoute('referral_index');
    }

    /**
     * Creates a form to delete a Referral entity.
     *
     * @param Referral $referral The Referral entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Referral $referral)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('referral_delete', array('id' => $referral->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
