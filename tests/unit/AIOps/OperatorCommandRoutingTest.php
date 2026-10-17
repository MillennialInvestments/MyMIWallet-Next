<?php

declare(strict_types=1);

namespace Tests\Unit\AIOps;

use App\Commands\AIOps\OperatorNext;
use CodeIgniter\Test\CIUnitTestCase;
use RuntimeException;

final class OperatorCommandRoutingTest extends CIUnitTestCase
{
    private function fixture(): array
    {
        $ctx = [
            'worktree' => '/apps/TBI/worktrees/feature-001',
            'branch' => 'feature/feature-001',
            'config_id' => 'config-001',
            'mission_id' => 'mission-001',
            'runtime_root' => '/tmp/unused-writable',
        ];
        $mission = [
            'worktree' => $ctx['worktree'],
            'branch' => $ctx['branch'],
            'config_id' => $ctx['config_id'],
            'mission_id' => $ctx['mission_id'],
            'lifecycle_state' => 'active_mutation_approved',
            'mutation_class' => 1,
        ];
        $objective = [
            'authoritative' => true,
            'config_id' => $ctx['config_id'],
            'mission_id' => $ctx['mission_id'],
            'worktree' => $ctx['worktree'],
            'branch' => $ctx['branch'],
        ];
        return [$ctx, $mission, $objective];
    }

    public function testExactActiveMissionAndObjectiveAreAccepted(): void
    {
        [$ctx, $mission, $objective] = $this->fixture();
        OperatorNext::assertContext($ctx, $mission, $objective);
        self::assertTrue(true);
    }

    public function testQualifiedPreviewTargetsControllerWithoutMutationFlags(): void
    {
        [$ctx] = $this->fixture();
        $command = OperatorNext::formatPreviewCommand($ctx, 'recipe-001');
        self::assertStringContainsString("'/apps/TBI/repos/timothyburks/spark'", $command);
        self::assertStringContainsString("'/tmp/unused-writable'", $command);
        self::assertStringContainsString("--recipe-id='recipe-001'", $command);
        self::assertStringNotContainsString('--approve', $command);
        self::assertStringNotContainsString(' --run', $command);
    }

    public function testMismatchedWorktreeFailsClosed(): void
    {
        [$ctx, $mission, $objective] = $this->fixture();
        $objective['worktree'] = '/apps/TBI/worktrees/other';
        $this->expectException(RuntimeException::class);
        OperatorNext::assertContext($ctx, $mission, $objective);
    }

    public function testApprovalDriftFailsClosed(): void
    {
        [$ctx, $mission, $objective] = $this->fixture();
        $mission['lifecycle_state'] = 'approval_required';
        $this->expectException(RuntimeException::class);
        OperatorNext::assertContext($ctx, $mission, $objective);
    }

    public function testMissingRecipeFailsClosed(): void
    {
        [$ctx] = $this->fixture();
        $this->expectException(RuntimeException::class);
        OperatorNext::approvedPreviewCommand($ctx, 'unapproved-recipe');
    }

    public function testUnsafeRecipeIdentifierFailsClosed(): void
    {
        [$ctx] = $this->fixture();
        $this->expectException(RuntimeException::class);
        OperatorNext::approvedPreviewCommand($ctx, '../other');
    }
}
