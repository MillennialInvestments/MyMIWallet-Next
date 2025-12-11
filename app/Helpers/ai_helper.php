<?php

use App\Config\SiteSettings;

function aiKimiEnabled(): bool
{
    return config(SiteSettings::class)->enableKimiK2 === true;
}