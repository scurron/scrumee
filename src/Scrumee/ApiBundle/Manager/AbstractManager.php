<?php

namespace Scrumee\ApiBundle\Manager;

use Scrumee\ApiBundle\Finder\Finder;
use Scrumee\ApiBundle\Serializer\Serializer;

class AbstractManager
{
    const RETURN_OBJECT_DATAS = false;

    /** @var Finder */
    protected $finder;
    /** @var  Serializer */
    protected $serializer;

    /**
     * @param Finder        $finder
     * @param Serializer    $serializer
     */
    public function __construct(Finder $finder, Serializer $serializer)
    {
        $this->finder = $finder;
        $this->serializer = $serializer;
    }
}
