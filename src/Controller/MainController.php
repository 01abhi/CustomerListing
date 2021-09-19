<?php

namespace App\Controller;

use App\Entity\CustomerData;
use App\Form\CustomerDataType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    
    public function index(): Response
    {   
        $data = $this->getDoctrine()->getRepository(CustomerData::class)->findAll();
        return $this->render('main/index.html.twig', [
            'list' => $data
        ]);
    }

    /**
     * @Route("/addcustomer", name="addcustomer")
     */
    public function addcustomer(Request $request){
        $customerdata = new CustomerData();
        $form = $this->createForm(CustomerDataType::class, $customerdata);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($customerdata);
            $em->flush();

            $this->addFlash(
               'notice',
               'Submitted Successfully'
            );
            return $this->redirectToRoute('main');
        }
        

        return $this->render('main/addcustomer.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/update/{id}", name="update")
     */

    public function update(Request $request, $id){
        
        $customerdata = $this->getDoctrine()->getRepository(CustomerData::class)->find($id);
        $form = $this->createForm(CustomerDataType::class, $customerdata);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($customerdata);
            $em->flush();

            $this->addFlash(
               'notice',
               'Updated Successfully'
            );
            return $this->redirectToRoute('main');
        }
        return $this->render('main/update.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id){
        $data = $this->getDoctrine()->getRepository(CustomerData::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('notice','Customer Deleted Successfully');

        return $this->redirectToRoute('main');

    }

}
