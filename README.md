# SlimSkeleton
The SlimSkeleton enables you start writing a application in which you have an
configuration and log handling. It also has an file separated bootstrap handling.

# Configuration Handling
The skeleton uses [Noodlehaus/Config](https://github.com/hassankhan/config). This
allows you to add as many configuration files as you want. The ordering of the loading
is based on the filenames. This enables you to have inheritance of configurations.

## Example
* _config.yml - contains basic configuration for local development
* _config.prod.yml - here you could define production specific overwrites

# Logging Handling
The skeleton uses [Monolog/Logger](https://github.com/Seldaek/monolog) for logging.
The reason is to make the logging as flexible as you need it you can either use
the predefined push handler or any supporter handler.

The default implementation writes into php://stdout.
