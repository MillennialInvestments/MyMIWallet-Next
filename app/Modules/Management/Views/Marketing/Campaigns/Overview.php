<?php $campaign = $campaignInfo; ?>
<div class="card card-bordered h-100" id="campaign-details-view">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Campaign Details: <?= $campaign['name']; ?></h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="row">
                        <span class="col">
                            <a class="btn btn-primary text-white" href="<?= site_url('Management/Marketing/Campaigns/Edit/' . $campaign['id']); ?>">
                                <i class="icon ni ni-edit"></i> Edit Campaign
                            </a>
                        </span>
                        <span class="col">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger pt-3 full-width" data-bs-toggle="dropdown">
                                    <em class="icon ni ni-more-h"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Notifications</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-inner">
            <div class="nk-block">
                <div class="row">
                    <div class="col">
                        <h5 class="text-primary">Campaign Overview</h5>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th>Campaign Name</th>
                                    <td><?= $campaign['name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Stage</th>
                                    <td><?= $campaign['stage']; ?></td>
                                </tr>
                                <tr>
                                    <th>Created By</th>
                                    <td><?= $campaign['created_by']; ?></td>
                                </tr>
                                <tr>
                                    <th>Assigned To</th>
                                    <td><?= $campaign['assigned_to']; ?></td>
                                </tr>
                                <tr>
                                    <th>Date Created</th>
                                    <td><?= $campaign['date_created']; ?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?= nl2br($campaign['overall_campaign_description']); ?></td>
                                </tr>
                                <tr>
                                    <th>Promotional Links</th>
                                    <td>
                                        <?php foreach ($campaign['promotional_links'] as $link): ?>
                                            <a href="<?= $link; ?>" target="_blank"><?= $link; ?></a><br>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col">
                        <h5 class="text-primary">Content for Scheduling</h5>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th>Facebook Message</th>
                                    <td><?= nl2br($campaign['facebook_message']); ?></td>
                                </tr>
                                <tr>
                                    <th>LinkedIn Message</th>
                                    <td><?= nl2br($campaign['linkedin_message']); ?></td>
                                </tr>
                                <tr>
                                    <th>Discord Message</th>
                                    <td><?= nl2br($campaign['discord_message']); ?></td>
                                </tr>
                                <tr>
                                    <th>StockTwits Message</th>
                                    <td><?= nl2br($campaign['stocktwits_message']); ?></td>
                                </tr>
                                <tr>
                                    <th>TikTok Message</th>
                                    <td><?= nl2br($campaign['tiktok_message']); ?></td>
                                </tr>
                                <tr>
                                    <th>YouTube Message</th>
                                    <td><?= nl2br($campaign['youtube_message']); ?></td>
                                </tr>
                                <tr>
                                    <th>Email Message</th>
                                    <td><?= nl2br($campaign['email_message']); ?></td>
                                </tr>
                                <tr>
                                    <th>Hashtags</th>
                                    <td><?= $campaign['hashtags']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- .card -->
