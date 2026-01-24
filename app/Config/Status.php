<?php

namespace Config;

final class Status
{
    public const ACTIVE = 1;
    public const INACTIVE = 0;

    public const PENDING = 'pending';
    public const APPROVED = 'approved';
    public const IN_REVIEW = 'in_review';
    public const QUEUED = 'queued';
    public const COMPLETED = 'completed';
}
