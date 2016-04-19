<?php

namespace Scrumee\ApiBundle\Controller\Jira;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Guzzle\Http\Exception\RequestException;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends FOSRestController implements ClassResourceInterface
{
    /** Returns  */
    public function cgetAction()
    {
        $manager = $this->get('jira_manager.project');
        $response = $manager->getProjects();

        return new Response($response);
    }

    public function getAction($pid)
    {
        $manager = $this->get('jira_manager.project');

        $response = $manager->getProject($pid);

        return new Response($response);
    }
}

