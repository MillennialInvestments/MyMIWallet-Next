<?php 
$testPage = $this->config->item('test_view_page');
$cuID = $_SESSION['allSessionData']['userAccount']['cuID'];
$cuEmail = $_SESSION['allSessionData']['userAccount']['cuEmail'];
$testInfo = array('cuID' => $cuID);

$formGroup = $this->config->item('form_container');
$this->load->model('User/sports_model');
$getNBATeams = $this->sports_model->get_nba_teams(); 
?>
<style <?= $nonce['style'] ?? '' ?>>
    .select2-results__option--highlighted[aria-selected] {
        color: black !important;
        background-color: #f3f3f3 !important;
    }
</style>
<div class="nk-block d-none d-sm-block">
    <div class="row">
        <div class="d-none d-md-block col-md-12 my-sm-3">
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Select Your NBA Team</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content full-width">
                                <div class="<?php echo $formGroup; ?> mb-2">
                                    <label for="team-dropdown" class="col-6 form-label">Choose A Team</label>
                                    <div class="col-6">
                                        <select class="form-control" id="team-dropdown" style="height: 40px; padding: 10px; width: 50%">
                                            <option value="">Select a Team</option>
                                            <?php foreach ($getNBATeams as $team): ?>
                                                <option value="<?= $team['id'] ?>"><?= $team['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTableJS Table -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-bordered h-100">
            <div class="card-inner">
                <table id="nba_sports_team_statistics" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Player ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Team</th>
                            <th>Position</th>
                            <th>Minutes</th>
                            <th>Points</th>
                            <th>Assists</th>
                            <th>Total Rebounds</th>
                            <th>Offensive Rebounds</th>
                            <th>Defensive Rebounds</th>
                            <th>Blocks</th>
                            <th>Steals</th>
                            <th>Personal Fouls</th>
                            <th>Turnovers</th>
                            <th>Field Goals Made</th>
                            <th>Field Goals Attempted</th>
                            <th>Field Goal %</th>
                            <th>Free Throws Made</th>
                            <th>Free Throws Attempted</th>
                            <th>Free Throw %</th>
                            <th>Three Points Made</th>
                            <th>Three Points Attempted</th>
                            <th>Three Point %</th>
                            <th>Plus/Minus</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Data will be populated here by DataTableJS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    $("#team-dropdown").select2({allowClear: true, dropdownAutoWidth: true});
    var table = $("#nba_sports_team_statistics").DataTable({
        processing: true,
        serverSide: false,
        ajax: function(data, callback, settings) {
            var teamId = $("#team-dropdown").val();
            if (teamId) {
                $.ajax({
                    url: "<?= site_url('User/Sports/getNBAPlayerStats/') ?>" + teamId,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log("Received data:", response);
                        callback({data: response.response}); // Ensure this matches your response structure
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error fetching data:', textStatus, errorThrown);
                    }
                });
            }
        },
        columns: [
            {data: 'player.id', title: 'Player ID'},
            {data: 'player.firstname', title: 'First Name'},
            {data: 'player.lastname', title: 'Last Name'},
            {data: 'team.name', title: 'Team'},
            {data: 'pos', title: 'Position'},
            {data: 'min', title: 'Minutes'},
            {data: 'points', title: 'Points'},
            {data: 'assists', title: 'Assists'},
            {data: 'totReb', title: 'Total Rebounds'},
            {data: 'offReb', title: 'Offensive Rebounds'},
            {data: 'defReb', title: 'Defensive Rebounds'},
            {data: 'blocks', title: 'Blocks'},
            {data: 'steals', title: 'Steals'},
            {data: 'pFouls', title: 'Personal Fouls'},
            {data: 'turnovers', title: 'Turnovers'},
            {data: 'fgm', title: 'Field Goals Made'},
            {data: 'fga', title: 'Field Goals Attempted'},
            {data: 'fgp', title: 'Field Goal %'},
            {data: 'ftm', title: 'Free Throws Made'},
            {data: 'fta', title: 'Free Throws Attempted'},
            {data: 'ftp', title: 'Free Throw %'},
            {data: 'tpm', title: 'Three Points Made'},
            {data: 'tpa', title: 'Three Points Attempted'},
            {data: 'tpp', title: 'Three Point %'},
            {data: 'plusMinus', title: 'Plus/Minus'}
        ]
    });

    $("#team-dropdown").change(function() {
        table.ajax.reload();
    });
});

</script>




<?php 
// <script <?= $nonce['script'] ?? '' ?>>
// $(document).ready(function() {
//     $('#team-dropdown').select2({
//         placeholder: "Select a team",
//         allowClear: true,
//         minimumInputLength: 2,
//         theme: "classic",
//         dropdownAutoWidth: true,
//         maximumSelectionLength: 2,
//         tags: true,
//         language: "en", // English

//         // Define AJAX settings if fetching data remotely
//         ajax: {
//             url: 'your-endpoint-url',
//             dataType: 'json',
//             // Additional AJAX parameters
//             // data: function(params) { return { query: params.term }; },
//             // processResults: function(data) { return { results: data.items }; }
//         },

//         // Custom matcher function
//         matcher: function(params, data) {
//             // Custom matching logic here
//             return data;
//         },

//         // Custom template for rendering items
//         templateResult: function(state) {
//             if (!state.id) {
//                 return state.text;
//             }
//             var $state = $('<span><img src="image-path/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>');
//             return $state;
//         },

//         templateSelection: function(state) {
//             if (!state.id) {
//                 return state.text;
//             }
//             var $state = $('<span><img src="image-path/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>');
//             return $state;
//         }
//     });
// });

// </script>
?>