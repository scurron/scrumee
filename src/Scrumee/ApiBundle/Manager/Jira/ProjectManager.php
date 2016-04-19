<?php

namespace Scrumee\ApiBundle\Manager\Jira;

use Scrumee\ApiBundle\Manager\AbstractManager;
use Scrumee\ApiBundle\Entity\Jira\Project;
use Scrumee\ApiBundle\Entity\Jira\Category;
use Scrumee\ApiBundle\Entity\Jira\Sprint;
use Doctrine\Common\Collections\ArrayCollection;

class ProjectManager extends AbstractManager
{
    /**
     * Returns all JIRA projects
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function getProjects($returnObjectDatas = AbstractManager::RETURN_OBJECT_DATAS)
    {
        $fromUri = sprintf('api/2/project');

        $datas = $this->finder->getData($fromUri);
        $decodedData = json_decode($datas);
        $projects = new ArrayCollection;

        // to be refactored
        foreach($decodedData as $key => $data) {
            // project
            $project = new Project();
            $project->setPid($data->id);
            $project->setKey($data->key);
            $project->setName($data->name);
            $project->setUrl($data->self);

            // category
            $category = new Category();
            $category->setName(!isset($data->projectCategory) ?: $data->projectCategory->name);
            $category->setCid(!isset($data->projectCategory) ?: $data->projectCategory->id);
            $category->setDescription(!isset($data->projectCategory) ?: $data->projectCategory->description);
            $category->setUrl(!isset($data->projectCategory) ?: $data->projectCategory->self);

            // project's category
            $project->setCategory($category);

            $projects->add($project);
        }

        // object data
        if ($returnObjectDatas) {
            return $projects;
        }

        // json data
        return $this->serializer->objectToJson($projects, 'json');
    }

    /**
     * Returns a JIRA project information
     *
     * @param $pid project Id
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function getProject($pid, $returnObjectDatas = AbstractManager::RETURN_OBJECT_DATAS)
    {
        $fromUri = sprintf('api/2/project/%d', $pid);

        $data = $this->finder->getData($fromUri);
        $decodedData = json_decode($data);

        // to be refactored
        $project = new Project();
        $project->setPid($decodedData->id);
        $project->setName($decodedData->name);
        $project->setKey($decodedData->key);
        $project->setUrl($decodedData->self);

        // category
        $category = new Category();
        $category->setName(!isset($decodedData->projectCategory) ?: $decodedData->projectCategory->name);
        $category->setCid(!isset($decodedData->projectCategory) ?: $decodedData->projectCategory->id);
        $category->setDescription(!isset($decodedData->projectCategory) ?: $decodedData->projectCategory->description);
        $category->setUrl(!isset($decodedData->projectCategory) ?: $decodedData->projectCategory->self);

        $project->setCategory($category);

        // object data
        if ($returnObjectDatas) {
            return $project;
        }

        // json data
        return $this->serializer->objectToJson($project, 'json');
    }


}
