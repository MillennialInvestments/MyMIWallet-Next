<?php

/**
 * Spark CLI Bootstrap Override
 * Ensures .env is loaded in CLI context.
 */

use Dotenv\Dotenv;

// Only load if not already loaded
if (! env('IMAP_PATH')) {

    $envPath = ROOTPATH;

    if (file_exists($envPath . '.env')) {
        $dotenv = Dotenv::createImmutable($envPath);
        $dotenv->safeLoad();
    }
}
