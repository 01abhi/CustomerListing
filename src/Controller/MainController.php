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
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
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

}
