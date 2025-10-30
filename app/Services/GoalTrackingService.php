<?php

namespace App\Services;

use App\Libraries\{BaseLoader};
use App\Models\GoalsModel;

class GoalTrackingService
{

    protected $goalModel;

    public function __construct()
    {
        $this->goalModel = new GoalsModel();
    }

    // Method to create a new goal for a user
    public function createGoal($userId, $goalData)
    {
        $goalData['user_id'] = $userId;
        return $this->goalModel->insertGoal($goalData);
    }

    // Method to get all goals for a user
    public function getUserGoals($userId)
    {
        return $this->goalModel->getGoalsByUser($userId);
    }

    // Method to update goal progress
    public function updateGoalProgress($userId, $goalId, $progress)
    {
        $goal = $this->goalModel->getGoalById($goalId);
        if ($goal && $goal['user_id'] === $userId) {
            return $this->goalModel->updateGoal($goalId, ['progress' => $progress]);
        }
        return false;
    }

    // Method to delete a goal by ID
    public function deleteGoal($goalId)
    {
        return $this->goalModel->deleteGoal($goalId);
    }

    // Method to evaluate all goals and return the completed ones
    public function evaluateGoals($userId)
    {
        $goals = $this->goalModel->getGoalsByUser($userId);
        $completedGoals = [];
        foreach ($goals as $goal) {
            if ($goal['progress'] >= 100) {
                $completedGoals[] = $goal;
            }
        }
        return $completedGoals;
    }

    // Method to get goals by user and status
    public function getGoalsByStatus($userId, $status)
    {
        return $this->goalModel->getGoalsByStatus($userId, $status);
    }

    // Method to get completed goals
    public function getCompletedGoals($userId)
    {
        return $this->goalModel->getGoalsByStatus($userId, 'completed');
    }

    // Method to get goals by category (daily, weekly, monthly)
    public function getGoalsByCategory($userId, $category)
    {
        return $this->goalModel->getGoalsByCategory($userId, $category);
    }

    // Method to mark a goal as completed and transfer reward
    public function completeGoal($userId, $goalId)
    {
        $goal = $this->goalModel->getGoalById($goalId);
        if ($goal && $goal['user_id'] === $userId && $goal['status'] !== 'completed') {
            $this->goalModel->updateGoal($goalId, ['status' => 'completed']);
            // Add logic to transfer reward (e.g., in crypto)
            return true;
        }
        return false;
    }

    public function getPendingGoals($userId)
    {
        return $this->goalModel->getGoalsByStatus($userId, 'pending');
}

}
