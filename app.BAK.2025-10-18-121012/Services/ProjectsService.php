<?php
namespace App\Services;

use App\Contracts\ProjectsServiceInterface;
use App\DTO\ProjectDTO;
use App\DTO\TokenDTO;
use App\DTO\WalletDTO;
use App\Exceptions\ProjectsException;
use App\Models\ProjectsModel;
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Database\BaseConnection;
use Psr\Log\LoggerInterface;

/**
 * Service layer for project domain logic.
 */
class ProjectsService implements ProjectsServiceInterface
{
    public function __construct(
        protected BaseConnection $db,
        protected ProjectsModel $projectsModel,
        protected CacheInterface $cache,
        protected LoggerInterface $logger
    ) {
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function createProject(array $data, int $ownerId, ?string $idempotencyKey = null): ProjectDTO
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function updateProject(int $projectId, array $patch, int $actorId, ?string $idempotencyKey = null): ProjectDTO
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function archiveProject(int $projectId, int $actorId, ?string $idempotencyKey = null): bool
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function getProject(int $projectId, ?int $actorId = null): ProjectDTO
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function listProjects(array $filters, ?int $actorId = null, int $page = 1, int $perPage = 25): array
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function addMilestone(int $projectId, array $milestone, int $actorId, ?string $idempotencyKey = null): array
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function completeMilestone(int $projectId, int $milestoneId, int $actorId, ?string $idempotencyKey = null): array
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function addTask(int $projectId, array $task, int $actorId, ?string $idempotencyKey = null): array
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function updateTask(int $projectId, int $taskId, array $patch, int $actorId, ?string $idempotencyKey = null): array
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function attachWallet(int $projectId, string $chain, string $address, int $actorId, ?string $idempotencyKey = null): WalletDTO
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function primaryWallet(int $projectId): ?WalletDTO
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function fundingStatus(int $projectId): array
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function provisionProjectToken(int $projectId, array $spec, int $actorId, ?string $idempotencyKey = null): TokenDTO
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function tokenDistribution(int $projectId): array
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function generateLaunchCampaign(int $projectId, array $inputs, int $actorId, ?string $idempotencyKey = null): array
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function publishUpdates(int $projectId, array $updates, int $actorId, ?string $idempotencyKey = null): bool
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws ProjectsException
     */
    public function analytics(int $projectId, array $range): array
    {
        throw new ProjectsException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * Create a new asset for a project.
     *
     * @param int   $projectId
     * @param array $data
     */
    public function createAsset(int $projectId, array $data): bool
    {
        $this->logger->debug('ProjectsService::createAsset start', ['projectId' => $projectId, 'data' => $data]);
        $data['project_id'] = $projectId;
        $valid = service('validation')->setRules(config('Validation')->asset)->run($data);
        if (! $valid) {
            $this->logger->error('ProjectsService validation failed', service('validation')->getErrors());
            return false;
        }
        return $this->db->table('project_assets')->insert($data);
    }

    /**
     * Fetch assets for dashboard or API.
     */
    public function getAssets(int $projectId): array
    {
        return $this->db->table('project_assets')->where('project_id', $projectId)->get()->getResultArray();
    }
}
?>