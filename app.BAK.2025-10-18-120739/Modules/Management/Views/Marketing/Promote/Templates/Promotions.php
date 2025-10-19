<?php 
log_message('debug', 'Marketing\Promote\Templates\Promotions L2 - $tokenInfo array: ' . (print_r($tokenInfo, true))); 
if (!empty($tokenInfo)) {
    foreach ($tokenInfo as $token) {
        $tokenTitle = $token['symbol'] . ' - ' . $token['coin_name'] ?? ''; 
        $tokenSymbol = $token['symbol'];
    }
    $promotionalTitle = 'Promote ' . $tokenSymbol . ' Token on the ' . $blockchain . ' Blockchain'; 
} else {
    $promtoionalTitle = 'Create a Promotiional Notification'; 
}
?>
<div class="modal-header">
    <h5 class="modal-title" id="contentModalLabel"><?= $promotionalTitle ?? 'Create A Promotional Notification' ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="promotionForm">
        <div class="mb-3">
            <label for="promotionTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="promotionTitle" name="title" value="<?php if(!empty($tokenInfo)) {echo $tokenTitle;} else {echo '';} ?>">
        </div>
        <div class="mb-3">
            <label for="promotionContent" class="form-label">Content</label>
            <textarea class="form-control summernote" id="promotionContent" name="content" spellcheck="true"><?= $promotionalMessage; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="promotionLink" class="form-label">Link</label>
            <input type="text" class="form-control" id="promotionTitle" name="title" value="<?php if(!empty($promotionalLink)) {echo $promotionalLink;} else {echo '';} ?>">
        </div>
        <input type="hidden" name="tokenId" value="<?= $tokenID ?>">
        <input type="hidden" name="platform" value="<?= $platform ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
