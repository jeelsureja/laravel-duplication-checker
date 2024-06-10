# Laravel Duplication Checker

This package detects code duplication in Laravel projects and provides warnings via a dedicated route.

## Installation

1. Require the package via Composer:
    ```bash
    composer require yourname/laravel-duplication-checker
    ```

2. Publish the configuration file:
    ```bash
    php artisan vendor:publish --tag=config --provider="YourNamespace\DuplicationChecker\Providers\DuplicationServiceProvider"
    ```

3. Run the duplication check command:
    ```bash
    php artisan code:check-duplication
    ```

## Configuration

The configuration file `config/duplication.php` allows you to customize the directories to be excluded and the route for warnings.

## Usage

Navigate to the configured route (default: `/duplication/warnings`) to see the duplication warnings.
