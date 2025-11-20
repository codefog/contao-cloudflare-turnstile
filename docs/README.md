# Cloudflare Turnstile – Documentation

This package provides seamless integration of [Cloudflare Turnstile](https://www.cloudflare.com/application-services/products/turnstile/) into your application.

After installation, configure your keys to enable server-side validation.

## Configuration

Add your `secret key` and `site key` to the application configuration:

```yaml
# config/config.yml
cloudflare_turnstile:
    secret_key: '<your_secret_key>'
    site_key: '<your_site_key>'
```

You can obtain both keys in the Cloudflare Turnstile dashboard: https://www.cloudflare.com/application-services/products/turnstile/

## Recommended Setup (Environment Variables)

For production-ready deployments, store credentials in environment variables.

Adjust your configuration as follows:

```yaml
# config/config.yml
cloudflare_turnstile:
    secret_key: '%env(CLOUDFLARE_TURNSTILE_SECRET_KEY)%'
    site_key: '%env(CLOUDFLARE_TURNSTILE_SITE_KEY)%'
```

### Environment Files

```dotenv
# .env
CLOUDFLARE_TURNSTILE_SECRET_KEY=
CLOUDFLARE_TURNSTILE_SITE_KEY=
```

```dotenv
# .env.local
CLOUDFLARE_TURNSTILE_SECRET_KEY=<your_secret_key>
CLOUDFLARE_TURNSTILE_SITE_KEY=<your_site_key>
```

## Adding the Form Field

After configuring your keys, log in to the backend and add a `Cloudflare Turnstile` form field to your form.

- The field name can be any value (e.g. `cf_security`).
- The field configuration provides several additional options, including size, theme and appearance mode.

Once added, the widget will be rendered automatically and validated on submission.

## Known Caveats

- The widget does not automatically re-initialize after an AJAX-based form update.
  This requires additional JavaScript handling.
  TODO: Implement automatic reloading of the Turnstile widget after AJAX responses.
