# Fast CEP
Este projeto é uma API de consulta de cep e endereços utilizando os dados oficiais do correios.

## Instalação
Use o gerenciador de pacotes [composer](https://getcomposer.org/) para instalar o Fast CEP.
```bash
composer install
```

Renomeie o arquivo ".env.example" para ".env".

Inicie o servidor com o PHP.
```bash
php -S localhost:8000 -t public
```

## Uso
### Consultar endereço
Pesquisar CEP:
localhost:8000/01001000

Pesquisar endereço:
localhost:8000/Pra%C3%A7a%20da%20S%C3%A9%20lado%20%C3%ADmpar%20S%C3%A3o%20Paulo%20SP

# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Serving Your Application
To serve your project locally, you may use the Laravel Homestead virtual machine, Laravel Valet, or the built-in PHP development server:
php -S localhost:8000 -t public

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
