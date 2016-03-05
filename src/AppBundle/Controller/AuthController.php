<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\User;

class AuthController extends Controller
{
    /**
     * @Route("/api/register", name="api_register")
     * @Method({"POST"})
     */
    public function registerAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();

    	$user = new User();

    	$username = $request->request->get('username');
    	$password = $request->request->get('password');

    	$user
    		->setUsername($username)
    		->setPassword($password)
    		->setCreatedAt(new \DateTime('now'));

    	$errors = $this->get('validator')->validate($user);

    	if(count($errors) > 0)
    	{
        	return new JsonResponse([
        		'error' => $errors[0]->getMessage()
        	]);
    	}

    	$user->setPassword($this->get('security.password_encoder')->encodePassword($user, $user->getPassword()));

    	$em->persist($user);

    	$em->flush();

        return new JsonResponse([
        	'username'=>$user->getUsername()
        ]);
    }
}
