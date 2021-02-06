<?php 

/**
 * Ensure dependencies are loaded
 */
if (!file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
    $print_error(
        __('You must run <code>composer install</code> from the theme directory.', 'sage'),
        __('Autoloader not found.', 'sage')
    );
}
require_once $composer;