<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class GapItem
{
    public string $type;
    public string $reference;
    public string $docPath;
    public int $docLine;
    public string $context;
    public ?string $suggestedTargetPath;
    public bool $exists = false;
    public ?string $evidence = null;

    public function __construct(
        string $type,
        string $reference,
        string $docPath,
        int $docLine = 0,
        string $context = '',
        ?string $suggestedTargetPath = null
    ) {
        $this->type = $type;
        $this->reference = $reference;
        $this->docPath = $docPath;
        $this->docLine = $docLine;
        $this->context = $context;
        $this->suggestedTargetPath = $suggestedTargetPath;
    }

    public static function fromDocLine(string $path, int $line, string $context): self
    {
        return new self('doc-gap', trim($context), $path, $line, $context, null);
    }

    public static function fromClassRef(string $path, string $fqcn): self
    {
        $target = str_starts_with($fqcn, 'App\\')
            ? 'app/' . str_replace('\\', '/', substr($fqcn, 4)) . '.php'
            : null;

        return new self('class', $fqcn, $path, 0, 'Class reference from docs.', $target);
    }

    public static function fromRouteRef(string $path, string $route): self
    {
        return new self('route', $route, $path, 0, 'Route reference from docs.', 'app/Config/Routes.php');
    }
}
