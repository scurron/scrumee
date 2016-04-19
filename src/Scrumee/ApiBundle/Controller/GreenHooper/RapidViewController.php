<?php

namespace Scrumee\ApiBundle\Controller\GreenHooper;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Guzzle\Http\Exception\RequestException;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;

class RapidViewController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @Get("/rapidViews", name="get_rapid_views", options={ "method_prefix" = false })
     *
     * @return Response
     */
    public function cgetAction()
    {
        $rvMger = $this->get('jira_manager.rapid_view');
        $response = $rvMger->getRapidViews();


        return new Response($response);
    }

    /**
     * @Get("/rapidView/{rvid}", name="get_rapid_view", options={ "method_prefix" = false })
     *
     * @param $rvid
     *
     * @return Response
     */
    public function getAction($rvid)
    {
        $manager = $this->get('jira_manager.rapid_view');

        $response = $manager->getRapidView($rvid);

        return new Response($response);
    }
} 
