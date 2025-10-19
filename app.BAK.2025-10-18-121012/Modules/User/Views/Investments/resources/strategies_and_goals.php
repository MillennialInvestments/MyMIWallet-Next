<div class="row">
    <div class="col-md-6">
        <h4 class="mt-4">Your Strategies</h4>
        <ul id="strategy-list" class="list-group">
            <?php if (!empty($strategies)): ?>
                <?php foreach ($strategies as $strategy): ?>
                    <li class="list-group-item">
                        <?= esc($strategy['strategy_name']) ?>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">No strategies found.</li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="col-md-6">
        <h4 class="mt-4">Your Goals</h4>
        <ul id="goal-list" class="list-group">
            <?php if (!empty($goals)): ?>
                <?php foreach ($goals as $goal): ?>
                    <li class="list-group-item">
                        <?= esc($goal['goal_name']) ?>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">No goals found.</li>
            <?php endif; ?>
        </ul>
    </div>
</div>
