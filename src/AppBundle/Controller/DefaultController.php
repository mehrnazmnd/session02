<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }

    /**
     * @Route("/test/{name}/{ln}/{age}", name="testpage")
     */
    public function testAction(Request $request) {

        $age = $request->get('age');
        $name = $request->get('name');
        $ln = $request->get('ln');
//        return new Response("Hello:" . $name . " " . $ln . " ($age)");
        $session = $request->getSession();
        $session->set("username","$name $ln");
        return $this->redirectToRoute("hipage");
        

//        return $this->render('default/test.html.twig', array('name'=>$name,'ln'=>$ln));
    }
    
    /**
     * @Route("/hi", name="hipage")
     */
    public function hiAction(Request $request) {

        $session = $request->getSession();
//        return new Response("Hello:" . $name . " " . $ln . " ($age)");
        
        $name = $session->get("username");

        return $this->render('default/hi.html.twig', array('name'=>$name));
    }

}
