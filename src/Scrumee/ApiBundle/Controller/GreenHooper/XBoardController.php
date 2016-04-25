<?php

namespace Scrumee\ApiBundle\Controller\GreenHooper;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Guzzle\Http\Exception\RequestException;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Prefix;

/**
 * Class XBoardController
 * @package AppBundle\Controller\GreenHooper
 *
 */
class XBoardController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @Get("/xboard/rapidView/{rvid}", name="get_xboard_rapidview", options={ "method_prefix" = false })
     * @Get("/xboard/rapidView/{rvid}/issues", name="get_xboard_rapidview_issues", options={ "method_prefix" = false })
     *
     * @return Response
     */
    public function cgetAction($rvid)
    {
        $xbMger = $this->get('jira_manager.xboard');
        $response = $xbMger->getIssues($rvid);

        return new Response($response);
    }


    /**
     * @Get("/xboard/rapidView/{rvid}/project/{pid}", name="get_xboard_rapidview_project", options={ "method_prefix" = false })
     * @Get("/xboard/rapidView/{rvid}/project/{pid}/issues", name="get_xboard_rapidview_project_issues", options={ "method_prefix" = false })
     *
     * @return Response
     */
    public function cgetByProjectAction($rvid, $pid)
    {
        $pMger = $this->get('jira_manager.project');
        $project = $pMger->getProject($pid, true);

        $xbMger = $this->get('jira_manager.xboard');
        $response = $xbMger->getIssues($rvid, $project);

        return new Response($response);
    }
}
