<!-- app/Modules/Exchange/Views/Solana/index/Top-Performing-Tokens.php -->
<div class="card card-bordered card-full">
    <div class="card-inner border-bottom">
        <div class="card-title-group">
            <div class="card-title">
                <h6 class="title">Top Performing Solana Assets</h6>
                <p>View the Top Solana Assets.</p>
            </div>
        </div>
    </div>
    <div class="card-inner">
        <table id="solanaTopPerformers" class="table table-default solanaTopPerformersTable">
            <thead>
                <tr>
                    <th>Token</th>
                    <th>Price</th>
                    <th>Market Cap</th>
                    <th>Volume</th>
                    <th>Links</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5" class="text-center">Loading...</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
// $(".solanaTopPerformersTable").DataTable({
//     order: [[0, "asc"]],
//     lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
// });
</script>
