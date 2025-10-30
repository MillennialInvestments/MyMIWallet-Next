<!-- app/Modules/Management/Views/Alerts/resources/management-controls.php -->
<div class="nk-block">
    <div class="row g-gs">

        <!-- Fetch Emails & Create Alerts -->
        <div class="col-sm-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="project">
                        <div class="project-head">
                            <div class="user-avatar sq bg-primary"><span>FE</span></div>
                            <div class="project-info">
                                <h6 class="title">Fetch Emails & Create Alerts</h6>
                            </div>
                        </div>
                        <div class="project-details">
                            <p>Retrieve new trade alerts from the email system.</p>
                        </div>
                        <button id="fetchEmailsButton" class="btn btn-primary btn-block">
                            <i class="icon ni ni-mail"></i> Fetch Emails / Create Alerts
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Force Fetch Emails -->
        <div class="col-sm-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="project">
                        <div class="project-head">
                            <div class="user-avatar sq bg-secondary"><span>FF</span></div>
                            <div class="project-info">
                                <h6 class="title">Force Fetch Emails</h6>
                            </div>
                        </div>
                        <div class="project-details">
                            <p>Manually trigger email fetching for alerts.</p>
                        </div>
                        <button id="force-fetch-emails" class="btn btn-secondary btn-block">
                            Force Pull Emails
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Force Fetch Tickers -->
        <div class="col-sm-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="project">
                        <div class="project-head">
                            <div class="user-avatar sq bg-warning"><span>FT</span></div>
                            <div class="project-info">
                                <h6 class="title">Force Fetch Tickers</h6>
                            </div>
                        </div>
                        <div class="project-details">
                            <p>Ensure the latest stock tickers are updated in the system.</p>
                        </div>
                        <button id="force-fetch-tickers" class="btn btn-warning btn-block">
                            <i class="icon ni ni-reload"></i> Force Pull Tickers
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Send Alerts to Discord -->
        <div class="col-sm-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="project">
                        <div class="project-head">
                            <div class="user-avatar sq bg-success"><span>DA</span></div>
                            <div class="project-info">
                                <h6 class="title">Send Alerts to Discord</h6>
                            </div>
                        </div>
                        <div class="project-details">
                            <p>Distribute alerts to the Discord community.</p>
                        </div>
                        <button id="sendDiscordAlerts" class="btn btn-success btn-block">
                            <i class="icon ni ni-bell"></i> Send Alerts to Discord
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Generate Alert Content -->
        <div class="col-sm-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="project">
                        <div class="project-head">
                            <div class="user-avatar sq bg-primary"><span>GC</span></div>
                            <div class="project-info">
                                <h6 class="title">Generate Alert Content</h6>
                            </div>
                        </div>
                        <div class="project-details">
                            <p>Generate marketing and voiceover content for alerts.</p>
                        </div>
                        <button class="btn btn-primary btn-block generate-alert-content">
                            <i class="fa fa-plus"></i> Generate Alert Content
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Post to Socials -->
        <div class="col-sm-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="project">
                        <div class="project-head">
                            <div class="user-avatar sq bg-success"><span>PS</span></div>
                            <div class="project-info">
                                <h6 class="title">Post to Socials</h6>
                            </div>
                        </div>
                        <div class="project-details">
                            <p>Share generated alerts to social media platforms.</p>
                        </div>
                        <button id="postToSocials" class="btn btn-success btn-block">
                            <i class="icon ni ni-share-alt"></i> Post to Socials
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Generate Voiceover -->
        <div class="col-sm-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="project">
                        <div class="project-head">
                            <div class="user-avatar sq bg-primary"><span>GV</span></div>
                            <div class="project-info">
                                <h6 class="title">Generate Voiceover</h6>
                            </div>
                        </div>
                        <div class="project-details">
                            <p>Create a voiceover script based on the latest alerts.</p>
                        </div>
                        <button id="generateVoiceover" class="btn btn-primary btn-block">
                            <i class="icon ni ni-mic"></i> Generate Voiceover
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Download Voiceover -->
        <div class="col-sm-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="project">
                        <div class="project-head">
                            <div class="user-avatar sq bg-success"><span>DV</span></div>
                            <div class="project-info">
                                <h6 class="title">Download Voiceover</h6>
                            </div>
                        </div>
                        <div class="project-details">
                            <p>Download the generated voiceover for publishing.</p>
                        </div>
                        <a id="downloadVoiceover" class="btn btn-success btn-block" href="#" target="_blank" style="display: none;">
                            <i class="icon ni ni-download"></i> Download Voiceover
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
