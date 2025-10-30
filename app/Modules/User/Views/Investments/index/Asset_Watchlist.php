<!-- application/modules/User/views/Investments/index/Asset_Watchlist.php -->
<div class="nk-block">
    <div class="card card-bordered card-stretch">
        <div class="card-inner-group">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h5 class="title">User Asset Watchlist</h5>
                    </div>
                </div>
            </div>
            <div class="card-inner p-0">
                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">Asset Name</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Current Value</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Percent Gain/Loss</span></th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody id="watchlistTableBody">
                        <!-- Watchlist rows will be populated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function() {
    fetchWatchlistData();
});

function fetchWatchlistData() {
    // Replace with the actual endpoint URL
    fetch('/path/to/your/api/endpoint')
        .then(response => response.json())
        .then(data => populateWatchlistTable(data))
        .catch(error => console.error('Error fetching watchlist data:', error));
}

function populateWatchlistTable(data) {
    const tableBody = document.getElementById('watchlistTableBody');
    tableBody.innerHTML = ''; // Clear existing rows

    data.forEach(asset => {
        const row = document.createElement('tr');
        row.className = 'nk-tb-item';

        // Assuming 'asset' has properties like 'name', 'currentValue', etc.
        row.innerHTML = `
            <td class="nk-tb-col">${asset.name}</td>
            <td class="nk-tb-col">${asset.currentValue}</td>
            <td class="nk-tb-col">
                <!-- Add buttons or other interactive elements here -->
            </td>
            <!-- Add more columns as needed -->
        `;

        tableBody.appendChild(row);
    });
}

</script>