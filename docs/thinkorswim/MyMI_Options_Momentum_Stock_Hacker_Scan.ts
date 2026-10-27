# =========================================================================
# MyMI Options Opportunity Scanner · thinkorswim Stock Hacker Filter
# Two-Sided Weekly Options Momentum Strategy ($100 Call / $100 Put)
# Matching CodeIgniter OptionsScannerEngine & TradingView Pine v6
# =========================================================================

input minPrice = 15.0;
input minAvgVolume = 1000000;
input minRvol = 1.20;
input minVolAccel = 1.10;
input maxIvRv = 1.80;
input min5DayRangePct = 3.5; # Minimum 5-day historical movement capacity %
input fastEmaLen = 9;
input slowEmaLen = 21;
input baselineEmaLen = 55;
input direction = {default ANY, CALL_SURGE, PUT_SURGE};

# 1. Price & Liquidity Filter
def p = close;
def v = volume;
def validPrice = p >= minPrice;
def volSma20 = Average(v, 20);
def validVolume = volSma20 >= minAvgVolume or v >= minAvgVolume;

# 2. Relative Volume & Volume Acceleration Filter
def rvol = if volSma20 > 0 then v / volSma20 else 1.0;
def volSma5 = Average(v, 5);
def volAccel = if volSma20 > 0 then volSma5 / volSma20 else 1.0;
def validVolumeSurge = rvol >= minRvol and volAccel >= minVolAccel;

# 3. 5-Day Historical Movement Capacity (Reachability Engine)
# Required price movement capacity to produce +$200 net profit on $1.90 debit
def atr14 = ATR(14);
def fiveDayRange = Average(high - low, 5);
def fiveDayRangePct = if p > 0 then (fiveDayRange / p) * 100 else 0;
def isReachable = fiveDayRangePct >= min5DayRangePct or ((atr14 * 2.236) / p * 100) >= min5DayRangePct;

# 4. Momentum Ignition & Trend Alignment
def fastEma = ExpAverage(p, fastEmaLen);
def slowEma = ExpAverage(p, slowEmaLen);
def baseEma = ExpAverage(p, baselineEmaLen);

def callIgnition = (fastEma > slowEma) and (p > fastEma) and (p > baseEma);
def putIgnition  = (fastEma < slowEma) and (p < fastEma) and (p < baseEma);

def momentumMatch = switch (direction) {
    case CALL_SURGE: callIgnition
    case PUT_SURGE:  putIgnition
    default:         callIgnition or putIgnition
};

# 5. Overpriced Extrinsic Value Guard (IV/RV Ratio)
# Prevents buying options when IV is artificially inflated
def iv = if !IsNaN(ImpVolatility()) then ImpVolatility() else 0.30;
def hv = if !IsNaN(HistoricalVolatility(20)) and HistoricalVolatility(20) > 0 then HistoricalVolatility(20) else 0.30;
def ivRvRatio = if hv > 0 then iv / hv else 1.0;
def ivNotOverpriced = ivRvRatio <= maxIvRv;

# 6. Final Qualification Signal for Stock Hacker (Exactly 1 plot required)
plot scan = validPrice and validVolume and validVolumeSurge and isReachable and momentumMatch and ivNotOverpriced;
