declare upper;

# ===============================
# ======= INPUTS ================
# ===============================

input enableMomentum = yes;
input enableEMA = yes;
input enableLiquidity = yes;

input liqLength = 20;
input liqMergeATR = 0.25;

input showLBreak = yes;
input showSBreak = yes;
input showShift = yes;
input showHShift = yes;

input hShiftLen = 3;
input hShiftWindow = 25;
input hShiftVolMultiplier = 1.2;

# ===============================
# ======= CORE CALCS ============
# ===============================

def ema3  = ExpAverage(close, 3);
def ema8  = ExpAverage(close, 8);
def ema13 = ExpAverage(close, 13);
def ema34 = ExpAverage(close, 34);
def ema55 = ExpAverage(close, 55);
def ema70 = ExpAverage(close, 70);

def vwapValue = VWAP();
def atr14 = ATR(14);
def volSMA20 = Average(volume, 20);

# ===============================
# ===== EMA RIBBON ==============
# ===============================

plot p8  = if enableEMA then ema8 else Double.NaN;
plot p13 = if enableEMA then ema13 else Double.NaN;
plot p55 = if enableEMA then ema55 else Double.NaN;
plot p70 = if enableEMA then ema70 else Double.NaN;

p8.SetDefaultColor(Color.ORANGE);
p13.SetDefaultColor(Color.CYAN);
p55.SetDefaultColor(Color.WHITE);
p70.SetDefaultColor(Color.MAGENTA);

plot vwapPlot = vwapValue;
vwapPlot.SetDefaultColor(Color.WHITE);

# ===============================
# ===== LIQUIDITY ENGINE ========
# ===============================

def pivotHigh = high == Highest(high, liqLength) and high[liqLength] < high;
def pivotLow  = low == Lowest(low, liqLength) and low[liqLength] > low;

def mergeThreshold = atr14 * liqMergeATR;

rec lastLiqHigh = if pivotHigh then high else lastLiqHigh[1];
rec lastLiqLow  = if pivotLow then low else lastLiqLow[1];

plot liqHighLine = if enableLiquidity then lastLiqHigh else Double.NaN;
plot liqLowLine  = if enableLiquidity then lastLiqLow else Double.NaN;

liqHighLine.SetDefaultColor(Color.RED);
liqLowLine.SetDefaultColor(Color.GREEN);

liqHighLine.SetStyle(Curve.SHORT_DASH);
liqLowLine.SetStyle(Curve.SHORT_DASH);

# ===============================
# ===== LIQ BREAKS ==============
# ===============================

def liqHighBreak = showLBreak and high > lastLiqHigh;
def liqLowBreak  = showSBreak and low  < lastLiqLow;

AddChartBubble(liqHighBreak, high, "L-BREAK", Color.GREEN, yes);
AddChartBubble(liqLowBreak, low, "S-BREAK", Color.RED, no);

# ===============================
# ===== MOMENTUM LOGIC ==========
# ===============================

def emaStackLong  = ema3 > ema8 and ema8 > ema13;
def emaStackShort = ema3 < ema8 and ema8 < ema13;

def longBias  = emaStackLong and close > vwapValue;
def shortBias = emaStackShort and close < vwapValue;

def emaSpread = AbsValue(ema8 - ema55);
def spreadContracting = emaSpread < emaSpread[1] and emaSpread[1] < emaSpread[2];

# ===============================
# ===== SHIFT ENGINE ============
# ===============================

def liqHighSweep = high > lastLiqHigh and close < lastLiqHigh;
def liqLowSweep  = low  < lastLiqLow  and close > lastLiqLow;

def bearishDisplacement = close < low[1] and close < ema8;
def bullishDisplacement = close > high[1] and close > ema8;

def shiftToShort = showShift and (liqHighSweep and bearishDisplacement);
def shiftToLong  = showShift and (liqLowSweep  and bullishDisplacement);

AddChartBubble(shiftToShort, high, "SHIFT ↓", Color.RED, yes);
AddChartBubble(shiftToLong, low, "SHIFT ↑", Color.GREEN, no);

# ===============================
# ===== H-SHIFT ENGINE ==========
# ===============================

def pivH = high == Highest(high, hShiftLen);
def pivL = low  == Lowest(low, hShiftLen);

rec hPivotHigh = if pivH then high else hPivotHigh[1];
rec hPivotLow  = if pivL then low  else hPivotLow[1];

def volExpansion = volume > volSMA20 * hShiftVolMultiplier;

def strongBearDisplacement = close < ema13 and bearishDisplacement and volExpansion;
def strongBullDisplacement = close > ema13 and bullishDisplacement and volExpansion;

def hShiftToShort = showHShift and strongBearDisplacement;
def hShiftToLong  = showHShift and strongBullDisplacement;

AddChartBubble(hShiftToShort, high, "H-SHIFT ↓", Color.RED, yes);
AddChartBubble(hShiftToLong, low, "H-SHIFT ↑", Color.GREEN, no);
