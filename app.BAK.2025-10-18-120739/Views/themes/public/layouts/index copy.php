<?php
// Assume $viewFileData is passed from the controller
echo view('themes/default/layouts/header', [    
    'pageType'              => $pageType ?? 'Automated',
    'pageName'              => $pageName ?? 'Home',
    'pageTitle'             => $pageTitle ?? 'MyMI Wallet | The Future of Finance | Budgeting | Investments',
    'seoData'               => $seoData ?? [],
    'pageURIA'              => $pageURIA ?? '',
    'pageURIB'              => $pageURIB ?? '',
    'pageURIC'              => $pageURIC ?? '',
    'pageURID'              => $pageURID ?? '',
    'pageURIE'              => $pageURIE ?? '',
]); ?>

<body class="nk-body npc-landing bg-white intro"> 
    <?php //echo view('themes/default/layouts/data_distribution', $uriSegmentInfo); ?>
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap">
                <?php echo view('themes/default/layouts/_sitenav', [    
                    'pageType'              => $pageType ?? 'Automated',
                    'pageName'              => $pageName ?? 'Home',
                    'pageTitle'             => $pageTitle ?? 'MyMI Wallet | The Future of Finance | Budgeting | Investments',
                    'seoData'               => $seoData ?? [],
                    'pageURIA'              => $pageURIA ?? '',
                    'pageURIB'              => $pageURIB ?? '',
                    'pageURIC'              => $pageURIC ?? '',
                    'pageURID'              => $pageURID ?? '',
                    'pageURIE'              => $pageURIE ?? '',
                ]); ?>
                <div class="nk-content content-wrapper mt-0 p-0">
                    <div class="pt-lg-5 mb-3">
                        <div class="row justify-content-center pt-3">
                            <div class="col-12 pr-md-0">
                                <?php
                                // Display messages and content
                                echo session()->getFlashdata('message');
                                echo isset($content) ? $content : ''; // Ensure $content is passed from the controller
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                // Assume $viewFileData is passed from the controller
                echo view('themes/default/layouts/footer', [    
                    'pageType'              => $pageType ?? 'Automated',
                    'pageName'              => $pageName ?? 'Home',
                    'pageTitle'             => $pageTitle ?? 'MyMI Wallet | The Future of Finance | Budgeting | Investments',
                    'seoData'               => $seoData ?? [],
                    'pageURIA'              => $pageURIA ?? '',
                    'pageURIB'              => $pageURIB ?? '',
                    'pageURIC'              => $pageURIC ?? '',
                    'pageURID'              => $pageURID ?? '',
                    'pageURIE'              => $pageURIE ?? '',
                ]); ?>
            </div>
        </div>
    </div>
</body>
