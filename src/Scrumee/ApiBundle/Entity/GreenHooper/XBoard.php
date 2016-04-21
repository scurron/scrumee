<?php

namespace Scrumee\ApiBundle\Entity\GreenHooper;

use Scrumee\ApiBundle\Entity\Jira\Issue;
use Scrumee\ApiBundle\Entity\Jira\Project;
use Scrumee\ApiBundle\Entity\Jira\Sprint;
use Doctrine\Common\Collections\ArrayCollection;


class XBoard
{
    protected $rapidViewId;
    protected $issues;
    protected $projects;
    protected $sprints;

    public function __construct()
    {
        $this->issues = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->sprints = new ArrayCollection();
    }

    /**
     * @param mixed $rapidViewId
     */
    public function setRapidViewId($rapidViewId)
    {
        $this->rapidViewId = $rapidViewId;
    }

    /**
     * @return mixed
     */
    public function getRapidViewId()
    {
        return $this->rapidViewId;
    }

    /**
     * @param mixed $issues
     */
    public function addIssue(Issue $issues)
    {
        $this->issues->add($issues);
    }

    /**
     * @return mixed
     */
    public function getIssues()
    {
        return $this->issues;
    }

    /**
     * @param mixed $projects
     */
    public function addProject(Project $projects)
    {
        $this->projects->add($projects);
    }

    /**
     * @return mixed
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param mixed $sprints
     */
    public function addSprint(Sprint $sprints)
    {
        $this->sprints->add($sprints);
    }

    /**
     * @return mixed
     */
    public function getSprints()
    {
        return $this->sprints;
    }
} 
