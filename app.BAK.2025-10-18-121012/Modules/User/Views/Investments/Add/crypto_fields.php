<!-- Cryptocurrency-specific form fields -->
<input type="hidden" class="form-control" id="trade_type" name="trade_type" value="Crypto">
<div class="form-group">
    <label for="symbol">Symbol</label>
    <input type="text" class="form-control" id="symbol" name="symbol" placeholder="Enter Symbol" required>
</div>

<div class="form-group">
    <label for="shares">Number of Coins</label>
    <input type="number" class="form-control" id="shares" name="shares" placeholder="Enter Number of Coins" step="0.0001" required>
</div>

<div class="form-group">
    <label for="price">Price per Coin ($)</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price per Coin" step="0.01" required>
</div>

<div class="form-group">
    <label for="cost">Total Cost ($)</label>
    <input type="number" class="form-control" id="cost" name="cost" placeholder="Total Cost" step="0.01" readonly>
</div>

<div class="form-group">
    <label for="wallet_address">Wallet Address</label>
    <input type="text" class="form-control" id="wallet_address" name="wallet_address" placeholder="Enter Wallet Address">
</div>

<div class="form-group">
    <label for="transaction_hash">Transaction Hash</label>
    <input type="text" class="form-control" id="transaction_hash" name="transaction_hash" placeholder="Enter Transaction Hash">
</div>

<div class="form-group">
    <label for="network_fees">Network Fees ($)</label>
    <input type="number" class="form-control" id="network_fees" name="network_fees" placeholder="Enter Network Fees" step="0.01">
</div>
