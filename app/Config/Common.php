<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */
// if (!class_exists(\CodeIgniter\Entity::class) && class_exists(\CodeIgniter\Entity\Entity::class)) {
//     class_alias(\CodeIgniter\Entity\Entity::class, 'CodeIgniter\Entity');
// }
// if (! function_exists('sanitizeCacheKey')) {
//     /**
//      * Normalizes cache keys to avoid reserved characters in cache adapters.
//      */
//     function sanitizeCacheKey(string $key): string
//     {
//         return preg_replace('/[^A-Za-z0-9._]/', '_', $key);
//     }
// }
// Ensure cache helper functions (including sanitizedCacheKey) are always available.
if (! function_exists('sanitizedCacheKey')) {
    require_once APPPATH . 'Helpers/cache_helper.php';
}
