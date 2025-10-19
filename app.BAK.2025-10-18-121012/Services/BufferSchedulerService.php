<?php
namespace App\Services;

use App\Models\MarketingModel;
use App\Libraries\MyMIMarketing;

class BufferSchedulerService
{
    protected $model;
    protected $mimi;

    public function __construct()
    {
        $this->model = new MarketingModel();
        $this->mimi = new MyMIMarketing();
    }

    public function rankBufferPosts()
    {
        $pending = $this->model->getPendingBufferItems();
        $threshold = getenv('MARKETING_TFIDF_THRESHOLD') ?: 7.5;

        foreach ($pending as $post) {
            $scoreData = $this->mimi->getTopKeywordScores(['summary' => $post['summary']]);

            $this->model->updateBufferItem($post['id'], [
                'score'        => $scoreData['score'] ?? 0,
                'tag_score'    => $scoreData['tag_score'] ?? 0,
                'tfidf_score'  => $scoreData['tfidf_score'] ?? 0,
                'auto_suggest' => ($scoreData['tfidf_score'] ?? 0) >= $threshold ? 1 : 0,
            ]);
        }
    }
    
    public function promoteScheduledPosts()
    {
        $now   = date('Y-m-d H:i:s');
        $posts = $this->model->getScheduledBufferPosts($now); // You’ll add this method next

        foreach ($posts as $post) {
            $this->model->updateBufferItem($post['id'], ['status' => 'promoted']);

            $generated = $this->mimi->generateSocialPost($post);

            $platforms = json_decode($post['platforms'] ?? '{}', true);
            foreach ($platforms as $platform => $enabled) {
                if ($enabled && !empty($generated[$platform])) {
                    $this->mimi->distributeContent($platform, $generated[$platform]);
                }
            }

            $this->mimi->notifyModerators($post); // 👈 Notifies mods with preview

            log_message('info', "🚀 Promoted Scheduled Buffer ID: {$post['id']}");
        }

        return count($posts);
    }

    public function getSmartScheduleTime($base = null, $gapMinutes = 20)
    {
        $base = $base ?? time();
        $nextTime = $base + ($gapMinutes * 60);
    
        return date('Y-m-d H:i:s', $nextTime);
    }
    
}
?>
