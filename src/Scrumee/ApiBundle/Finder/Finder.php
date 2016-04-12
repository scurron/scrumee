<?php

namespace Scrumee\ApiBundle\Finder;

use Scrumee\ApiBundle\Finder\FinderInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Scrumee\ApiBundle\Client\JiraClient;

class Finder implements FinderInterface
{
    use ContainerAwareTrait;

    /** @var \Guzzle\Http\Client */
    protected $client;

    /**
     * @param JiraClient $client
     */
    public function __construct(JiraClient $client)
    {
        $this->client = $client->getClient();
    }

    /**
     * Returns an array of Response objects
     *
     * @param string $fromUri The relative URI
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function getData($fromUri)
    {
        $request = $this->client->get($fromUri);
        $response = $this->client
            ->send($request)
            ->getBody(true)
        ;

        return $response;
    }
}
