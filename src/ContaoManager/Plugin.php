<?php

declare(strict_types=1);

namespace Codefog\CloudflareTurnstileBundle\ContaoManager;

use Codefog\CloudflareTurnstileBundle\CloudflareTurnstileBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(CloudflareTurnstileBundle::class)->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
