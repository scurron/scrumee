<?php

namespace Scrumee\ApiBundle\Manager\Jira;

use Scrumee\ApiBundle\Manager\AbstractManager;
use Scrumee\ApiBundle\Entity\Jira\Project;
use Scrumee\ApiBundle\Entity\Jira\Sprint;

class SprintManager extends AbstractManager
{
    /**
     * Returns all Sprints related to a project
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function getSprints(Project $project)
    {
        $fromUri = sprintf('greenhopper/1.0/integration/teamcalendars/sprint/list?jql=project=%d', $project->getPid());

        $datas = $this->finder->getData($fromUri);
        $decodedData = json_decode($datas);
        $sprints = [];

        // to be refactored
        foreach($decodedData->sprints as $key => $data) {
            // sprint
            $sprint = new Sprint();
            $sprint->setSid($data->id);
            $sprint->setName($data->name);
            $sprint->setStartsAt($data->start);
            $sprint->setEndsAt($data->end);
            $sprint->setIsClosed($data->closed);
            $sprint->setUrl($data->viewBoardsUrl);

            foreach($data->projects as $project) {
                $relatedProject = new Project();
                $relatedProject->setKey($project->key);
                $relatedProject->setName($project->name);

                $sprint->addProject($relatedProject);
            }

            $sprints[] = $sprint;
        }

        // serialize
        $datas = $this->serializer->objectToJson($sprints, 'json');

        return $datas;
    }
}

