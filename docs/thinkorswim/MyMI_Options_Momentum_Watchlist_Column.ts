# =========================================================================
# MyMI Options Momentum · thinkorswim Custom Watchlist Column
# Displays Live Relative Volume (RVOL) with Color-Coded Momentum Alert State
# =========================================================================

input fastEmaLen = 9;
input slowEmaLen = 21;
input baselineEmaLen = 55;
input minRvol = 1.20;

def p = close;
def v = volume;
def volSma20 = Average(v, 20);
def rvol = if volSma20 > 0 then Round(v / volSma20, 1) else 1.0;

def fastEma = ExpAverage(p, fastEmaLen);
def slowEma = ExpAverage(p, slowEmaLen);
def baseEma = ExpAverage(p, baselineEmaLen);

# Bollinger vs Keltner Volatility Compression (Squeeze)
def bbUpper = BollingerBandsSMA()."UpperBand";
def bbLower = BollingerBandsSMA()."LowerBand";
def kUpper = KeltnerChannels()."Upper_Band";
def kLower = KeltnerChannels()."Lower_Band";
def inSqueeze = (bbUpper < kUpper) and (bbLower > kLower);

def isCallSurge = (fastEma > slowEma) and (p > fastEma) and (rvol >= minRvol);
def isPutSurge  = (fastEma < slowEma) and (p < fastEma) and (rvol >= minRvol);

# Display RVOL as the primary metric
plot Data = rvol;

# Background Color Coding:
# Dark Green  = Call Momentum Ignited with Volume Surge (RVOL >= 1.2)
# Dark Red    = Put Momentum Ignited with Volume Surge (RVOL >= 1.2)
# Dark Orange = Volatility Squeeze (Pre-Expansion Coil)
# Default     = Baseline / Neutral
AssignBackgroundColor(
    if isCallSurge then Color.DARK_GREEN
    else if isPutSurge then Color.DARK_RED
    else if inSqueeze then Color.DARK_ORANGE
    else Color.CURRENT
);
