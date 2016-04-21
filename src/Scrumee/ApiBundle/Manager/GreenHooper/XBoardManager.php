<?php

namespace Scrumee\ApiBundle\Manager\GreenHooper;

use Scrumee\ApiBundle\Entity\GreenHooper\XBoard;
use Scrumee\ApiBundle\Entity\Jira\Issue;
use Scrumee\ApiBundle\Entity\Jira\Project;
use Scrumee\ApiBundle\Entity\Jira\Sprint;

use Scrumee\ApiBundle\Manager\AbstractManager;

/**
 * Class XBoardManager
 * @package Scrumee\ApiBundle\Manager\GreenHooper
 *
 * http://par-jira.us.tripadvisor.local/rest/greenhopper/1.0/rapidviewconfig/editmodel.json?rapidViewId=179
 * http://par-jira.us.tripadvisor.local/rest/greenhopper/1.0/sprintquery/179?includeHistoricSprints=true&includeFutureSprints=true
 * http://par-jira.us.tripadvisor.local/rest/greenhopper/1.0/xboard/work/allData/?rapidViewId=179
 */
class XBoardManager extends AbstractManager
{
    const XBOARD_SPRINT_ACTIVE = 'ACTIVE';
    const XBOARD_SPRINT_CLOSE = 'CLOSED';
    const XBOARD_ISSUE_TYPE_SUB_TASK = 'Sub-task';

    private static $xboard_sprint_status = [
      self::XBOARD_SPRINT_CLOSE => 0,
      self::XBOARD_SPRINT_ACTIVE => 1
    ];

    /**
     * Get All issues related to a rapidViewId
     *
     * @param $rapidViewId
     * @param Project $project
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function getIssues($rapidViewId, Project $project = null)
    {
        $fromUri = sprintf('greenhopper/1.0/xboard/work/allData/?rapidViewId=%d', $rapidViewId);

        $datas = $this->finder->getData($fromUri);
        $decodedData = json_decode($datas);
        $xboard = new XBoard();

        $xboard->setRapidViewId($decodedData->rapidViewId);

        // issues
        foreach($decodedData->issuesData->issues as $key => $data) {

            if ($data->typeName !== self::XBOARD_ISSUE_TYPE_SUB_TASK) {

                $issue = new Issue();
                $issue->setIid($data->id);
                $issue->setKey($data->key);
                $issue->setSummary($data->summary);
                $issue->setIsDone((int) $data->done);
//                $issue->setAssignee($data->assignee);
                $issue->setStatusId($data->statusId);
                $issue->setStatusName($data->statusName);
                $issue->setStatusCategoryKey($data->status->statusCategory->key);
                $issue->setPriority((int) $data->estimateStatistic->statFieldValue->value);


                // project
                if (null === $project) {
                    $project = new Project();
                    $project->setPid($data->projectId);
                }

                $issue->addProject($project);

                $xboard->addIssue($issue);
            }
        }

        // sprints
        foreach ($decodedData->sprintsData->sprints as $key => $data) {
            $sprint = new Sprint();
            $sprint->setSid($data->id);
            $sprint->setName($data->name);
            $sprint->setStartsAt($data->startDate);
            $sprint->setEndsAt($data->endDate);
            $sprint->setDaysRemaining((bool) $data->daysRemaining);
            $sprint->setIsClosed((bool) self::$xboard_sprint_status[$data->state]);

            $xboard->addSprint($sprint);
        }

        // serialize
        $datas = $this->serializer->objectToJson($xboard, 'json');

        return $datas;
    }
} 
