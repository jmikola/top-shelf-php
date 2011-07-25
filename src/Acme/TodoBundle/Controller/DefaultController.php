<?php

namespace Acme\TodoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Acme\TodoBundle\Document\Todo;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/todo", name="todo_list")
     * @Template()
     */
    public function indexAction()
    {
        $todos = $this->get('doctrine.odm.mongodb.document_manager')
            ->getRepository('AcmeTodoBundle:Todo')
            ->findAll();

        if (!$todos) {
            throw $this->createNotFoundException('No Todos found');
        }

        return array('todos' => $todos);    
    }
    
    /**
     * @Route("/todo/create", name="todo_create")
     * @Template()
     */
    public function createAction()
    {
        $todo = new Todo();
        $todo->setName('A Foo Bar');
        $todo->setDescription('A Foo Bar');
        
        $created = time();
        $todo->setCreatedAt($created);

        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $dm->persist($todo);
        $dm->flush();

        return new Response('Created Todo id '.$todo->getId());
    }

    /**
     * @Route("/todo/update/{id}", name="todo_update")
     */
    public function updateAction($id)
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $todo = $dm->getRepository('AcmeTodoBundle:Todo')->find($id);

        if (!$todo) {
            throw $this->createNotFoundException('No Todo found for id '.$id);
        }

        $todo->setName('New Todo name!');
        $dm->flush();

        return $this->redirect($this->generateUrl('homepage'));
    }
 
 
    /**
     * @Route("/todo/complete/{id}", name="todo_complete")
     */
    public function completeAction($id)
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $todo = $dm->getRepository('AcmeTodoBundle:Todo')->find($id);

        if (!$todo) {
            throw $this->createNotFoundException('No Todo found for id '.$id);
        }

        $completed = time();
        $todo->setCompletedAt($completed);
        $dm->flush();

        return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @Route("/todo/delete/{id}", name="todo_delete")
     */
    public function deleteAction($id)
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $todo = $dm->getRepository('AcmeTodoBundle:Todo')->find($id);

        if (!$todo) {
            throw $this->createNotFoundException('No Todo found for id '.$id);
        }

        $dm->remove($todo);
        $dm->flush();

        return $this->redirect($this->generateUrl('homepage'));
    }
   
    /**
     * @Route("/todo/show/{id}", name="todo_show")
     * @Template()
     */
    public function showAction($id)
    {
        $todo = $this->get('doctrine.odm.mongodb.document_manager')
            ->getRepository('AcmeTodoBundle:Todo')
            ->find($id);

        if (!$todo) {
            throw $this->createNotFoundException('No Todo found for id '.$id);
        }

        return array('todo' => $todo);
    }
}
