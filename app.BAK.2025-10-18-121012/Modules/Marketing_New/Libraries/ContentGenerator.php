<?php

namespace App\Modules\Marketing_New\Libraries;

class ContentGenerator
{
    public function generateBlogPost($data)
    {
        $title = $data['title'] ?? 'Default Title';
        $content = $data['content'] ?? 'Default Content';
        $blogPost = "Title: $title\n\nContent: $content";

        return $blogPost;
    }

    public function generateFromEmail($email)
    {
        $subject = $email['subject'] ?? 'No Subject';
        $body = $email['body'] ?? 'No Body';
        $generatedContent = "Subject: $subject\n\nBody: $body";

        return $generatedContent;
    }

    public function generateSocialMediaContent($data)
    {
        $title = $data['title'] ?? 'Default Title';
        $summary = $data['summary'] ?? 'Default Summary';
        $link = $data['url'];

        $facebookContent = "Check out this article: $title\n$summary\nRead more: $link";
        $twitterContent = "New article: $title\n$summary\n$link";
        $linkedinContent = "Article: $title\nSummary: $summary\n$link";
        $discordContent = "Hey everyone, check out this new article: $title\n$summary\n$link";

        return [
            'facebook' => $facebookContent,
            'twitter' => $twitterContent,
            'linkedin' => $linkedinContent,
            'discord' => $discordContent,
        ];
    }

    public function generateNotifications($data)
    {
        $title = $data['title'] ?? 'Default Title';
        $summary = $data['summary'] ?? 'Default Summary';

        $inAppNotification = "New update: $title - $summary";
        $emailNotification = "Dear user,\n\nWe have a new update for you: $title\n\n$summary\n\nBest regards,\nMyMI Wallet Team";

        return [
            'inApp' => $inAppNotification,
            'email' => $emailNotification,
        ];
    }
}
