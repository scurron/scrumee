<?php

namespace Scrumee\ApiBundle\Controller\Jira;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Guzzle\Http\Exception\RequestException;
use Symfony\Component\HttpFoundation\Response;

class SprintController extends FOSRestController implements ClassResourceInterface
{
    /** Returns  */
    public function cgetAction($projectId)
    {
        $projectId = 12101;
        $pMger = $this->get('jira_manager.project');
        $project = $pMger->getProject($projectId, true);

        $sMger = $this->get('jira_manager.sprint');
        $response = $sMger->getSprints($project);

        return new Response($response);
    }
}

