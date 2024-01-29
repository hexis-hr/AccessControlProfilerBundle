# AccessControlProfilerBundle

The `AccessControlProfilerBundle` is a Symfony bundle designed to enhance security by restricting access to the Symfony
profiler based on IP addresses.

## Features

- **IP Address Access Control**: Allows you to control access to the Symfony profiler based on IP addresses. Only
  specified IP addresses are granted access to the profiler.
- **Event Listener Implementation**: Utilizes Symfony's event listener to intercept kernel requests and
  enforce IP address access control for the profiler.

## Installation

Add repository to `composer.json`:

```json
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/hexis-hr/access-control-profiler-bundle.git"
    }
  ]
```

Install the `AccessControlProfilerBundle` via Composer:

```bash
composer require hexis-hr/access-control-profiler-bundle
```

## Configuration

### Environment Variables (`.env`)

```
ALLOWED_PROFILER_IPS="127.0.0.0,127.0.0.1"
```

- Replace `'127.0.0.0'` and `'127.0.0.1'` with the IP addresses allowed to access the Symfony profiler.

### Configuration File (`config/packages/access_control_profiler.yaml`)

```yaml
access_control_profiler:
  profiler_route: '_profiler'
```

## Usage

Once installed and configured, the `AccessControlProfilerBundle` automatically restricts access to the Symfony profiler
based on the configured IP addresses. Only requests originating from the specified IPs are granted access to the
profiler.

## Contributing

Contributions are welcome! Please feel free to submit issues, feature requests, or pull requests.

## License

This bundle is open-sourced software licensed under the [Apache License 2.0](LICENSE).

---

Feel free to customize the README with additional information such as usage examples, troubleshooting tips, or any other
relevant details specific to your bundle and its functionality.
