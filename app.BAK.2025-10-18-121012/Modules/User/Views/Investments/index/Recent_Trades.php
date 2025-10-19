<?php 
function ordinal($number) {
    $suffix = 'th';
    if (($number % 100) >= 11 && ($number % 100) <= 13) {
        $suffix = 'th';
    } else {
        switch ($number % 10) {
            case 1:
                $suffix = 'st';
                break;
            case 2:
                $suffix = 'nd';
                break;
            case 3:
                $suffix = 'rd';
                break;
            default:
                $suffix = 'th';
                break;
        }
    }
    return $number . $suffix;
}
?>
<style <?= $nonce['style'] ?? '' ?>>
    .actions-td {
        position: sticky;
    }
</style>
<div class="card card-bordered card-full">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Investment Asset Activities</h6>
                <p>Last 12 Months of Total Monthly Financial Growth.</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <a class="btn btn-success btn-sm text-white" href="<?php echo site_url('Investments/Add'); ?>"><em class="icon ni ni-plus"></em><span>Add</span></a>
                <!-- <div class="dropdown">
                    <a href="#" class="btn btn-success btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-plus"></em><span>Add</span></a>
                    <div class="dropdown-menu mt-1" style="">
                        <ul class="link-list-opt no-bdr">
                            <li><span>Cyptos</span></li>
                            <li class="p-1">
                                <a class="" href="' . site_url('/Budget/Add/Income') . '">CryptoAssets</a>
                            </li>
                            <li class="p-1">
                                <a class="" href="' . site_url('/Budget/Add/Income') . '">CryptoCoins</a>
                            </li>
                            <li><span>Equities</span></li>
                            <li class="p-1">
                                <a class="" href="' . site_url('/Budget/Add/Income') . '">On</a>
                            </li>
                            <li class="p-1 ">
                                <a class="" href="' . site_url('/Budget/Add/Income') . '">Off</a>
                            </li>
                            <li><span>Forex</span></li>
                            <li class="p-1">
                                <a class="" href="' . site_url('/Budget/Add/Income') . '">On</a>
                            </li>
                            <li class="p-1 ">
                                <a class="" href="' . site_url('/Budget/Add/Income') . '">Off</a>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div><!-- .card-inner -->
    <div class="card-inner pt-0 px-2">
        <div class="nk-wg-action d-block">
            <div class="nk-wg-action-content pb-2 px-2">
                <?php 
                if ($this->agent->is_mobile()) {
                    echo '<table id="investmentTable" class="table table-bordered table-responsive display">';
                } elseif ($this->agent->is_browser()) {
                    echo '<table id="investmentTable" class="table table-default display">';
                }
                ?>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Asset</th>
                            <th>Type</th>
                            <th>Shares</th>
                            <th>Cost</th>
                            <th>P/L</th>
                            <th>Manage</th>
                        </tr>
                    </theadc>
                    <tbody>
                        <?php
                            foreach($userInvestmentRecords as $investRecord) {
                                if ($investRecord['category'] === 'Stock') {
                                    $assetURL           = 'Stocks/' . $investRecord['symbol']; 
                                    $assetType          = 'Stock';
                                    $tradeStatus        = '';
                                    $tradePrice         = $investRecord['open_price'];
                                    $tradeShares        = $investRecord['shares'];
                                    $tradeCost          = number_format($investRecord['entry_price'] * $investRecord['shares'],2);   
                                    $tradePL            = number_format($investRecord['net_gains'] * $investRecord['shares'],2);     
                                } elseif ($investRecord['category'] === 'crypto') {
                                    $assetURL           = 'Crypto/' . $investRecord['symbol'];
                                    $assetType          = 'Crypto';
                                    $tradeShares        = $investRecord['shares'];
                                    $tradeCost          = number_format($investRecord['entry_price'] * $investRecord['shares'],2);    
                                    $tradePL            = number_format($investRecord['net_gains'] * $investRecord['shares'],2);    
                                } elseif ($investRecord['category'] === 'option_buy' || 'option_sell') {
                                    $assetURL           = 'Options/' . $investRecord['symbol_id'];
                                    $assetType          = 'Option';         
                                    $tradeShares        = $investRecord['number_of_contracts']; 
                                    $tradeCost          = number_format(($investRecord['entry_price'] * $investRecord['number_of_contracts']) * 100,2);             
                                    $tradePL            = number_format(($investRecord['net_gains'] * $investRecord['number_of_contracts']) * 100,2);             
                                };
                                if ($investRecord['closed'] === 'false') {
                                    $tradeStatus        = '<span class="badge bg-success">Open</span>';
                                    $tradeStatusChange  = '<a href="#"><em class="icon ni ni-plus"></i></a>';
                                } elseif ($investRecord['closed'] === 'true') {
                                    $tradeStatus        = '<span class="badge bg-danger">Closed</span>';
                                    $tradeStatusChange  = '<a href="#"><em class="icon ni ni-plus"></em></a>';
                                } else {
                                    $tradeStatus        = '<span class="badge bg-gray">N/A</span>';
                                    $tradeStatusChange  = '<a href="#"><em class="icon ni ni-plus"></em></a>';
                                }
                                // if ($investRecord['net_gains'] > 0) {
                                //     $tradeStatus        = 'bg-success-dim icon-circle icon ni ni-arrow-long-up';
                                // } elseif ($investRecord['net_gains'] < 0) {
                                //     $tradeStatus        = 'bg-danger-dim icon-circle icon ni ni-arrow-long-down';
                                // }

                                $day = date("j", strtotime($investRecord['open_date']));  // Day of the month without leading zeros
                                $ordinalDay = ordinal($day);
                                $month = date("F", strtotime($investRecord['open_date'])); // Full textual representation of a month
                                $year = date("Y", strtotime($investRecord['open_date']));  // 4-digit year

                                $tradeDate = $month . " " . $ordinalDay . ", " . $year;

                                // Your existing PHP code to populate each row goes here
                                echo '
                                <tr>
                                    <td><a href="' . site_url('Investments/Record/') . $investRecord['id'] . '">' . $investRecord['id'] . '</a></td>
                                    <td>' . $tradeDate . '</td>
                                    <td>' . $tradeStatus . '</td>
                                    <td><a href="' . site_url($assetURL) . '">' . $investRecord['symbol'] . '</a></td>
                                    <td>' . $assetType . '</td>
                                    <td>' . $tradeShares . '</td>
                                    <td>' . $tradePrice . '</td>
                                    <td>' . $tradeCost . ' USD</td>
                                    <td>' . $tradePL . '</td>
                                    <td class="actions-td">
                                        <a href=""><i class="icon ni ni-edit"></i></a>
                                        <a href=""><i class="icon ni ni-edit"></i></a>
                                    </td>
                                </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- .card-inner -->
    <div class="card-inner-sm border-top text-center d-sm-none">
        <a href="#" class="btn btn-link btn-block">See History</a>
    </div><!-- .card-inner -->
</div><!-- .card -->
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $('#investmentTable').DataTable({
            "order": [[ 1, "desc" ]]  // Sort by first column in ascending order
        });
    });

</script>