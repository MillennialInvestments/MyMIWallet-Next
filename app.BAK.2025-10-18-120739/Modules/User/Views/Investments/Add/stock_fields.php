<!-- Stock-specific form fields -->

<input type="hidden" class="form-control" id="trade_type" name="trade_type" value="Stock">

<div class="form-group">
    <label for="symbol">Enter Symbol</label>
    <input type="text" class="form-control" id="symbol" name="symbol" onchange="updateCost();" placeholder="Manually Enter Symbol" step="0.01" required>
</div>

<div class="form-group">
    <label for="shares">Number of Shares</label>
    <input type="number" class="form-control" id="shares" name="shares" onchange="updateCost();" placeholder="Enter Number of Shares" step="0.01" required>
</div>

<div class="form-group">
    <label for="price">Price per Share ($)</label>
    <input type="number" class="form-control" id="price" name="price" onchange="updateCost();" placeholder="Enter Price per Share" step="0.01" required>
</div>

<div class="form-group">
    <label for="cost">Total Cost ($)</label>
    <input type="number" class="form-control" id="cost" name="cost" placeholder="Total Cost" step="0.01" readonly>
</div>

<!-- <div class="form-group">
    <label for="dividend_yield">Dividend Yield (%)</label>
    <input type="number" class="form-control" id="dividend_yield" name="dividend_yield" placeholder="Enter Dividend Yield" step="0.01">
</div>

<div class="form-group">
    <label for="market_cap">Market Cap ($)</label>
    <input type="number" class="form-control" id="market_cap" name="market_cap" placeholder="Enter Market Cap" step="1">
</div>

<div class="form-group">
    <label for="pe_ratio">P/E Ratio</label>
    <input type="number" class="form-control" id="pe_ratio" name="pe_ratio" placeholder="Enter P/E Ratio" step="0.01">
</div> -->

