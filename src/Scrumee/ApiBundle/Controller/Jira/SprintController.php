<?php

namespace Scrumee\ApiBundle\Controller\Jira;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Guzzle\Http\Exception\RequestException;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;

class SprintController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @param integer $projectId
     *
     * @return Response
     */
    public function cgetAction($pid)
    {
        $pMger = $this->get('jira_manager.project');
        $project = $pMger->getProject($pid, true);

        $sMger = $this->get('jira_manager.sprint');
        $response = $sMger->getSprints($project);

        return new Response($response);
    }
}

