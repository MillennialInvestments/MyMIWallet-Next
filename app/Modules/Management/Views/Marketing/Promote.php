<?php
$subViewData = [
    'exchangeAssets' => $exchangeAssets,
];
$pageURID = ($uri->getTotalSegments() >= 4) ? $uri->getSegment(4) : null;
if ($pageURID === 'Solana') {
    echo view('ManagementModule/Marketing/Promote/Solana/Dashboard', $subViewData); 
}
// echo view('ManagementModule/Marketing/Promote/Solana/Dashboard', $subViewData); 
?>