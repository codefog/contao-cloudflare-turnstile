<?php

use Doctrine\DBAL\Types\Types;

// Palettes
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['cloudflare_turnstile'] = '{type_legend},type,name,label;{fconfig_legend},cloudflare_turnstile_size,cloudflare_turnstile_theme,cloudflare_turnstile_appearance;{expert_legend:hide},class;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';

// Fields
$GLOBALS['TL_DCA']['tl_form_field']['fields']['cloudflare_turnstile_size'] = [
    'inputType' => 'select',
    'options' => ['normal', 'flexible', 'compact'],
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field']['cloudflare_turnstile_size_ref'],
    'eval' => ['helpwizard' => true, 'tl_class' => 'w50'],
    'explanation' => 'cloudflare_turnstile_size',
    'sql' => ['type' => Types::STRING, 'length' => 8, 'default' => 'flexible'],
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['cloudflare_turnstile_theme'] = [
    'inputType' => 'select',
    'options' => ['auto', 'light', 'dark'],
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field']['cloudflare_turnstile_theme_ref'],
    'eval' => ['helpwizard' => true, 'tl_class' => 'w50'],
    'explanation' => 'cloudflare_turnstile_theme',
    'sql' => ['type' => Types::STRING, 'length' => 5, 'default' => 'auto'],
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['cloudflare_turnstile_appearance'] = [
    'inputType' => 'select',
    'options' => ['always', 'execute', 'interaction-only'],
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field']['cloudflare_turnstile_appearance_ref'],
    'eval' => ['helpwizard' => true, 'tl_class' => 'w50'],
    'explanation' => 'cloudflare_turnstile_appearance',
    'sql' => ['type' => Types::STRING, 'length' => 16, 'default' => 'always'],
];
