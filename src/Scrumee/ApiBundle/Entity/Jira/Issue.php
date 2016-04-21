<?php

namespace Scrumee\ApiBundle\Entity\Jira;

use Scrumee\ApiBundle\Entity\Jira\Project;

class Issue
{
    protected $iid;
    protected $isDone;
    protected $key;
    protected $summary;
    protected $priority;
    protected $status;
    protected $statusId;
    protected $statusName;
    protected $statusCategoryName;
    protected $statusCategoryKey;
    protected $createdAt;
    protected $assignee;
    protected $url;
    protected $project;

    /**
     * @param mixed $iid
     */
    public function setIid($iid)
    {
        $this->iid = $iid;
    }

    /**
     * @return mixed
     */
    public function getIid()
    {
        return $this->iid;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @param mixed $isDone
     */
    public function setIsDone($isDone)
    {
        $this->isDone = $isDone;
    }

    /**
     * @return mixed
     */
    public function getIsDone()
    {
        return $this->isDone;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }


    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $statusId
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;
    }

    /**
     * @return mixed
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @param mixed $statusName
     */
    public function setStatusName($statusName)
    {
        $this->statusName = $statusName;
    }

    /**
     * @return mixed
     */
    public function getStatusName()
    {
        return $this->statusName;
    }

    /**
     * @param mixed $statusCategoryName
     */
    public function setStatusCategoryName($statusCategoryName)
    {
        $this->statusCategoryName = $statusCategoryName;
    }

    /**
     * @return mixed
     */
    public function getStatusCategoryName()
    {
        return $this->statusCategoryName;
    }

    /**
     * @param mixed $statusCategoryKey
     */
    public function setStatusCategoryKey($statusCategoryKey)
    {
        $this->statusCategoryKey = $statusCategoryKey;
    }

    /**
     * @return mixed
     */
    public function getStatusCategoryKey()
    {
        return $this->statusCategoryKey;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $assignee
     */
    public function setAssignee($assignee)
    {
        $this->assignee = $assignee;
    }

    /**
     * @return mixed
     */
    public function getAssignee()
    {
        return $this->assignee;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $project
     */
    public function addProject(Project $project)
    {
        $this->project = $project;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }
}


