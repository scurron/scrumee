<?php

namespace Scrumee\ApiBundle\Manager\Jira;

use Scrumee\ApiBundle\Entity\Jira\Issue;
use Scrumee\ApiBundle\Entity\Jira\Project;
use Scrumee\ApiBundle\Manager\AbstractManager;

class IssueManager extends AbstractManager
{
    /**
     * Returns all Issues related to a project
     *
     * http://par-jira.us.tripadvisor.local/rest/api/2/search?jql=project=12101
     *
     * @param $projectId
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function getIssues(Project $project)
    {
        $fromUri = sprintf('api/2/search?jql=project=%d', $project->getPid());

        $datas = $this->finder->getData($fromUri);
        $decodedData = json_decode($datas);
        $issues = [];

        // to be refactored
        foreach($decodedData->issues as $key => $data) {
            // issue
            $issue = new Issue();
            $issue->setIid($data->id);
            $issue->setKey($data->key);
            $issue->setSummary($data->fields->summary);
            $issue->setPriority($data->fields->priority->id);

            // must be refactored/optimized
            $issue->setStatus($data->fields->status->name);
            $issue->setStatusCategoryName($data->fields->status->statusCategory->name);

            $issue->setCreatedAt($data->fields->created);
            $issue->setAssignee($data->fields->assignee);
            $issue->setUrl($data->self);

            // project
            $project = new Project();
            $project->setPid($data->fields->project->id);
            $project->setKey($data->fields->project->key);
            $project->setName($data->fields->project->name);
            $project->setUrl($data->fields->project->self);

            $issue->addProject($project);

            $issues[] = $issue;
        }

        // serialize
        $datas = $this->serializer->objectToJson($issues, 'json');

        return $datas;
    }
} 