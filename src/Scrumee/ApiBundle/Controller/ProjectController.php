<?php

namespace Scrumee\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Guzzle\Http\Exception\RequestException;
use Symfony\Component\HttpFoundation\Response;


use Guzzle\Http\Client;

class ProjectController extends FOSRestController implements ClassResourceInterface
{
    /** Returns  */
    public function cgetAction()
    {
        $manager = $this->get('jira_manager');
        $response = $manager->getProjects();

        print_r($response);
        exit;
//
//        return new Response($response);
    }

//    public function getAction($uuid)
//    {
//        $client = $this->get('jira.client')->getClient();
//        $url = 'api/2/project/%d';
//        $request = $client->get(sprintf($url, $uuid));
//        $response = $client->send($request)->getBody(true);
//
//        return new Response($response);
//    }
}

