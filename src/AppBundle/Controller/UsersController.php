<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersController extends Controller
{
    /**
     * @Route("/api/users/me", name="api_users_me")
     * @Method({"GET"})
     */
    public function meAction(Request $request)
    {
    	$user = $this->getUser();

        return new JsonResponse([
        	'username'=>$user->getUsername()
        ]);
    }
}
