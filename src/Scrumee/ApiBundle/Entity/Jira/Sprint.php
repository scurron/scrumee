<?php

namespace Scrumee\ApiBundle\Entity\Jira;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Sprint
 * http://par-jira.us.tripadvisor.local/secure/GHGoToBoard.jspa?sprintId=698 / Sprint info
 * http://par-jira.us.tripadvisor.local/rest/greenhopper/1.0/integration/teamcalendars/sprint/list?jql=project=12101
 */
class Sprint
{
    /** @var integer $id */
    protected $sid;
    /** @var string */
    protected $name;
    /** @var \Datetime */
    protected $startsAt;
    /** @var \Datetime */
    protected $endsAt;
    /** @var boolean */
    protected $isClosed;
    /** @var integer */
    protected $daysRemaining;
    /** @var string */
    protected $projects;
    /** @var string */
    protected $url;


    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    /**
     * @param integer $sid
     */
    public function setSid($sid)
    {
        $this->sid = $sid;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param boolean $isClosed
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * @param int $daysRemaining
     */
    public function setDaysRemaining($daysRemaining)
    {
        $this->daysRemaining = $daysRemaining;
    }

    /**
     * @return int
     */
    public function getDaysRemaining()
    {
        return $this->daysRemaining;
    }


    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $startsAt
     */
    public function setStartsAt($startsAt)
    {
        $this->startsAt = $startsAt;

        return $this;
    }

    /**
     * @return
     */
    public function getStartsAt()
    {
        return $this->startsAt;
    }

    /**
     * @param $endsAt
     */
    public function setEndsAt($endsAt)
    {
        $this->endsAt = $endsAt;

        return $this;
    }

    /**
     * @return
     */
    public function getEndsAt()
    {
        return $this->endsAt;
    }

    /**
     * @param Project $project
     */
    public function addProject(Project $project)
    {
        $this->projects->add($project);

        return $this;
    }

    /**
     * @return Project
     */
    public function getProjects()
    {
        return $this->projects;
    }
}
