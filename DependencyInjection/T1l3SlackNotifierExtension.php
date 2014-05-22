<?php

namespace T1l3\SlackNotifierBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class T1l3SlackNotifierExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('t1l3_slack_notifier.team', $config['team']);
        $container->setParameter('t1l3_slack_notifier.token', $config['token']);


        // $container
        //     ->setDefinition(
        //         't1l3_slack_notifier_client',
        //         new Definition(
        //             '%slack_notifier.client.class%',
        //             array('%t1l3_slack_notifier.team%', '%t1l3_slack_notifier.token%')
        //         )
        //     )
        // ;

        // $container
        //     ->setDefinition(
        //         't1l3_slack_notifier',
        //         new Definition(
        //             '%slack_notifier.notifier.class%',
        //             array(new Reference('t1l3_slack_notifier_client'))
        //         )
        //     )
        // ;

    }
}
