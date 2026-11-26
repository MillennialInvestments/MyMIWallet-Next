<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\NotificationModel;

class NotificationService
{
    protected NotificationModel $notificationModel;

    public function __construct(?NotificationModel $notificationModel = null)
    {
        $this->notificationModel = $notificationModel ?? new NotificationModel();
    }

    /**
     * Send goal completion notification if the user owns the goal.
     */
    public function sendGoalCompletionNotification(int $userId, int $goalId): bool
    {
        $goal = $this->notificationModel->getGoalById($goalId);
        if ($goal && (int) ($goal['user_id'] ?? 0) === $userId) {
            $name = (string) ($goal['name'] ?? $goal['title'] ?? 'Financial Goal');
            return $this->notificationModel->sendNotification(
                $userId,
                "Goal '{$name}' completed!",
                'Goal Completed',
                'goal'
            );
        }
        return false;
    }

    /**
     * Send budget limit alert for a category.
     */
    public function sendBudgetLimitAlert(int $userId, string $budgetCategory): bool
    {
        return $this->notificationModel->sendNotification(
            $userId,
            "You have exceeded your budget for {$budgetCategory}.",
            'Budget Limit Alert',
            'budget'
        );
    }

    /**
     * Send upcoming payment reminder.
     */
    public function sendUpcomingPaymentReminder(int $userId, int $paymentId): bool
    {
        return $this->notificationModel->sendNotification(
            $userId,
            "Upcoming payment reminder for payment ID: {$paymentId}.",
            'Payment Reminder',
            'payment'
        );
    }

    /**
     * Send monthly financial summary.
     */
    public function sendMonthlySummary(int $userId): bool
    {
        return $this->notificationModel->sendNotification(
            $userId,
            "Your monthly financial summary is ready.",
            'Monthly Financial Summary',
            'summary'
        );
    }

    /**
     * Retrieve user notifications bounded by limit.
     *
     * @return list<array<string, mixed>>
     */
    public function getUserNotifications(int $userId, int $limit = 20): array
    {
        return $this->notificationModel->getUserNotifications($userId, $limit);
    }

    /**
     * Mark a notification as read.
     */
    public function markAsRead(int $notificationId, ?int $userId = null): bool
    {
        return $this->notificationModel->markAsRead($notificationId, $userId);
    }

    /**
     * Count unread notifications for a user.
     */
    public function getUnreadCount(int $userId): int
    {
        return $this->notificationModel->getUnreadCount($userId);
    }
}
