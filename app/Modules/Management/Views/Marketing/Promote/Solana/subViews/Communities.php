<?php
$getTopListedTokens = $pageContent['getTopListedTokens']; 
?>
<div class="card card-bordered card-full">
    <div class="card-inner border-bottom">
        <div class="card-title-group">
            <div class="card-title">
                <h6 class="title">Top Performing Solana Assets</h6>
                <p>View the Top Solana Assets.</p>
            </div>
            <div class="card-tools">
                <a href="<?php echo site_url('Exchange/Solana/Swap'); ?>" class="link">View All</a>
            </div>
        </div>
    </div>
    <div class="card-inner">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="top-assets-tab" data-bs-toggle="tab" data-bs-target="#top-assets" type="button" role="tab" aria-controls="top-assets" aria-selected="true">Top 50 Assets</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="discord-tab" data-bs-toggle="tab" data-bs-target="#discord" type="button" role="tab" aria-controls="discord" aria-selected="false">Discord Communities</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="facebook-tab" data-bs-toggle="tab" data-bs-target="#facebook" type="button" role="tab" aria-controls="facebook" aria-selected="false">Facebook Communities</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="twitter-tab" data-bs-toggle="tab" data-bs-target="#twitter" type="button" role="tab" aria-controls="twitter" aria-selected="false">X (formerly Twitter) Communities</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="website-tab" data-bs-toggle="tab" data-bs-target="#website" type="button" role="tab" aria-controls="website" aria-selected="false">Websites</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="top-assets" role="tabpanel" aria-labelledby="top-assets-tab">
                <table id="top-assets-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Coin Name</th>
                            <th>Symbol</th>
                            <th>Market Cap</th>
                            <th>Website</th>
                            <th>Discord</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getTopListedTokens as $token): ?>
                        <tr>
                            <td>
                                <div class="align-center">
                                    <a href="#" class="d-inline-flex align-items-center dynamicModalLoader" data-formtype="Solana" data-endpoint="viewSolanaToken" data-accountid="<?php echo $token['symbol']; ?>">
                                        <div class="user-avatar user-avatar-sm bg-light d-inline-flex">
                                            <img class="solanaTickerLogo" src="<?= $token['coin_logo']; ?>" onerror="this.onerror=null;this.src='https://www.mymiwallet.com/assets/images/MyMI-Wallet.png'" alt="<?= $token['coin_name'] . ' (' . $token['symbol'] . ')'; ?>"/>
                                        </div>
                                        <span class="tb-sub ms-2"><?= $token['coin_name'] . ' ($' . $token['symbol'] . ')'; ?> <span class="d-none d-md-inline"></span></span>
                                    </a>
                                </div>
                            </td>
                            <td><?php echo $token['symbol']; ?></td>
                            <td><?php echo '$' . number_format((float)$token['fdv'], 0); ?></td>
                            <?php if(!empty($token['website'])) : ?>
                            <td><a href="<?php echo $token['website']; ?>" target="_blank"><em class="icon ni myfs-md solanaTickerSocialIcon ni-link"></em></a></td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                            <?php if(!empty($token['discord'])) : ?>
                            <td><a href="<?php echo $token['discord']; ?>" target="_blank"><em class="icon ni myfs-md solanaTickerSocialIcon bi-discord"></em></a></td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                            <?php if(!empty($token['facebook'])) : ?>
                            <td><a href="<?php echo $token['facebook']; ?>" target="_blank"><em class="icon ni myfs-md solanaTickerSocialIcon ni-facebook-f"></em></a></td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                            <?php if(!empty($token['twitter'])) : ?>
                            <td><a href="<?php echo $token['twitter']; ?>" target="_blank"><em class="icon ni myfs-md solanaTickerSocialIcon ni-twitter"></em></a></td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Discord Tab -->
            <div class="tab-pane fade" id="discord" role="tabpanel" aria-labelledby="discord-tab">
                <table id="discord-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Token</th>
                            <th>Market Cap</th>
                            <th>Discord Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getTopListedTokens as $token): ?>
                            <?php if (!empty($token['discord'])): ?>
                                <tr>
                                    <td><?= $token['coin_name'] ?></td>
                                    <td><?php echo '$' . number_format((float)$token['fdv'], 0); ?></td>
                                    <td><a href="<?= $token['discord'] ?>" target="_blank">Discord</a></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?= $token['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                Promote
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $token['id'] ?>">
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateContent" data-accountid="<?= $token['id'] ?>" data-category="Solana">Generate Content</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generatePromotion" data-accountid="<?= $token['id'] ?>" data-category="Solana" data-platform="Discord">Generate Promotion</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateAnnouncement" data-accountid="<?= $token['id'] ?>" data-category="Solana" data-platform="Discord">Generate Announcement</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateUpdate" data-accountid="<?= $token['id'] ?>" data-subcategory="Solana" data-platform="Discord">Generate Update</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Facebook Tab -->
            <div class="tab-pane fade" id="facebook" role="tabpanel" aria-labelledby="facebook-tab">
                <table id="facebook-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Token</th>
                            <th>Market Cap</th>
                            <th>Facebook Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getTopListedTokens as $token): ?>
                            <?php if (!empty($token['facebook'])): ?>
                                <tr>
                                    <td><?= $token['coin_name'] ?></td>
                                    <td><?php echo '$' . number_format((float)$token['fdv'], 0); ?></td>
                                    <td><a href="<?= $token['facebook'] ?>" target="_blank">Facebook</a></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?= $token['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                Promote
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $token['id'] ?>">
                                            <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateContent" data-accountid="<?= $token['id'] ?>" data-category="Solana">Generate Content</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generatePromotion" data-accountid="<?= $token['id'] ?>" data-category="Solana" data-platform="Facebook">Generate Promotion</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateAnnouncement" data-accountid="<?= $token['id'] ?>" data-category="Solana" data-platform="Facebook">Generate Announcement</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateUpdate" data-accountid="<?= $token['id'] ?>" data-subcategory="Solana" data-platform="Facebook">Generate Update</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Twitter Tab -->
            <div class="tab-pane fade" id="twitter" role="tabpanel" aria-labelledby="twitter-tab">
                <table id="twitter-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Token</th>
                            <th>Market Cap</th>
                            <th>Twitter Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getTopListedTokens as $token): ?>
                            <?php if (!empty($token['twitter'])): ?>
                                <tr>
                                    <td><?= $token['coin_name'] ?></td>
                                    <td><?php echo '$' . number_format((float)$token['fdv'], 0); ?></td>
                                    <td><a href="<?= $token['twitter'] ?>" target="_blank">Twitter</a></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?= $token['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                Promote
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $token['id'] ?>">
                                            <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateContent" data-accountid="<?= $token['id'] ?>" data-category="Solana">Generate Content</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generatePromotion" data-accountid="<?= $token['id'] ?>" data-category="Solana" data-platform="Twitter">Generate Promotion</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateAnnouncement" data-accountid="<?= $token['id'] ?>" data-category="Solana" data-platform="Twitter">Generate Announcement</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateUpdate" data-accountid="<?= $token['id'] ?>" data-subcategory="Solana" data-platform="Twitter">Generate Update</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Website Tab -->
            <div class="tab-pane fade" id="website" role="tabpanel" aria-labelledby="website-tab">
                <table id="website-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Token</th>
                            <th>Market Cap</th>
                            <th>Website Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getTopListedTokens as $token): ?>
                            <?php if (!empty($token['website'])): ?>
                                <tr>
                                    <td><?= $token['coin_name'] ?></td>
                                    <td><?php echo '$' . number_format((float)$token['fdv'], 0); ?></td>
                                    <td><a href="<?= $token['website'] ?>" target="_blank">Website</a></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?= $token['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                Promote
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $token['id'] ?>">
                                                <li><a class="dropdown-item" href="<?= site_url($token['website']) ?>">Scrap Website</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateContent" data-accountid="<?= $token['id'] ?>" data-category="Solana">Generate Content</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generatePromotion" data-accountid="<?= $token['id'] ?>" data-category="Solana" data-platform="Website">Generate Promotion</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateAnnouncement" data-accountid="<?= $token['id'] ?>" data-category="Solana" data-platform="Website">Generate Announcement</a></li>
                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateUpdate" data-accountid="<?= $token['id'] ?>" data-subcategory="Solana" data-platform="Website">Generate Update</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    // Initialize DataTables for each table
    $('#top-assets-table').DataTable({ order: [[2, 'desc']] });
    $('#discord-table').DataTable({ order: [[1, 'desc']] });
    $('#facebook-table').DataTable({ order: [[1, 'desc']] });
    $('#twitter-table').DataTable({ order: [[1, 'desc']] });
    $('#website-table').DataTable({ order: [[1, 'desc']] });
});

</script>

