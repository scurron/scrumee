<?php

namespace Scrumee\ApiBundle\Entity\Jira;

/**
 * Class Category
 * @package Scrumee\ApiBundle\Entity\Jira
 *
 * http://par-jira.us.tripadvisor.local/rest/api/2/project
 */
class Category
{
    /** @var string */
    protected $url;
    /** @var integer */
    protected $cid;
    /** @var string */
    protected $description;
    /** @var string */
    protected $name;

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param integer $id
     */
    public function setCid($cid)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCid()
    {
        return $this->cid;
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
}

