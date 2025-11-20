<?php

namespace Codefog\CloudflareTurnstileBundle\FormField;

use Codefog\CloudflareTurnstileBundle\CloudflareTurnstileClient;
use Contao\BackendTemplate;
use Contao\CoreBundle\String\HtmlAttributes;
use Contao\Widget;

class CloudflareTurnstileFormField extends Widget
{
    public HtmlAttributes $captchaAttributes;

    /**
     * @var boolean
     */
    protected $blnForAttribute = true;

    /**
     * @var string
     */
    protected $strTemplate = 'form_cloudflare_turnstile';

    /**
     * @var string
     */
    protected $prefix = 'widget widget-cloudeflare-trunstile';

    /**
     * Use the raw request data.
     *
     * @param array $arrAttributes An optional attributes array
     */
    public function __construct($arrAttributes = null)
    {
        parent::__construct($arrAttributes);

        $this->useRawRequestData = true;
    }

    /**
     * Generate the widget and return it as string.
     *
     * @return string The widget markup
     */
    public function generate(): string
    {
        return \sprintf('<div%s></div>', $this->captchaAttributes);
    }

    /**
     * Parse the template file and return it as string.
     *
     * @param array $arrAttributes An optional attributes array
     *
     * @return string The template markup
     */
    public function parse($arrAttributes = null): string
    {
        $request = $this->getContainer()->get('request_stack')->getCurrentRequest();

        if ($request && $this->getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            $objTemplate = new BackendTemplate('be_wildcard');
            $objTemplate->title = $this->label;

            return $objTemplate->parse();
        }

        $this->captchaAttributes = new HtmlAttributes();
        $this->captchaAttributes->addClass('cf-turnstile');
        $this->captchaAttributes->set('data-sitekey', $this->getCloudflareTurnstileClient()->getSiteKey());
        $this->captchaAttributes->set('data-response-field-name', $this->name);
        $this->captchaAttributes->set('data-appearance', $this->cloudflare_turnstile_appearance);
        $this->captchaAttributes->set('data-size', $this->cloudflare_turnstile_size);
        $this->captchaAttributes->set('data-theme', $this->cloudflare_turnstile_theme);

        $this->canUseCaptcha = $request->isSecure();

        if (!$this->canUseCaptcha) {
            $host = $request->getHost();

            // The context is also considered secure if the host is 127.0.0.1, localhost or *.localhost.
            // https://developer.mozilla.org/en-US/docs/Web/Security/Secure_Contexts#when_is_a_context_considered_secure
            $this->canUseCaptcha = \in_array($host, ['127.0.0.1', 'localhost']) || str_ends_with($host, '.localhost');
        }

        return parent::parse($arrAttributes);
    }

    /**
     * @param mixed $varInput
     */
    protected function validator($varInput): mixed
    {
        if (!$varInput || !is_string($varInput) || !$this->getCloudflareTurnstileClient()->validate($varInput)) {
            $this->addError($GLOBALS['TL_LANG']['ERR']['cloudflareTurnstileVerificationFailed']);
        }

        return $varInput;
    }

    private function getCloudflareTurnstileClient(): CloudflareTurnstileClient
    {
        /** @var CloudflareTurnstileClient $client */
        $client = $this->getContainer()->get(CloudflareTurnstileClient::class);

        return $client;
    }
}
