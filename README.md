# Volunteers CRM

![dragon code volunteers](https://preview.dragon-code.pro/the-dragon-code/volunteers-crm.svg?background=f9322c&invert=1)

## Installation

Just use the [Composer](https://getcomposer.org):

```bash
composer install
```

## Development

> Note
>
> To work with a https certificate, you can use [ngrok](https://ngrok.com).

Make sure you have [Docker](https://www.docker.com/products/docker-desktop/) installed.

### Windows

You need to enter the `WSL`:

```bash
wsl
```

And just run the command:

```bash
vendor/bin/sail up    # to run processes in the console
vendor/bin/sail up -d # to run background processes
```

### Unix

Just run the command:

```bash
vendor/bin/sail up    # to run processes in the console
vendor/bin/sail up -d # to run background processes
```

## License

This project is licensed under the [MIT License](LICENSE).
