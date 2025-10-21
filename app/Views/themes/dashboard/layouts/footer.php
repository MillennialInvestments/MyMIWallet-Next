<?php
$nonce                      = $nonce ?? ['script' => '', 'style' => ''];
$csp                        = $csp   ?? [];
$scriptNonceValue           = $csp['script'] ?? null;
$currentUser                = $currentUser   ?? null;
$totalSegments              = isset($totalSegments) && is_numeric($totalSegments) ? (int)$totalSegments : 0;
$uri                        = $uri ?? service('request')->uri;      
$subViewData                = [
    'uri'                   => $uri,
    'cuID'                  => $cuID,
    'siteSettings'          => $siteSettings,
    'pageTitle'             => $pageTitle ?? $siteSettings->companyMetaTitle,
    'nonce'                 => $nonce,
    'csp'                   => $csp,
    'theme'                 => $theme ?? 'dashboard',
    'bodyClass'             => $bodyClass ?? '',
    'bodyData'              => $bodyData ?? [],
    'currentUser'           => $currentUser,
    'show'                  => $show ?? true, // Whether to show the footer or not
    'cuSolanaDW'            => $cuSolanaDW ?? [],
    'cuEthereumDW'          => $cuEthereumDW ?? [],
    'cuBitcoinDW'           => $cuBitcoinDW ?? [],
    'cuLitecoinDW'          => $cuLitecoinDW ?? [],
    'cuDogecoinDW'          => $cuDogecoinDW ?? [],
    'cuDashDW'              => $cuDashDW ?? [],
    'cuDigibyteDW'          => $cuDigibyteDW ?? [],
    'cuMoneroDW'            => $cuMoneroDW ?? [],
    'cuZcashDW'             => $cuZcashDW ?? [],
    'cuTronDW'              => $cuTronDW ?? [],
    'cuRippleDW'            => $cuRippleDW ?? [],
    'cuBitcoinCashDW'       => $cuBitcoinCashDW ?? [],
    'cuAvalancheDW'         => $cuAvalancheDW ?? [],
    'cuPolkadotDW'          => $cuPolkadotDW ?? [],
    'cuCosmosDW'            => $cuCosmosDW ?? [],
    'cuAlgorandDW'          => $cuAlgorandDW ?? [],
    'cuTezosDW'             => $cuTezosDW ?? [],
    'cuFilecoinDW'          => $cuFilecoinDW ?? [],
    'cuStellarDW'           => $cuStellarDW ?? [],
    'cuHederaDW'            => $cuHederaDW ?? [],
    'cuInternetComputerDW'  => $cuInternetComputerDW ?? [],
    'cuChainlinkDW'         => $cuChainlinkDW ?? [],
    'cuUniswapDW'           => $cuUniswapDW ?? [],
    'cuAaveDW'              => $cuAaveDW ?? [],
    'cuCompoundDW'          => $cuCompoundDW ?? [],
    'cuSushiSwapDW'         => $cuSushiSwapDW ?? [],
    'cuYearnFinanceDW'      => $cuYearnFinanceDW ?? [],
    'cuMakerDW'             => $cuMakerDW ?? [],
    'cuCurveDW'             => $cuCurveDW ?? [],
    'cuBalancerDW'          => $cuBalancerDW ?? [],
    'cuPancakeSwapDW'       => $cuPancakeSwapDW ?? [],
    'cuThorchainDW'         => $cuThorchainDW ?? [],
    'cuKavaDW'              => $cuKavaDW ?? [],
    'cuTerraLunaDW'         => $cuTerraLunaDW ?? [],
    'cuSolanaStatus'        => $cuSolanaStatus ?? false,
    'cuEthereumStatus'      => $cuEthereumStatus ?? false,
    'cuBitcoinStatus'       => $cuBitcoinStatus ?? false,
    'cuLitecoinStatus'      => $cuLitecoinStatus ?? false,
    'cuDogecoinStatus'      => $cuDogecoinStatus ?? false,
    'cuDashStatus'          => $cuDashStatus ?? false,
    'cuDigibyteStatus'      => $cuDigibyteStatus ?? false,
    'cuMoneroStatus'        => $cuMoneroStatus ?? false,
    'cuZcashStatus'         => $cuZcashStatus ?? false,
    'cuTronStatus'          => $cuTronStatus ?? false,          
    'cuRippleStatus'        => $cuRippleStatus ?? false,
    'cuBitcoinCashStatus'   => $cuBitcoinCashStatus ?? false,
    'cuAvalancheStatus'     => $cuAvalancheStatus ?? false,
    'cuPolkadotStatus'      => $cuPolkadotStatus ?? false,
    'cuCosmosStatus'        => $cuCosmosStatus ?? false,
    'cuAlgorandStatus'      => $cuAlgorandStatus ?? false,
    'cuTezosStatus'         => $cuTezosStatus ?? false,
    'cuFilecoinStatus'      => $cuFilecoinStatus ?? false,
    'cuStellarStatus'       => $cuStellarStatus ?? false,
    'cuHederaStatus'        => $cuHederaStatus ?? false,
    'cuInternetComputerStatus' => $cuInternetComputerStatus ?? false,
    'cuChainlinkStatus'     => $cuChainlinkStatus ?? false,
    'cuUniswapStatus'       => $cuUniswapStatus ?? false,
    'cuAaveStatus'          => $cuAaveStatus ?? false,
    'cuCompoundStatus'      => $cuCompoundStatus ?? false,
    'cuSushiSwapStatus'     => $cuSushiSwapStatus ?? false,
    'cuYearnFinanceStatus'  => $cuYearnFinanceStatus ?? false,
    'cuMakerStatus'         => $cuMakerStatus ?? false,
    'cuCurveStatus'         => $cuCurveStatus ?? false,
    'cuBalancerStatus'      => $cuBalancerStatus ?? false,      
    'cuPancakeSwapStatus'   => $cuPancakeSwapStatus ?? false,
    'cuThorchainStatus'     => $cuThorchainStatus ?? false,
    'cuKavaStatus'          => $cuKavaStatus ?? false,
    'cuTerraLunaStatus'     => $cuTerraLunaStatus ?? false,      
    'totalSegments' => $totalSegments,
    'pageURIA' => $totalSegments >= 1 ? $uri->getSegment(1) : null,
    'pageURIB' => $totalSegments >= 2 ? $uri->getSegment(2) : null,
    'pageURIC' => $totalSegments >= 3 ? $uri->getSegment(3) : null,
    'pageURID' => $totalSegments >= 4 ? $uri->getSegment(4) : null,
    'useDataTables' => $useDataTables ?? false,
    'useDatepicker' => $useDatepicker ?? false,
    'useTradingView' => $useTradingView ?? false,
    'useExchangeJS' => $useExchangeJS ?? false,
    'useGoogleTreemap' => $useGoogleTreemap ?? false,   
    'useRealTimeData' => $useRealTimeData ?? false,
    'useTawkTo' => $useTawkTo ?? false,
    'useWonderpush' => $useWonderpush ?? false,
    'useGoogleAnalytics' => $useGoogleAnalytics ?? true,
    'useSummernote' => $useSummernote ?? false, // Default to false if not set
    'useSelect2' => $useSelect2 ?? false, // Default to false if not set
    'useChartJS' => $useChartJS ?? false, // Default to false if not set
    'useAOS' => $useAOS ?? false, // Default to false if
    'useClipboardJS' => $useClipboardJS ?? false, // Default to false if not set
    'useBootstrapIcons' => $useBootstrapIcons ?? false, // Default to false if not set
    'useFontAwesome' => $useFontAwesome ?? false, // Default to false if not set
    'useFeatherIcons' => $useFeatherIcons ?? false, // Default to false if not set
    'useIonIcons' => $useIonIcons ?? false, // Default to false if not set
    'useRemixIcons' => $useRemixIcons ?? false, // Default to false if not set
    'useThemifyIcons' => $useThemifyIcons ?? false, // Default to false if not set
    'useWeatherIcons' => $useWeatherIcons ?? false, // Default to false if not set
    'useLineIcons' => $useLineIcons ?? false, // Default to false if not set
    'useCryptoIcons' => $useCryptoIcons ?? false, // Default to false if not set
    'useFlagIcons' => $useFlagIcons ?? false, // Default to false if not set
    'usePaymentIcons' => $usePaymentIcons ?? false, // Default to false if not set
    'useCustomIcons' => $useCustomIcons ?? false, // Default to false if not set
];
?>
<?php if ( ! isset($show) || $show == true) : ?>
     
     <hr />
     <footer class="map-bg ml-5 pl-5">
        <div class="container-fluid border-bottom z-index-20 position-relative">
            <div class="row gy-4 px-3">
                <div class="col-lg-2 col-md-6 mt-1"><img class="footer-brand-logo w-100 mt-2 mb-1" src="<?= base_url($siteSettings->companyLogo); ?>" alt="<?php echo $siteSettings->companyMetaTitle; ?>">
                    <ul class="list-unstyled text-muted">
                        <li><a class="reset-anchor text-sm" href="mailto:<?php echo $siteSettings->companySupportEmail; ?>"><?php echo $siteSettings->companySupportEmail; ?></a></li>
                        <li><a class="reset-anchor text-sm" href="tel:<?php echo $siteSettings->companyPhone; ?>"><?php echo $siteSettings->companyPhone; ?></a></li>
                    </ul>
                    <ul class="list-inline text-muted">
                        <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <h4>About Us</h4>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-1"><a class="text-sm reset-anchor" href="#!">Meet The Team</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="#!">Service Areas</a></li>
                    </ul>
                </div> -->
                <div class="col-lg-2 col-md-6">
                    <h4>Budgeting</h4>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Budget'); ?>">My Budget</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Budget/Financial-Analysis'); ?>">My History</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Budget/Financial-Forecaster'); ?>">My Forecast</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Budget/Financial-Institute'); ?>">My Institutes</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Budget/Financial-Advisors'); ?>">My Sponsors</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h4>Investing</h4>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Investments'); ?>">My Investments</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Trade-Tracker'); ?>">MyMI Trade Tracker</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Investments/News'); ?>">Market News</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Investments/Reports'); ?>">My Reports</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Investments/Watchlist'); ?>">My Watchlist</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h4>MyMI Crypto</h4>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Exchange/Solana'); ?>">Exchange</a></li>
                        <?php if (!empty($cuSolanaDW['id'])) : ?>
                            <li class="mb-1"><a class="text-sm reset-anchor dynamicModalLoader" data-formtype="Solana" data-endpoint="connectWalletModal" href="#">Connect</a></li>
                        <?php if ($siteSettings->createSolanaStatus === 1) : ?>
                            <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Exchange/Solana/Assets'); ?>">Assets</a></li>
                            <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Exchange/Solana/Create'); ?>">Create</a></li>
                        <?php endif; ?>
                        <?php if ($siteSettings->swapSolanaStatus === 1) : ?>
                            <li class="mb-1"><a class="text-sm reset-anchor dynamicModalLoader" data-formtype="Solana" data-endpoint="coinSwap" href="#">Swap</a></li>
                        <?php endif; ?>
                        <?php else : ?>
                            <li class="mb-1"><a class="text-sm reset-anchor" data-bs-toggle="modal" data-bs-target="#connectWalletModal" href="#">Create Wallet</a></li>
                            <li class="mb-1"><a class="text-sm reset-anchor importSolanaWallet"href="#">Import Wallet</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h4>Legal</h4>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Privacy-Policy'); ?>">Privacy Policy</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Terms-Of-Service'); ?>">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h4>Support</h4>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Customer-Support'); ?>">Contact Us</a></li>
                        <li class="mb-1"><a class="text-sm reset-anchor" href="<?php echo site_url('/Knowledgebase'); ?>">Knowledgebase</a></li>
                    </ul>
                </div>
            </div>
            <!-- <div class="row gy-4">  
                <div class="col-lg-9 col-md-9"></div>          
                <div class="col-lg-3 col-md-3">           
                    <!-- Scroll top button--
                    <div class="btn btn-primary btn-sm scroll-top-btn" id="scrollTop">
                        <i class="fas fa-long-arrow-alt-up"></i><span class="fw-bold text-uppercase small">To the Top</span>
                    </div>
                </div>   
            </div> -->
        </div>
        <div class="container pl-5 py-5 pr-5 mx-0 z-index-20 position-relative">
             <div class="row text-center">
                 <div class="col-lg-6 p-lg-0 text-lg-start">
                 <p class="text-muted text-sm mb-0">© <?php echo date("Y"); ?> <?php echo $siteSettings->companyName . ' | ' . $siteSettings->websiteVersion; ?>, All Rights Reserved.</p>
                 </div>
                 <div class="col-lg-6 p-lg-0 text-lg-end">
                    <p class="text-muted text-sm mb-0">Powered by <a href="https://timothyburks.com" target="_blank">TBI Solutions, LLC.</a>
                        <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
                    </p>
                 </div>
             </div>

         </div>
     </footer>
     <!-- JavaScript files-->
 <?php endif; ?>
 

 <?php 
//  echo view('Dashboard/index/user-feedback-modal'); 

echo view('themes/dashboard/layouts/js-links', $subViewData);
echo vite_tags('app', $scriptNonceValue); 
echo view('themes/dashboard/layouts/custom-js', $subViewData);
?>