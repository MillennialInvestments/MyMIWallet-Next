<div class="nk-block">
    <div class="row">
        <div class="col">
            <!-- <table class="table table-striped table-bordered defaultDTTable" id="management-inactive-users"> -->
            <table class="table" id="management-inactive-users" data-url="<?= site_url('API/Management/ajaxGetInactiveUsers'); ?>">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all-users" /></th> <!-- NEW -->
                        <th>ID</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Referral Code</th>
                        <th>More Details..</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($getInactiveUsers as $user) {
                        echo '
                        <tr>
                            <td><input type="checkbox" class="user-checkbox" value="' . $user['id'] . '"></td> <!-- NEW -->
                            <td><a href="' . site_url('Management/Users/Profile/' . $user['username']) . '">' . $user['id'] . '</a></td>
                            <td>' . $user['type'] . '</td>
                            <td>' . $user['first_name'] . ' ' . $user['last_name'] . ' ' . $user['name_suffix'] . '</td>
                            <td><a href="mailto:' . $user['email'] . '" target="_blank">' . $user['email'] . '</a></td>
                            <td>' . $user['city'] . ', ' . $user['state'] . '</td>
                            <td>' . $user['referral_code'] . '</td>';
                            if ($pageURIB === 'Assets') {
                                echo '
                                <td>
                                    <a href="' . site_url('Management/Users/Profile/' . $user['username']) . '" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-placement="bottom" title="User Profile"><em class="icon ni ni-user"></em></a>
                                    <a href="' . site_url('Management/Users/Assets/' . $user['id']) . '" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-placement="bottom" title="User Assets"><em class="icon ni ni-coin"></em></a>
                                    <a href="' . site_url('Management/Users/Distribute/' . $user['id']) . '" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-placement="bottom" title="Distribute Coins"><em class="icon ni ni-coins"></em></a>
                                </td>
                                '; 
                            } elseif ($pageURIB === 'Users') {
                                echo '
                                <td>
                                    <a href="' . site_url('Management/Users/Profile/' . $user['username']) . '" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-placement="bottom" title="User Profile"><em class="icon ni ni-user"></em></a>
                                    <a href="' . site_url('Management/Users/Assets/' . $user['id']) . '" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-placement="bottom" title="User Assets"><em class="icon ni ni-coin"></em></a>
                                    <a href="' . site_url('Management/Users/Distribute/' . $user['id']) . '" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-placement="bottom" title="Distribute Coins"><em class="icon ni ni-coins"></em></a>
                                    <a class="btn btn-trigger btn-icon" href="mailto:' . $user['email'] . '" target="_blank"><em class="icon ni ni-mail"></em></a>
                                    <a href="#" class="btn btn-sm btn-danger ban-user-btn" data-user-id="' . $user['id'] . '"><em class="icon ni ni-na"></em></a>
                                </td>
                                '; 
                            };
                        echo '
                        </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    $('#management-inactive-users').DataTable( {
        "order": [[ 1, "desc" ]],     
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    }	
    );
} );
// $(document).ready(function () {
//     $('#management-inactive-users').DataTable({
//         processing: true,
//         serverSide: true, // Optional if you want pagination handled server-side
//         ajax: {
//             url: $('#management-inactive-users').data('url'), // cleaner
//             type: 'POST',
//             dataSrc: function (json) {
//                 return json.data;
//             }
//         },
//         columns: [
//             { data: 'checkbox', orderable: false },
//             { data: 'id' },
//             { data: 'type' },
//             { data: 'name' },
//             { data: 'email' },
//             { data: 'location' },
//             { data: 'referral_code' },
//             { data: 'actions', orderable: false }
//         ],
//         order: [[1, 'desc']],
//         lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
//     });
// });

</script>