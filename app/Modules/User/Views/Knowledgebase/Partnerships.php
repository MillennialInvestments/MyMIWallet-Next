<?php
$subViewData = [
    'MyMICoinValue'     => $MyMICoinValue,
]; 
?>
<div class="nk-content nk-content-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="content-page">
                <?php echo view('UserModule\Knowledgebase\includes\Partnerships\header', $subViewData); ?>
                <?php echo view('UserModule\Knowledgebase\includes\Partnerships\full_content', $subViewData); ?>
                <?php echo view('UserModule\Knowledgebase\includes\Assets\mymi_marketplace', $subViewData); ?>
                <?php echo view('UserModule\Knowledgebase\includes\Assets\mymi_exchange', $subViewData); ?>                
                <?php echo view('UserModule\Knowledgebase\includes\Customer_Support\header', $subViewData); ?>                
                <?php echo view('UserModule\Knowledgebase\includes\Customer_Support\contact_support', $subViewData); ?>                
            </div>
        </div>
    </div>
</div>