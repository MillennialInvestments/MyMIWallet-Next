<div class="nk-block">
    <div class="row">
        <div class="col-md-6">
            <h3>Investment Strategies</h3>
            <form id="strategy-form">
                <input type="hidden" id="strategy-id">
                <div class="form-group">
                    <label for="strategy-name">Strategy Name</label>
                    <input type="text" id="strategy-name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="strategy-description">Description</label>
                    <textarea id="strategy-description" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Strategy</button>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Financial Goals</h3>
            <form id="goal-form">
                <input type="hidden" id="goal-id">
                <div class="form-group">
                    <label for="goal-name">Goal Name</label>
                    <input type="text" id="goal-name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="goal-amount">Target Amount</label>
                    <input type="number" id="goal-amount" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="goal-description">Description</label>
                    <textarea id="goal-description" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Goal</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h4 class="mt-4">Your Strategies</h4>
            <ul id="strategy-list" class="list-group">
                <!-- Strategies will be populated here -->
            </ul>
        </div>
        <div class="col-md-6">
            <h4 class="mt-4">Your Goals</h4>
            <ul id="goal-list" class="list-group">
                <!-- Goals will be populated here -->
            </ul>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    // Fetch and display strategies and goals on page load
    fetchStrategies();
    fetchGoals();

    // Handle strategy form submission
    $('#strategy-form').on('submit', function(event) {
        event.preventDefault();
        let id = $('#strategy-id').val();
        let data = {
            name: $('#strategy-name').val(),
            description: $('#strategy-description').val(),
        };
        if (id) {
            updateStrategy(id, data);
        } else {
            createStrategy(data);
        }
    });

    // Handle goal form submission
    $('#goal-form').on('submit', function(event) {
        event.preventDefault();
        let id = $('#goal-id').val();
        let data = {
            name: $('#goal-name').val(),
            target_amount: $('#goal-amount').val(),
            description: $('#goal-description').val(),
        };
        if (id) {
            updateGoal(id, data);
        } else {
            createGoal(data);
        }
    });

    // Fetch strategies
    function fetchStrategies() {
        $.get('/investments/strategies', function(data) {
            $('#strategy-list').empty();
            data.forEach(function(strategy) {
                $('#strategy-list').append(`
                    <li class="list-group-item">
                        <strong>${strategy.name}</strong>
                        <p>${strategy.description}</p>
                        <button class="btn btn-sm btn-warning" onclick="editStrategy(${strategy.id})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteStrategy(${strategy.id})">Delete</button>
                    </li>
                `);
            });
        });
    }

    // Fetch goals
    function fetchGoals() {
        $.get('/investments/goals', function(data) {
            $('#goal-list').empty();
            data.forEach(function(goal) {
                $('#goal-list').append(`
                    <li class="list-group-item">
                        <strong>${goal.name}</strong> - $${goal.target_amount}
                        <p>${goal.description}</p>
                        <button class="btn btn-sm btn-warning" onclick="editGoal(${goal.id})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteGoal(${goal.id})">Delete</button>
                    </li>
                `);
            });
        });
    }

    // Create strategy
    function createStrategy(data) {
        $.post('/investments/strategies', data, function(response) {
            $('#strategy-form')[0].reset();
            fetchStrategies();
        });
    }

    // Update strategy
    function updateStrategy(id, data) {
        $.ajax({
            url: `/investments/strategies/${id}`,
            method: 'PUT',
            data: data,
            success: function(response) {
                $('#strategy-form')[0].reset();
                $('#strategy-id').val('');
                fetchStrategies();
            }
        });
    }

    // Edit strategy
    window.editStrategy = function(id) {
        $.get(`/investments/strategies/${id}`, function(data) {
            $('#strategy-id').val(data.id);
            $('#strategy-name').val(data.name);
            $('#strategy-description').val(data.description);
        });
    };

    // Delete strategy
    window.deleteStrategy = function(id) {
        $.ajax({
            url: `/investments/strategies/${id}`,
            method: 'DELETE',
            success: function(response) {
                fetchStrategies();
            }
        });
    };

    // Create goal
    function createGoal(data) {
        $.post('/investments/goals', data, function(response) {
            $('#goal-form')[0].reset();
            fetchGoals();
        });
    }

    // Update goal
    function updateGoal(id, data) {
        $.ajax({
            url: `/investments/goals/${id}`,
            method: 'PUT',
            data: data,
            success: function(response) {
                $('#goal-form')[0].reset();
                $('#goal-id').val('');
                fetchGoals();
            }
        });
    }

    // Edit goal
    window.editGoal = function(id) {
        $.get(`/investments/goals/${id}`, function(data) {
            $('#goal-id').val(data.id);
            $('#goal-name').val(data.name);
            $('#goal-amount').val(data.target_amount);
            $('#goal-description').val(data.description);
        });
    };

    // Delete goal
    window.deleteGoal = function(id) {
        $.ajax({
            url: `/investments/goals/${id}`,
            method: 'DELETE',
            success: function(response) {
                fetchGoals();
            }
        });
    };
});
</script>