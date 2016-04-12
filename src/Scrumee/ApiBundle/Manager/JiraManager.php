<?php

namespace Scrumee\ApiBundle\Manager;

use Scrumee\ApiBundle\Finder\Finder;

class JiraManager
{
    /**
     * @var Finder
     */
    protected $finder;

    /**
     * @param Finder $finder
     */
    public function __construct(Finder $finder)
    {
        $this->finder = $finder;
    }

    /**
     * Returns all JIRA projects
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function getProjects()
    {
        $fromUri = sprintf('api/2/project');

        return $this->finder->getData($fromUri);
    }

    /**
     * Returns a JIRA project information
     *
     * @param $pid project Id
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function getProject($pid)
    {
        $fromUri = sprintf('api/2/project/%d', $pid);

        return $this->finder->getData($fromUri);
    }
} 
