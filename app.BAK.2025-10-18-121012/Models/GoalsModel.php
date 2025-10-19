<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class GoalsModel extends Model
{
    protected $table = 'bf_users_goal_checklist';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'goal_type', 'goal_description', 'status', 
        'goal_completion_status', 'gold_reward', 'start_date', 
        'end_date', 'created_at', 'updated_at'
    ];

    // Insert a new goal
    public function insertGoal($goalData)
    {
        return $this->insert($goalData);
    }

    // Get goals by user
    public function getGoalsByUser($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    // Get goal by ID
    public function getGoalById($goalId)
    {
        return $this->find($goalId);
    }

    // Update a goal by ID
    public function updateGoal($goalId, $goalData)
    {
        return $this->update($goalId, $goalData);
    }

    // Delete a goal by ID
    public function deleteGoal($goalId)
    {
        return $this->delete($goalId);
    }

    // Get goals by user and status
    public function getGoalsByStatus($userId, $status)
    {
        return $this->where('status', $status)
                    ->findAll();
    }

    // Get goals by category (e.g., daily, weekly, monthly)
    public function getGoalsByCategory($userId, $category)
    {
        return $this->where('user_id', $userId)
                    ->where('category', $category)
                    ->findAll();
    }
    
}
