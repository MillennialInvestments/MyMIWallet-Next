<div class="nk-block">
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped" id="approved-assets-overview">
                <thead>
                    <tr>
                        <th>Asset</th>
                        <th>Blockchain</th>
                        <th>Market Cap</th>
                        <th>Volume</th>
                        <th>More Details..</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($getApprovedAssets as $asset) {
                        if (!empty($asset['company_name'])) {
                            $creator = $asset['company_name'];
                        } else {
                            $creator = $asset['first_name'] . ' ' . $asset['last_name'] . ' ' . $asset['name_suffix'];
                        }
                        
                        //log_message('debug', 'Management\Views\Assets\Listing-Table L22 - $asset[volume_array] array: ' . print_r($asset['volume_array'], true));
                        
                        // Check if 'volume_array' is indeed an array and has 'h24' key
                        $volume_24h = 'N/A';
                        if (is_array($asset['volume_array'])) {
                            if (isset($asset['volume_array']['h24'])) {
                                $volume_24h = $asset['volume_array']['h24'];
                            } else {
                                $volume_24h = 0;
                            }
                        }
                        
                        echo '
                        <tr>
                            <td class="d-inline-flex align-items-center border-0">
                                <div class="user-avatar user-avatar-sm bg-light d-inline-flex"><img class="icon" src="' . $asset['coin_logo'] . '" onerror="this.onerror=null;this.src=\'https://www.mymiwallet.com/assets/images/MyMI-Wallet.png\'" alt="' . $asset['coin_name'] . ' (' . $asset['symbol'] . ' "/></div>
                                <span class="tb-sub ms-2">' . $asset['coin_name'] . ' (' . $asset['symbol'] . ')</span>
                            </td>
                            <td>' . $asset['blockchain'] . ' (' . $asset['blockchain_name'] . ')</td>
                            <td>' . $asset['fdv'] . '</td>
                            <td>' . $volume_24h . '</td>
                            <td>
                                <a class="btn btn-icon" href="' . site_url('Management/' . $pageURIB . '/' . $asset['id']) . '"><i class="icon ni ni-bar-chart-alt"></i></a>                              
                                <a class="btn btn-icon" href="' . site_url('Management/' . $pageURIB . '/' . $asset['id']) . '"><i class="icon ni ni-bar-chart-alt"></i></a>                              
                            </td>
                        </tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $("#approved-assets-overview").DataTable({
            order: [[0, "desc"]],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>
