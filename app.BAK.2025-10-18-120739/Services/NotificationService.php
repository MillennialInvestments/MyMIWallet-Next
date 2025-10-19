<?php

namespace App\Services;

use App\Libraries\{BaseLoader};
use App\Models\NotificationModel;

class NotificationService
{

    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
    }

    public function sendGoalCompletionNotification($userId, $goalId)
    {
        $goal = $this->notificationModel->getGoalById($goalId);
        if ($goal && $goal['user_id'] === $userId) {
            // Logic to send goal completion notification
            return $this->notificationModel->sendNotification($userId, "Goal '{$goal['name']}' completed!");
        }
        return false;
    }

    public function sendBudgetLimitAlert($userId, $budgetCategory)
    {
        // Logic to send budget limit alert
        return $this->notificationModel->sendNotification($userId, "You have exceeded your budget for {$budgetCategory}.");
    }

    public function sendUpcomingPaymentReminder($userId, $paymentId)
    {
        // Logic to send payment reminder
        return $this->notificationModel->sendNotification($userId, "Upcoming payment reminder for payment ID: {$paymentId}.");
    }

    public function sendMonthlySummary($userId)
    {
        // Logic to send monthly financial summary
        return $this->notificationModel->sendNotification($userId, "Your monthly financial summary is ready.");
    }
}
