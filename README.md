# CodeIgniter3 Namespaced Controller

This repository provides namespaced controller to [CodeIgniter](https://github.com/bcit-ci/CodeIgniter) 3.0.

## Requirements

* PHP 5.4.0 or later

## Including

* CodeIgniter 3.0.6
* ci-phpunit-test v0.12.2-dev

## Usage

You can configure namespace for controllers with `$config['controller_namespace']` in `application/config/config.php`. The default namespace is `app\controllers`.

If you have `app\controllers\abc\def\Ghi` controller, the path of the file must be `application/controllers/abc/def/Ghi.php`.

* All sub folder names must be lower case.
* All sub namespace names must be the exact same case as folder names.

## Related Projects for CodeIgniter 3.0

* [CodeIgniter Composer Installer](https://github.com/kenjis/codeigniter-composer-installer)
* [Cli for CodeIgniter 3.0](https://github.com/kenjis/codeigniter-cli)
* [ci-phpunit-test](https://github.com/kenjis/ci-phpunit-test)
* [CodeIgniter Simple and Secure Twig](https://github.com/kenjis/codeigniter-ss-twig)
* [CodeIgniter Doctrine](https://github.com/kenjis/codeigniter-doctrine)
* [CodeIgniter Deployer](https://github.com/kenjis/codeigniter-deployer)
* [CodeIgniter3 Filename Checker](https://github.com/kenjis/codeigniter3-filename-checker)
* [CodeIgniter Widget (View Partial) Sample](https://github.com/kenjis/codeigniter-widgets)
