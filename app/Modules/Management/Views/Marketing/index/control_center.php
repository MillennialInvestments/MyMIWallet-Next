<!-- app/Modules/Management/Views/Marketing/index/most_recent_content.php -->
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

</div>