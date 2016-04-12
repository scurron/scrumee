<?php

namespace Scrumee\ApiBundle\Client;

use Guzzle\Http\Client as GuzzleClient;
use Scrumee\ApiBundle\Client\JiraClient;

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

//        print_r($guzzleOptions);
//        exit;

        return new JiraClient($guzzleClient, $jiraOptions);
    }

    /**
     * {@inheritdoc}
     */
//    public static function createGreenHooperClient(array $options)
//    {
//        return new GuzzleClient($options);
//    }

}
