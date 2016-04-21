<?php

namespace Scrumee\ApiBundle\Controller\Jira;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Guzzle\Http\Exception\RequestException;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;

class ProjectController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @return Response
     */
    public function cgetAction()
    {
        $manager = $this->get('jira_manager.project');
        $response = $manager->getProjects();

        return new Response($response);
    }

    /**
     * @param integer $pid
     *
     * @return Response
     */
    public function getAction($pid)
    {
        $manager = $this->get('jira_manager.project');

        $response = $manager->getProject($pid);

        return new Response($response);
    }

    /**
     * @Get("/projects/{pid}/sprints", name="get_project_sprints", options={ "method_prefix" = false })
     *
     * @param integer $projectId
     *
     * @return Response
     */
    public function sprintAction($pid)
    {
        $pMger = $this->get('jira_manager.project');
        $project = $pMger->getProject($pid, true);

        $sMger = $this->get('jira_manager.sprint');
        $response = $sMger->getSprints($project);

        return new Response($response);
    }

    /**
     * @Get("/projects/{pid}/issues", name="get_project_issues", options={ "method_prefix" = false })
     *
     * @param integer $projectId
     *
     * @return Response
     */
    public function issueAction($pid)
    {
        $pMger = $this->get('jira_manager.project');
        $project = $pMger->getProject($pid, true);

        $sMger = $this->get('jira_manager.issue');
        $response = $sMger->getIssues($project);

        return new Response($response);
    }
}

