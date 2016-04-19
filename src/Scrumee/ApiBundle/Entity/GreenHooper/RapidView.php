<?php

namespace Scrumee\ApiBundle\Entity\GreenHooper;


/**
 * Class RapidView
 *
 * http://par-jira.us.tripadvisor.local/rest/greenhopper/1.0/rapidviews/list
 * http://par-jira.us.tripadvisor.local/rest/greenhopper/1.0/rapidview
 */
class RapidView
{
    /** @var integer */
    protected $rvid;
    /** @var string */
    protected $name;
    /** @var boolean */
    protected $sprintSupportEnabled;

    /**
     * @param int $rvid
     */
    public function setRvid($rvid)
    {
        $this->rvid = $rvid;
    }
    /**
     * @return int
     */
    public function getRvid()
    {
        return $this->rvid;
    }
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param boolean $sprintSupportEnabled
     */
    public function setSprintSupportEnabled($sprintSupportEnabled)
    {
        $this->sprintSupportEnabled = $sprintSupportEnabled;
    }
    /**
     * @return boolean
     */
    public function getSprintSupportEnabled()
    {
        return $this->sprintSupportEnabled;
    }
}
