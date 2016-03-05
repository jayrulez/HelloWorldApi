<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/create_client", name="create_client")
     */
    public function createClientAction()
    {
        $clientManager = $this->get('fos_oauth_server.client_manager.default');
        $client = $clientManager->createClient();
        $client->setRedirectUris(array('http://localhost:8000'));
        $client->setAllowedGrantTypes(array('token', 'authorization_code', 'client_credentials', 'password'));
        $clientManager->updateClient($client);
        return new JsonResponse([
            "client_id" => $client->getId() . "_" . $client->getRandomId(),
            "client_secret" => $client->getSecret()
        ]);
    }
}
