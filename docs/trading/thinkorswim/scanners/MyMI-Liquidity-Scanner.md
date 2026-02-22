# ================================
# MyMI Liquidity & Momentum Scanner (TOS)
# - SHIFT / H-SHIFT / LIQ BREAK filters
# Works in: Scan -> Stock Hacker -> Add study filter -> "Custom"
# ================================

input liqLength = 20;
input liqMergeATR = 0.25;

input useShift = yes;
input useHShift = yes;
input useLiqBreak = yes;

input requireVWAPBias = yes;  # if yes: long signals require close>VWAP, short require close<VWAP
input direction = {default "ANY", "LONG_ONLY", "SHORT_ONLY"};

input hShiftLen = 3;
input hShiftVolMultiplier = 1.2;

# -------------------------
# Core calcs
# -------------------------
def ema3  = ExpAverage(close, 3);
def ema8  = ExpAverage(close, 8);
def ema13 = ExpAverage(close, 13);
def ema55 = ExpAverage(close, 55);

def vwapValue = VWAP();
def atr14 = ATR(14);
def volSMA20 = Average(volume, 20);

def emaStackLong  = ema3 > ema8 and ema8 > ema13;
def emaStackShort = ema3 < ema8 and ema8 < ema13;

def longBias  = emaStackLong and (if requireVWAPBias then close > vwapValue else 1);
def shortBias = emaStackShort and (if requireVWAPBias then close < vwapValue else 1);

# -------------------------
# Liquidity proxy (TOS-safe)
# -------------------------
# ThinkScript cannot store dynamic arrays of levels like Pine,
# so we use a stable rolling "last swing" proxy.
def isPivotHigh = high == Highest(high, liqLength);
def isPivotLow  = low  == Lowest(low, liqLength);

rec lastLiqHigh = if isPivotHigh then high else lastLiqHigh[1];
rec lastLiqLow  = if isPivotLow then low else lastLiqLow[1];

# -------------------------
# Events
# -------------------------
def liqHighBreak = high > lastLiqHigh;
def liqLowBreak  = low  < lastLiqLow;

def liqHighSweep = high > lastLiqHigh and close < lastLiqHigh;
def liqLowSweep  = low  < lastLiqLow  and close > lastLiqLow;

def bearishDisplacement = close < low[1] and close < ema8;
def bullishDisplacement = close > high[1] and close > ema8;

def shiftShort = useShift and liqHighSweep and bearishDisplacement and shortBias;
def shiftLong  = useShift and liqLowSweep  and bullishDisplacement and longBias;

def volExpansion = volume > volSMA20 * hShiftVolMultiplier;

def strongBearDisplacement = close < ema13 and bearishDisplacement and volExpansion;
def strongBullDisplacement = close > ema13 and bullishDisplacement and volExpansion;

def hShiftShort = useHShift and strongBearDisplacement and shortBias;
def hShiftLong  = useHShift and strongBullDisplacement and longBias;

def breakShort = useLiqBreak and liqLowBreak and shortBias;
def breakLong  = useLiqBreak and liqHighBreak and longBias;

# Combine signal set (any of the enabled conditions)
def longSignal = (shiftLong or hShiftLong or breakLong);
def shortSignal = (shiftShort or hShiftShort or breakShort);

def signalAny =
    if direction == direction."LONG_ONLY" then longSignal
    else if direction == direction."SHORT_ONLY" then shortSignal
    else (longSignal or shortSignal);

plot scan = signalAny;
