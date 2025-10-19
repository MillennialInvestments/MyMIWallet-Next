<div class="container">
    <h2>Add Pending Trade Alert</h2>
    <input name="user_id" type="hidden" value="<?= $cuID ?? 1 ?>"> <!-- Set dynamically -->
    <input type="hidden" name="order_status" value="OPENING"> <!-- Set appropriately -->
    <div class="form-group">
        <label for="symbol">Ticker:</label>
        <input type="text" class="form-control" id="symbol" name="symbol" required>
    </div>
    <div class="form-group">
        <label for="entry_price">Price:</label>
        <input type="number" class="form-control" id="entry_price" name="entry_price" required>
    </div>
    <div class="form-group">
        <label for="volume">Volume:</label>
        <input type="number" class="form-control" id="volume" name="volume" required>
    </div>
    <div class="form-group">
        <label for="alertType">Type:</label>
        <select class="form-control" id="alertType" name="alertType" required>
            <option value="Buy">Buy</option>
            <option value="Sell">Sell</option>
        </select>
    </div>
    <div class="form-group">
        <label for="details">Details:</label>
        <textarea class="form-control" id="details" name="details"></textarea>
    </div>
    <!-- Add more fields as necessary -->
    <button type="submit" class="btn btn-primary">Add Alert</button>
</div>
