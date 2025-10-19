<div class="nk-block">
    <div class="nk-content-body">
        <div class="row">
            <div class="col-12">
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered pb-4 pricing px-2">
                        <div class="pricing-head">
                            <div class="pricing-title">
                                <h4 class="card-title title">Marketing - Link Scraper</h4>
                                <p class="sub-text">Scrape a Website, Google Search, or Social Media Channel/Posts</p>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <form class="form-horizontal" id="standaloneScraperForm">
                                <div class="form-group row mb-3">
                                    <label class="col-3 form-label" for="url">Enter a Link:</label>
                                    <div class="col-9">
                                        <input class="form-control" id="url" name="url" value="" placeholder="Enter A Link To Gather Content or Information!" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="mt-0 pricing-action">
                                        <input class="btn btn-primary btn-sm" id="addCampaignSubmit" name="submit" value="Submit" type="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script <?= $nonce['script'] ?? '' ?>>
                            document.getElementById('standaloneScraperForm').addEventListener('submit', function(event) {
                            event.preventDefault();
                            let url = document.getElementById('url').value;
                            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                            fetch('<?php echo site_url('Management/Marketing/Scrape-Link'); ?>', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
                                },
                                body: JSON.stringify({ url: url })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    let tabbedContent = document.getElementById('tabbedContent');
                                    tabbedContent.style.display = 'block';

                                    let primaryTab = document.getElementById('primary');
                                    primaryTab.innerHTML = `<p>${data.data.content || 'No content available'}</p>`;

                                    let socialMediaTab = document.getElementById('social-media');
                                    socialMediaTab.innerHTML = `<p>${data.data.social_media_content || 'No social media content available'}</p>`;

                                    let rawDataTab = document.getElementById('raw-data');
                                    rawDataTab.innerHTML = `<pre>${JSON.stringify(data.data, null, 2)}</pre>`;

                                    addToScrapedDataTable(data.data);
                                } else {
                                    alert(data.message || 'Scraping failed. Please check the URL and try again.');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                        });
                        </script>
                        <div class="price-body d-none" id="tabbedContent">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a aria-controls="primary" aria-selected="true" class="nav-link active" data-bs-toggle="tab" data-bs-toggle="tab" href="#primary" id="primary-tab" role="tab">Primary Content</a>
                                </li>
                                <li class="nav-item">
                                    <a aria-controls="social-media" aria-selected="false" class="nav-link" data-bs-toggle="tab" data-bs-toggle="tab" href="#social-media" id="social-media-tab" role="tab">Social Media Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a aria-controls="raw-data" aria-selected="false" class="nav-link" data-bs-toggle="tab" data-bs-toggle="tab" href="#raw-data" id="raw-data-tab" role="tab">Raw Data</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="fade tab-pane active show" id="primary" aria-labelledby="primary-tab" role="tabpanel"></div>
                                <div class="fade tab-pane" id="social-media" aria-labelledby="social-media-tab" role="tabpanel"></div>
                                <div class="fade tab-pane" id="raw-data" aria-labelledby="raw-data-tab" role="tabpanel"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-bordered mt-4">
                        <div class="card-header">
                            <h4 class="card-title">Recent Scraped Data</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-responsive" id="scrapedDataTable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Links</th>
                                        <th>URL</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Scraped data will be appended here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
function truncateText(text, maxLength) {
    if (text.length > maxLength) {
        return text.substring(0, maxLength) + '...';
    }
    return text;
}

function addToScrapedDataTable(data) {
    let tableBody = document.querySelector('#scrapedDataTable tbody');
    let row = document.createElement('tr');

    let titleCell = document.createElement('td');
    titleCell.textContent = data.title || 'No title';
    row.appendChild(titleCell);

    let contentCell = document.createElement('td');
    contentCell.innerHTML = `<p>${truncateText(data.content || 'No content', 30)}</p>`;
    row.appendChild(contentCell);

    let linksCell = document.createElement('td');
    let linksHtml = '<div class="dropdown">' +
                    '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">' +
                    'Links' +
                    '</button>' +
                    '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
    if (Array.isArray(data.links)) {
        data.links.forEach(link => {
            linksHtml += `<li><a class="dropdown-item" href="${link.href}" target="_blank">${link.text}</a></li>`;
        });
    } else {
        linksHtml += '<li>No links</li>';
    }
    linksHtml += '</ul></div>';
    linksCell.innerHTML = linksHtml;
    row.appendChild(linksCell);

    let urlCell = document.createElement('td');
    urlCell.innerHTML = `<a href="${data.url}" target="_blank">${data.url}</a>`;
    row.appendChild(urlCell);

    let createdAtCell = document.createElement('td');
    createdAtCell.textContent = new Date().toLocaleString(); // Adjust as necessary
    row.appendChild(createdAtCell);

    tableBody.appendChild(row);
}

// Fetch and display the last 25-50 tasks from the database
document.addEventListener('DOMContentLoaded', function() {
    fetch('<?php echo site_url('Management/Marketing/getRecentScrapes'); ?>')
    .then(response => response.json())
    .then(data => {
        if (data.success && data.scrapes) {
            let tableBody = document.querySelector('#scrapedDataTable tbody');
            tableBody.innerHTML = ''; // Clear existing content
            data.scrapes.forEach(scrape => {
                let row = document.createElement('tr');

                let titleCell = document.createElement('td');
                titleCell.textContent = scrape.title || 'No title';
                row.appendChild(titleCell);

                let contentCell = document.createElement('td');
                contentCell.innerHTML = `<p>${truncateText(scrape.content || 'No content', 30)}</p>`;
                row.appendChild(contentCell);

                let linksCell = document.createElement('td');
                let linksHtml = '<div class="dropdown">' +
                                '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">' +
                                'Links' +
                                '</button>' +
                                '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                let links = JSON.parse(scrape.links || '[]');
                if (Array.isArray(links)) {
                    links.forEach(link => {
                        linksHtml += `<li><a class="dropdown-item" href="${link.href}" target="_blank">${link.text}</a></li>`;
                    });
                } else {
                    linksHtml += '<li>No links</li>';
                }
                linksHtml += '</ul></div>';
                linksCell.innerHTML = linksHtml;
                row.appendChild(linksCell);

                let urlCell = document.createElement('td');
                urlCell.innerHTML = `<a href="${scrape.url}" target="_blank">${scrape.url}</a>`;
                row.appendChild(urlCell);

                let createdAtCell = document.createElement('td');
                createdAtCell.textContent = scrape.created_at || 'No date';
                row.appendChild(createdAtCell);

                tableBody.appendChild(row);
            });
        } else {
            console.error('No scrapes found or failed to fetch scrapes');
        }
    })
    .catch(error => console.error('Error fetching recent scrapes:', error));
});
</script>
