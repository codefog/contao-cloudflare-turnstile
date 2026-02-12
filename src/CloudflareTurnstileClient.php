<?php

declare(strict_types=1);

namespace Codefog\CloudflareTurnstileBundle;

use Contao\CoreBundle\Monolog\ContaoContext;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CloudflareTurnstileClient
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly LoggerInterface $logger,
        private readonly RequestStack $requestStack,
        private readonly string $secretKey,
        private readonly string $siteKey,
    ) {
    }

    public function getSiteKey(): string
    {
        return $this->siteKey;
    }

    public function validate(string $token): bool
    {
        if (!$token) {
            return false;
        }

        $payload = [
            'secret' => $this->secretKey,
            'response' => $token,
        ];

        if ($request = $this->requestStack->getCurrentRequest()) {
            $payload['remoteip'] = $request->getClientIp();
        }

        try {
            $response = $this->httpClient->request(
                'POST',
                'https://challenges.cloudflare.com/turnstile/v0/siteverify',
                [
                    'json' => $payload,
                ],
            )->toArray();
        } catch (\Exception $e) {
            $this->logger->error(\sprintf('Error connecting to Cloudflare Turnstile service: %s', $e->getMessage()), ['contao' => new ContaoContext(__METHOD__, 'ERROR')]);

            return true;
        }

        return ($response['success'] ?? false) === true;
    }
}
