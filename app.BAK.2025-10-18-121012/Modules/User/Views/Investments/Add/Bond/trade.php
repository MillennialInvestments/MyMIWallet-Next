<!-- Stock-specific form fields -->
<div class="form-group">
    <label for="symbol">Symbol</label>
    <select class="form-control selectpicker" id="symbol" name="symbol" data-live-search="true" title="Enter or Search Symbol" required></select>
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
<h6 class="subheader pt-3">Additional Trade Information</h6>
<hr>
<div class="form-group">
    <label for="cost">Price Target</label>
    <input type="number" class="form-control" id="cost" name="cost" placeholder="Total Cost" step="0.01" readonly>
</div>

<div class="form-group">
    <label for="cost">Stop Loss</label>
    <input type="number" class="form-control" id="cost" name="cost" placeholder="Total Cost" step="0.01" readonly>
</div>
<h6 class="subheader pt-3">Additional Analtyics/Tracking Information</h6>
<hr>
<div class="form-group">
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
</div>
<div class="form-group pt-3">
    <div class="col-md-4"></div>
    <div class="col-12 col-md-8">
        <div class="row">
            <div class="col-6 px-1">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-6 px-1">
                <button type="submit" class="btn btn-primary btn-block" id="addNewWalletSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>
