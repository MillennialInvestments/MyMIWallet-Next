<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start">
            <div class="card-title">
                <h6 class="title">Recent Scraped Data</h6>
                <p>Quick access to important actions and tools.</p>
            </div>
        </div>
    </div>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content full-width">
                <em class="icon ni ni-link"></em>
                <div class="title">Newsletters: Add Subscriber</div>
                <p>
                    <?php echo view('Marketing/resources/standaloneAddSubscriberForm'); ?>
                </p>
            </div>
        </div>
    </div><!-- .card-inner -->
    <hr>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content full-width">
                <em class="icon ni ni-link"></em>
                <div class="title">Web Scraper: Enter Link</div>
                <p>
                    <?php echo view('Marketing/resources/standaloneScraperForm'); ?>
                </p>
            </div>
        </div>
    </div><!-- .card-inner -->
    <hr>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content full-width">
                <em class="icon ni ni-link"></em>
                <div class="title">Content Generator: </div>
                <p>
                    <?php echo view('Marketing/resources/standaloneLargeContentForm'); ?>
                </p>
            </div>
        </div>
    </div><!-- .card-inner -->
    <hr>
    <div class="card-body">
        <table class="table table-striped" id="scrapedDataTable">
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

<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        // Initialize DataTable
        const table = $('#scrapedDataTable').DataTable();

        function truncateText(text, maxLength) {
            if (text.length > maxLength) {
                return text.substring(0, maxLength) + '...';
            }
            return text;
        }

        function addToScrapedDataTable(data) {
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

            table.row.add([
                data.title || 'No title',
                truncateText(data.content || 'No content', 30),
                linksHtml,
                `<a href="${data.url}" target="_blank">${data.url}</a>`,
                new Date().toLocaleString()
            ]).draw();
        }

        // Fetch and display the most recent 5 tasks from the database
        fetch('<?php echo site_url('Management/Marketing/getRecentScrapes'); ?>')
        .then(response => response.json())
        .then(data => {
            if (data.success && data.scrapes) {
                data.scrapes.slice(0, 5).forEach(scrape => {
                    scrape.links = JSON.parse(scrape.links || '[]');
                    addToScrapedDataTable(scrape);
                });
            } else {
                console.error('No scrapes found or failed to fetch scrapes');
            }
        })
        .catch(error => console.error('Error fetching recent scrapes:', error));
    });
    </script>