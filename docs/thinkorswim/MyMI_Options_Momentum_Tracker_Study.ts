# =========================================================================
# MyMI Options Position & Trade Momentum Manager · thinkorswim Chart Study
# Two - Sided Weekly Momentum Strategy ($100 Call / $100 Put Target Balance)
# Matching CodeIgniter OptionsMomentumManager & TradingView Pine v6
# =========================================================================

# -------------------------------------------------------------------------
# 1. INPUT CONFIGURATION & STRATEGY SETTINGS
# -------------------------------------------------------------------------
input strategyMode = { default BRENT_SWEET_SPOT_2_OTM, AGGRESSIVE_GAMMA_1_OTM, PERCENT_OTM, ATM_STRADDLE, CUSTOM_STRIKES };
input strikesOtmCount = 2;          # Default: 2 strikes out from ATM (Brent Sweet Spot)
input otmOffsetPct = 2.6;           # 2.6% matches $192.50 / $182.50 on $187.50 BA
input strikeIntervalOverride = 0.0; # 0 = Auto‑detect ($2.50 BA/AAPL/DIS, $5.00 > $250, $1.00 SPY/QQQ)
input manualCallStrike = 0.0;       # Optional manual Call strike override
input manualPutStrike = 0.0;        # Optional manual Put strike override

input targetBalanceCall = 100.0;    # Target entry balance allocated to Call leg ($100.00)
input targetBalancePut = 100.0;     # Target entry balance allocated to Put leg ($100.00)
input entryDebitCall = 0.95;        # Per‑contract entry debit for Call (e.g. $0.95 or $3.15 BA)
input entryDebitPut = 0.95;         # Per‑contract entry debit for Put (e.g. $0.95 or $3.02 BA)
input targetNetProfit = 200.0;      # Target net profit in USD (default +$200.00)
input entryStockPrice = 0.0;        # 0 = auto session open, otherwise use supplied price

input showEmaLines = yes;
input showVwapLine = yes;
input showStrikeLines = yes;
input showBubbles = yes;
input enableAudioAlerts = yes;
input rvolThreshold = 1.20;
input trailRetracePct = 25.0;       # Alert when unrealized profit retraces > 25% from peak

input fastEmaLen = 9;
input slowEmaLen = 21;
input baselineEmaLen = 55;

# -------------------------------------------------------------------------
# 2. CORE MOMENTUM, VOLUME & DISPLACEMENT CALCULATIONS
# -------------------------------------------------------------------------
def p = close;
def v = volume;
def volSma20 = Average(v, 20);
def rvol = if volSma20 > 0 then v / volSma20 else 1.0;
def volSma5 = Average(v, 5);
def volAccel5 = if volSma20 > 0 then volSma5 / volSma20 else 1.0;

def fastEmaVal = ExpAverage(p, fastEmaLen);
def slowEmaVal = ExpAverage(p, slowEmaLen);
def baseEmaVal = ExpAverage(p, baselineEmaLen);
def vwapVal = vwap;
def atr14 = ATR(14);

def sym = GetSymbol();

# -------------------------------------------------------------------------
# 3. STRIKE STEP SIZE & BRENT SWEET SPOT CALCULATION
# -------------------------------------------------------------------------
# Auto‑detect strike intervals ($2.50 for BA, AAPL, DIS; $5.00 for > $250; etc.)
# Removed boolean defs; using direct symbol checks in detectedStep

def sessionStartPrice = if !IsNaN(open(period = AggregationPeriod.DAY)) then open(period = AggregationPeriod.DAY) else p;
def effectiveEntry = if entryStockPrice > 0 then entryStockPrice else sessionStartPrice;

def detectedStep = if effectiveEntry > 250 then 5.0
                   else if sym == "BA" or sym == "AAPL" or sym == "DIS" or sym == "IBM" then 2.5
                   else if effectiveEntry >= 75 and effectiveEntry <= 250 then 2.5
                   else if effectiveEntry > 50 then 1.0
                   else 0.5;

def stepSize = if strikeIntervalOverride > 0 then strikeIntervalOverride else detectedStep;
def atmBase = Round(effectiveEntry / stepSize, 0) * stepSize;

# Compute Call & Put strikes according to selected strategy

def calcCallStrike;
def calcPutStrike;

switch (strategyMode) {
    case CUSTOM_STRIKES:
        calcCallStrike = if manualCallStrike > 0 then manualCallStrike else atmBase + (strikesOtmCount * stepSize);
        calcPutStrike = if manualPutStrike > 0 then manualPutStrike else atmBase - (strikesOtmCount * stepSize);
    case ATM_STRADDLE:
        calcCallStrike = if manualCallStrike > 0 then manualCallStrike else atmBase;
        calcPutStrike = if manualPutStrike > 0 then manualPutStrike else atmBase;
    case AGGRESSIVE_GAMMA_1_OTM:
        calcCallStrike = if manualCallStrike > 0 then manualCallStrike else atmBase + stepSize;
        calcPutStrike = if manualPutStrike > 0 then manualPutStrike else atmBase - stepSize;
    case PERCENT_OTM:
        calcCallStrike = if manualCallStrike > 0 then manualCallStrike else Round((effectiveEntry * (1 + otmOffsetPct/100)) / stepSize, 0) * stepSize;
        calcPutStrike = if manualPutStrike > 0 then manualPutStrike else Round((effectiveEntry * (1 - otmOffsetPct/100)) / stepSize, 0) * stepSize;
    default: # BRENT_SWEET_SPOT_2_OTM
        calcCallStrike = if manualCallStrike > 0 then manualCallStrike else atmBase + (strikesOtmCount * stepSize);
        calcPutStrike = if manualPutStrike > 0 then manualPutStrike else atmBase - (strikesOtmCount * stepSize);
}

# Position sizing based on target balances

def contractsCall = Max(1, Round(targetBalanceCall / (entryDebitCall * 100), 0));
def contractsPut = Max(1, Round(targetBalancePut / (entryDebitPut * 100), 0));
def totalInvested = (contractsCall * entryDebitCall * 100) + (contractsPut * entryDebitPut * 100);
def combinedEntryDebit = entryDebitCall + entryDebitPut;
def requiredExitPerPair = combinedEntryDebit + (targetNetProfit / 100);

# -------------------------------------------------------------------------
# 4. DYNAMIC SYNTHETIC VALUATION & P&L ENGINE
# -------------------------------------------------------------------------
def deltaUp = Max(0, p - effectiveEntry);
def deltaDown = Max(0, effectiveEntry - p);

def callIntrinsic = Max(0, p - calcCallStrike);
def putIntrinsic = Max(0, calcPutStrike - p);

def estCallBid = Max(0.05, entryDebitCall + (deltaUp * 0.45) + (callIntrinsic * 0.55) - (deltaDown * 0.20));
def estPutBid = Max(0.05, entryDebitPut + (deltaDown * 0.45) + (putIntrinsic * 0.55) - (deltaUp * 0.20));
def estCombinedBid = estCallBid + estPutBid;

def currentTotalValue = (contractsCall * estCallBid * 100) + (contractsPut * estPutBid * 100);
def unrealizedPnl = currentTotalValue - totalInvested;
def unrealizedPct = if totalInvested > 0 then (unrealizedPnl / totalInvested) * 100 else 0;

# Peak tracking for trailing stop

def peakPnl = CompoundValue(1, Max(unrealizedPnl, peakPnl[1]), unrealizedPnl);
def profitDrawdown = peakPnl - unrealizedPnl;
def drawdownPct = if peakPnl > 50 then (profitDrawdown / peakPnl) * 100 else 0;

# Alerts & warnings

def targetReached = (unrealizedPnl >= targetNetProfit) or (estCombinedBid >= requiredExitPerPair);
def warnPeakDrawdown = (peakPnl >= 75) and (drawdownPct >= trailRetracePct);
def warnMomentumFade = (p[1] > fastEmaVal[1] and p < fastEmaVal) or (p[1] < fastEmaVal[1] and p > fastEmaVal);
def callStrikeBreached = (p >= calcCallStrike) and (p[1] < calcCallStrike);
def putStrikeBreached = (p <= calcPutStrike) and (p[1] > calcPutStrike);

# -------------------------------------------------------------------------
# 5. CHART PLOTS
# -------------------------------------------------------------------------
plot CallStrikePlot = if showStrikeLines then calcCallStrike else Double.NaN;
CallStrikePlot.SetDefaultColor(Color.YELLOW);
CallStrikePlot.SetStyle(Curve.SHORT_DASH);
CallStrikePlot.SetLineWeight(2);

plot PutStrikePlot = if showStrikeLines then calcPutStrike else Double.NaN;
PutStrikePlot.SetDefaultColor(Color.YELLOW);
PutStrikePlot.SetStyle(Curve.SHORT_DASH);
PutStrikePlot.SetLineWeight(2);

plot FastEmaPlot = if showEmaLines then fastEmaVal else Double.NaN;
FastEmaPlot.SetDefaultColor(Color.CYAN);
FastEmaPlot.SetStyle(Curve.FIRM);
FastEmaPlot.SetLineWeight(1);

plot SlowEmaPlot = if showEmaLines then slowEmaVal else Double.NaN;
SlowEmaPlot.SetDefaultColor(Color.ORANGE);
SlowEmaPlot.SetStyle(Curve.FIRM);
SlowEmaPlot.SetLineWeight(1);

plot BaseEmaPlot = if showEmaLines then baseEmaVal else Double.NaN;
BaseEmaPlot.SetDefaultColor(Color.PLUM);
BaseEmaPlot.SetStyle(Curve.FIRM);
BaseEmaPlot.SetLineWeight(2);

plot VwapPlot = if showVwapLine then vwapVal else Double.NaN;
VwapPlot.SetDefaultColor(Color.LIGHT_GRAY);
VwapPlot.SetStyle(Curve.POINTS);

# -------------------------------------------------------------------------
# 6. ACTIONABLE CHART BUBBLES
# -------------------------------------------------------------------------
AddChartBubble(showBubbles and targetReached and !targetReached[1], high,
    "TARGET REACHED (+$" + AsDollars(unrealizedPnl) + ")\nCLOSE BOTH LEGS",
    Color.GREEN, yes);

AddChartBubble(showBubbles and warnPeakDrawdown and !warnPeakDrawdown[1], high,
    "TRAILING EXIT (-" + AsPercent(drawdownPct/100) + " from peak)\nLOCK IN GAINS",
    Color.RED, yes);

AddChartBubble(showBubbles and callStrikeBreached, calcCallStrike,
    "CALL ITM BREACH ($" + AsDollars(calcCallStrike) + ")",
    Color.CYAN, yes);

AddChartBubble(showBubbles and putStrikeBreached, calcPutStrike,
    "PUT ITM BREACH ($" + AsDollars(calcPutStrike) + ")",
    Color.MAGENTA, no);

# -------------------------------------------------------------------------
# 7. VISUAL DASHBOARD HUD LABELS (TOP‑LEFT)
# -------------------------------------------------------------------------
AddLabel(yes,
    "MyMI Options · Brent Strangle (2 OTM) · " + sym + " ($" + AsDollars(p) + ")",
    Color.BLUE);

AddLabel(yes,
    "Strikes: C $" + AsDollars(calcCallStrike) + " / P $" + AsDollars(calcPutStrike) + " (Step $" + AsDollars(stepSize) + ")",
    Color.YELLOW);

AddLabel(yes,
    "Allocation: $" + AsDollars(targetBalanceCall) + " C / $" + AsDollars(targetBalancePut) + " P | Invested: $" + AsDollars(totalInvested) + " (" + contractsCall + "C / " + contractsPut + "P)",
    Color.WHITE);

AddLabel(yes,
    "Combined Debit: $" + AsDollars(estCombinedBid) + " (Entry: $" + AsDollars(combinedEntryDebit) + ")",
    Color.LIGHT_GRAY);

AddLabel(yes,
    "Target Net Profit: +$" + AsDollars(targetNetProfit) + " (Exit @ $" + AsDollars(requiredExitPerPair) + "/pair)",
    Color.GREEN);

AddLabel(yes,
    "P&L: " + (if unrealizedPnl >= 0 then "+$" else "-$") + AsDollars(AbsValue(unrealizedPnl)) + " (" + AsPercent(unrealizedPct/100) + ")",
    if unrealizedPnl >= targetNetProfit then Color.GREEN else if unrealizedPnl > 0 then Color.DARK_GREEN else Color.RED);

AddLabel(yes,
    "RVOL: " + AsText(rvol, "0.00") + "x | Vol Accel 5m: " + AsText(volAccel5, "0.00") + "x",
    if rvol >= rvolThreshold then Color.CYAN else Color.GRAY);

# Action guidance label

def callSurging = (p > fastEmaVal) and (fastEmaVal > slowEmaVal);
def putSurging = (p < fastEmaVal) and (fastEmaVal < slowEmaVal);

AddLabel(yes,
    if targetReached then "ACTION: TAKE PROFIT · CLOSE BOTH CONTRACTS"
    else if warnPeakDrawdown then "ACTION: TRAILING STOP TRIGGERED · PROTECT GAINS"
    else if p > calcCallStrike then "ACTION: CALL RUNNING (TRAIL EMA 9)"
    else if p < calcPutStrike then "ACTION: PUT RUNNING (TRAIL EMA 9)"
    else if callSurging then "ACTION: CALL SURGING · RIDE UPWARD"
    else if putSurging then "ACTION: PUT SURGING · RIDE DOWNWARD"
    else "ACTION: AWAITING VOLUME & MOMENTUM EXPANSION",
    if targetReached then Color.GREEN
    else if warnPeakDrawdown then Color.RED
    else if callSurging then Color.DARK_GREEN
    else if putSurging then Color.DARK_RED
    else Color.DARK_GRAY);

# -------------------------------------------------------------------------
# 8. AUDIO & PUSH NOTIFICATIONS
# -------------------------------------------------------------------------
Alert(enableAudioAlerts and targetReached and !targetReached[1],
      "MyMI Options Profit Target Reached! Close both legs to lock in profit.",
      Alert.BAR, Sound.Bell);

Alert(enableAudioAlerts and warnPeakDrawdown and !warnPeakDrawdown[1],
      "MyMI Options Trailing Retrace Warning: Profit dropped >25% from peak.",
      Alert.BAR, Sound.Ring);

Alert(enableAudioAlerts and callStrikeBreached,
      "MyMI Options Call Strike Breached In‑The‑Money!",
      Alert.BAR, Sound.Ding);

Alert(enableAudioAlerts and putStrikeBreached,
      "MyMI Options Put Strike Breached In‑The‑Money!",
      Alert.BAR, Sound.Ding);
