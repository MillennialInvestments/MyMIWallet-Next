<?php 
$subViewData = [
    'siteSettings' => $siteSettings,
    'socialMedia' => $socialMedia,
    'uri' => $uri,
    'MyMICoinValue' => $MyMICoinValue,
]; 
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="content">
                <div class="intro-section-title">
                    <span class="overline-title intro-section-subtitle">Assets</span>
                    <h3 class="intro-heading-lead">Assets</h3>
                    <div class="intro-section-desc">
                        <p class="lead"></p>
                    </div>
                </div>

                <div class="row pt-4" id="overview">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h5 class="intro-heading-lead">Overview</h5>
                            <div class="intro-section-desc">
                                <p class="lead fs-14px">
                                    This article will introduce you to our MyMI Assets.<br>
                                    This article will cover a majority of what our MyMI Assets are designed to do by default, but we provide links to more in-depth information regarding certain functionality and tools.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-4" id="what-are-assets">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h3 class="intro-heading-lead">What are Assets?</h3>
                            <div class="intro-section-desc">
                                <p class="lead"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-4" id="what-are-digital-assets">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h5>What are Digital Assets?</h5>
                            <div class="intro-section-desc">
                                <p class="lead fs-14px">
                                    By definition, a <strong>Digital Asset</strong> is classified as anything that is stored digitally and is uniquely identifiable that organizations can use to realize value. Examples of digital assets include documents, audio, videos, logos, slide presentations, spreadsheets, and websites. While becoming more popular throughout the financial markets due to having the ability to disperse ownership of those digital assets.<br>
                                    A perfect example would be <strong>NFTs</strong> for instance. Cryptographic assets have been stored on a blockchain with unique ID Codes and metadata compiled with them that are distinguishable from one another. NFTs cannot be traded or exchanged at equivalency, differing from Fungible Tokens like cryptocurrencies which can be identical and serve as a medium for commercial transactions.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo view('UserModule/Knowledgebase/includes/Assets/what_are_mymi_assets', $subViewData); ?>

                <div class="row pt-4" id="owning-mymi-assets">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h3 class="intro-heading-lead">Owning MyMI Assets</h3>
                            <div class="intro-section-desc">
                                <p class="lead"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-4" id="how-do-you-own-mymi-assets">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h5>How Do You Own MyMI Assets</h5>
                            <div class="intro-section-desc">
                                <p class="lead fs-14px">
                                    To own/purchase assets, you can purchase MyMI Assets from the MyMI Exchange and Marketplace when offered by MyMI Creators. You can simply visit the MyMI Marketplace to outright purchase the Assets as long as those Assets are still available for purchase. If there are no longer any available assets to be purchased because the initial release of coins was limited to purchase and that purchase limit has been reached, you can alternatively purchase those Assets on the MyMI Exchange from other Asset Holders.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo view('UserModule/Knowledgebase/includes/Assets/asset_creator', $subViewData); ?>
                <?php echo view('UserModule/Knowledgebase/includes/Assets/mymi_marketplace', $subViewData); ?>
                <?php echo view('UserModule/Knowledgebase/includes/Assets/mymi_exchange', $subViewData); ?>
                <?php echo view('UserModule/Knowledgebase/includes/Customer_Support/header', $subViewData); ?>
                <?php echo view('UserModule/Knowledgebase/includes/Customer_Support/contact_support', $subViewData); ?>

            </div>
        </div>
    </div>
</div>
