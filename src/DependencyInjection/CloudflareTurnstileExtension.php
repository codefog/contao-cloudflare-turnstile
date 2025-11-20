<?php

namespace Codefog\CloudflareTurnstileBundle\DependencyInjection;

use Codefog\CloudflareTurnstileBundle\CloudflareTurnstileClient;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class CloudflareTurnstileExtension extends ConfigurableExtension
{
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container): void
    {
        $loader = new PhpFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('services.php');

        $definition = $container->getDefinition(CloudflareTurnstileClient::class);
        $definition->setArgument('$secretKey', $mergedConfig['secret_key']);
        $definition->setArgument('$siteKey', $mergedConfig['site_key']);
    }
}
