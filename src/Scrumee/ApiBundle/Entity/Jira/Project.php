<?php

namespace Scrumee\ApiBundle\Entity\Jira;

/**
 * Class Project
 * @package Scrumee\ApiBundle\Entity\Jira
 *
 * http://par-jira.us.tripadvisor.local/rest/api/2/project
 * http://par-jira.us.tripadvisor.local/rest/api/2/project/12101
 */
class Project
{
    /** @var integer */
    protected $pid;
    /** @var string */
    protected $key;
    /** @var string */
    protected $name;
    /** @var string */
    protected $url;
    /** @var Category */
    protected $category;

    /**
     * @param $pid
     *
     * @return $this
     */
    public function setPid($pid)
    {
        $this->pid = $pid;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $category
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }
}

