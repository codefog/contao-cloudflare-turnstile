<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Codefog\CloudflareTurnstileBundle\CloudflareTurnstileClient;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services
        ->defaults()
        ->autoconfigure()
    ;

    $services
        ->load('Codefog\\CloudflareTurnstileBundle\\', __DIR__.'/../src')
        ->exclude(__DIR__.'/../src/ContaoManager')
        ->exclude(__DIR__.'/../src/DependencyInjection')
        ->exclude(__DIR__.'/../src/FormField')
        ->exclude(__DIR__.'/../src/CloudflareTurnstileBundle.php')
    ;

    $services
        ->set(CloudflareTurnstileClient::class)
        ->arg('$httpClient', service('http_client'))
        ->arg('$logger', service('monolog.logger.contao'))
        ->arg('$requestStack', service('request_stack'))
        ->public()
    ;
};
