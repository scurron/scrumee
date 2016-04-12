<?php

namespace Scrumee\ApiBundle\Client;

use Guzzle\Http\Client as GuzzleClient;

class JiraClient
{
    const REQUEST_OPTIONS_AUTH_NAME = 'auth';

    /**
     * @var \Guzzle\Http\Client
     */
    public $client;

    /**
     * @param GuzzleClient $client
     * @param array $options
     */
    public function __construct(GuzzleClient $client, $options)
    {
        $this->client = $client;

//        echo $options['base_url'];
//        $this->client->setBaseUrl($options['base_url']);
//        $this->client->setConfig([
//                'auh' => [$options['auth']['username'], $options['auth']['password']],
//                'debug' => true
//            ]
//        );

//        $this->client->setDefaultOption('debug', true);
        //$this->setAuth($options['auth']['username'], $options['auth']['password']);
    }

    /**
     * Sets the base url
     *
     * @param string $url Url Base URL of the client
     *
     * @return $this
     */
    public function setBaseUrl($url)
    {
        $this->client->setBaseUrl($url);

        return $this;
    }

    /**
     * Set a default request option on the client that will be used as a default for each request
     *
     * @param string $keyOrPath request.options key (e.g. allow_redirects) or path to a nested key (e.g. headers/foo)
     * @param mixed  $value     Value to set
     *
     * @return $this
     */
    public function setDefaultOption($keyOrPath, $value)
    {
        $this->client->setDefaultOption($keyOrPath, $value);

        return $this;
    }

    /**
     * @param array $options
     *
     * @return $this
     */
    public function setDefaultOptions(array $options)
    {
        if (!empty($options)) {
            foreach ($options as $key => $value) {
                $this->setDefaultOption($key, $value);
            }
        }

        return $this;
    }

    /**
     * Set a default auth request option on the client
     *
     * @param string $username The Jira user name
     * @param string $password The Jira user password
     *
     * @return $this
     */
    public function setAuth($username, $password)
    {
        $this->client->setDefaultOption('auth', [$username, $password]);

        return $this;
    }

    /**
     * @return GuzzleClient
     */
    public function getClient()
    {
        return $this->client;
    }
}
