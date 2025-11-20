<?php

$GLOBALS['TL_LANG']['XPL']['cloudflare_turnstile_size'] = [
    ['Normal', 'The default size works well for most desktop and mobile layouts. Use this if you have adequate horizontal space on your website or form.'],
    ['Flexible', 'Automatically adapts to the container width while maintaining minimum usability. Use this for responsive designs that need to work across all screen sizes.'],
    ['Compact', 'Ideal for mobile interfaces, sidebars, or any space where horizontal space is limited. The compact widget is taller than normal to accommodate the smaller width.'],
];

$GLOBALS['TL_LANG']['XPL']['cloudflare_turnstile_theme'] = [
    ['Auto', 'Automatically matches the visitor\'s system theme preference. Auto is recommended for most implementations as it respects the visitor\'s preferences and provides the best accessibility experience.'],
    ['Light', 'Light theme with bright colors and clear contrast. Light theme works best on bright backgrounds and provides high contrast for readability.'],
    ['Dark', 'Dark theme optimized for dark interfaces. Dark theme is ideal for dark interfaces, gaming sites, or applications with dark color schemes.'],
];

$GLOBALS['TL_LANG']['XPL']['cloudflare_turnstile_appearance'] = [
    ['Always', 'The widget is always visible from page load. This is the best option for most implementations where you want your visitors to see the widget immediately as it provides clear visual feedback that security verification is in place.'],
    ['Execute', 'The widget only becomes visible after the challenge begins. This is useful for when you need to control the timing of widget appearance, such as showing it only when a visitor starts filling out a form or selecting a submit button.'],
    ['Interaction only', 'The widget becomes visible only when visitor interaction is required and provides the cleanest visitor experience. Most visitors will never see the widget, but suspected bots will encounter the interactive challenge.'],
];
