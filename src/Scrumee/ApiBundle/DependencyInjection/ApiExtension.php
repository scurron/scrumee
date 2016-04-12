<?php

namespace Scrumee\ApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Serializer\Mapping\Loader\XmlFileLoader;

class ApiExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // guzzle parameters
        $container->setParameter('guzzle_api.options', $config['guzzle_parameters']['options']);

        // jira parameters
        $container->setParameter('jira_api.parameters', $config['jira_parameters']);
        $container->setParameter('jira_api.base_url', $config['jira_parameters']['base_url']);
        $container->setParameter('jira_api.auth', $config['jira_parameters']['auth']);
        $container->setParameter('jira_api.projects_uuid', $config['jira_parameters']['projects']['uuid']);



        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('services.yml');
    }
} 
