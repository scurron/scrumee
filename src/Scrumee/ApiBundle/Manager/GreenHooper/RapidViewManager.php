<?php

namespace Scrumee\ApiBundle\Manager\GreenHooper;

use Scrumee\ApiBundle\Entity\GreenHooper\RapidView;
use Scrumee\ApiBundle\Manager\AbstractManager;

class RapidViewManager extends AbstractManager
{
    /**
     * Returns all rapidViews
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function getRapidViews($rvid)
    {
        /**
         * http://par-jira.us.tripadvisor.local/rest/greenhopper/1.0/rapidviews/list
         * http://par-jira.us.tripadvisor.local/rest/greenhopper/1.0/rapidview
         */
        $fromUri = sprintf('greenhopper/1.0/rapidviews');

        $datas = $this->finder->getData($fromUri);
        $decodedData = json_decode($datas);
        $reviews = [];

        // to be refactored
        foreach($decodedData->views as $key => $data) {
            // review
            $review = new RapidView();
            $review->setRvid($data->id);
            $review->setName($data->name);
            $review->setSprintSupportEnabled($data->sprintSupportEnabled);

            $reviews[] = $review;
        }

        // serialize
        $datas = $this->serializer->objectToJson($reviews, 'json');

        return $datas;
    }

    public function getRapidView($rvid)
    {
        $fromUri = sprintf('greenhopper/1.0/rapidview/%d', $rvid);

        $datas = $this->finder->getData($fromUri);
        $decodedData = json_decode($datas);
        $reviews = [];

        // review
        $review = new RapidView();
        $review->setRvid($decodedData->id);
        $review->setName($decodedData->name);
        $review->setSprintSupportEnabled($decodedData->sprintSupportEnabled);

        // serialize
        $datas = $this->serializer->objectToJson($review, 'json');

        return $datas;

    }
} 
