<h2>Update Earnings Information</h2>
<form action="<?= site_url('earnings/update') ?>" method="post">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">


    <input type="hidden" name="id" value="<?= $company['id'] ?>">

    <label for="review">Earnings Review</label>
    <textarea name="review" id="review" required><?= $company['review'] ?></textarea>

    <label for="market_reaction">Market Reaction</label>
    <textarea name="market_reaction" id="market_reaction" required><?= $company['market_reaction'] ?></textarea>

    <label for="percent_gain_loss">Percent Gain/Loss</label>
    <input type="text" name="percent_gain_loss" id="percent_gain_loss" value="<?= $company['percent_gain_loss'] ?>" required>

    <label for="open_price">Open Price</label>
    <input type="text" name="open_price" id="open_price" value="<?= $company['open_price'] ?>" required>

    <label for="close_price">Close Price</label>
    <input type="text" name="close_price" id="close_price" value="<?= $company['close_price'] ?>" required>

    <button type="submit">Update</button>
</form>
