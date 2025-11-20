<?php

namespace Codefog\CloudflareTurnstileBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CloudflareTurnstileBundle extends Bundle
{
    public function getPath(): string
    {
        return dirname(__DIR__);
    }
}
