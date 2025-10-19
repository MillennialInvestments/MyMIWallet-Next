<div class="nk-block">
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped" id="suspicious-transactions-overview">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Amount</th>
                        <th>From Token</th>
                        <th>To Token</th>
                        <th>Created On</th>
                        <th>Reason</th>
                        <th>Reported By</th>
                        <th>Reported At</th>
                        <th>More Details..</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($exchangeAssets['largeTransactions']['mtdLargeTransactions'] as $transaction) {
                        // Only display transactions that have not been reported as suspicious
                        if (!$transaction['suspicious']) {
                            $transID = $transaction['id'];
                            $userID = $transaction['user_id'];
                            echo '
                            <tr>
                                <td><a href="' . site_url('/Management/Exchange/Transaction/' . $transID) . '">' . $transID . '</a></td>
                                <td><a href="' . site_url('/Profile/' . $userID) . '">' . $userID . '</a></td>
                                <td>' . $transaction['amount'] . '</td>
                                <td>' . $transaction['from_token'] . '</td>
                                <td>' . $transaction['to_token'] . '</td>
                                <td>' . $transaction['created_on'] . '</td>
                                <td>' . ($transaction['suspicious_reason'] ?? 'N/A') . '</td>
                                <td>' . ($transaction['reported_by'] ?? 'N/A') . '</td>
                                <td>' . ($transaction['reported_at'] ?? 'N/A') . '</td>
                                <td>
                                    <a class="btn btn-icon" href="' . site_url('Management/' . $pageURIB . '/' . $transaction['id']) . '"><i class="icon ni ni-eye-chart-alt"></i></a>                           
                                </td>
                            </tr>';
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $("#suspicious-transactions-overview").DataTable({
            order: [[0, "desc"]],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>
