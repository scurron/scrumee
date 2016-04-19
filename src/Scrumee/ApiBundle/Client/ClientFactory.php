<?php

namespace Scrumee\ApiBundle\Client;

use Guzzle\Http\Client as GuzzleClient;
use Scrumee\ApiBundle\Client\ApiClient;

class ClientFactory
{
    /**
     * Creates Jira Client
     *
     * @param array $guzzleOptions
     * @param array $jiraOptions
     *
     * @return JiraClient
     */
    public static function createJiraClient(array $guzzleOptions, array $jiraOptions)
    {
        $guzzleClient = new GuzzleClient();

        return new ApiClient($guzzleClient, $jiraOptions);
    }

    /**
     * {@inheritdoc}
     */
//    public static function createGreenHooperClient(array $options)
//    {
//        return new GuzzleClient($options);
//    }

}

