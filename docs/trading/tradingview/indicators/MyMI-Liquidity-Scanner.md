//@version=5
indicator("MyMI Liquidity & Momentum Tracker v9.2 (Structure + Liquidity Engine)",
     shorttitle="MyMI-MT v9.2",
     overlay=true,
     max_labels_count=500,
     max_lines_count=500,
     max_boxes_count=500)

// ======================================================================
// ========================== MASTER TOGGLES ============================
// ======================================================================

groupMaster = "Master Controls"
enableMomentum     = input.bool(true,  "Enable Momentum Engine", group=groupMaster)
enableEMA          = input.bool(true,  "Enable EMA Ribbon", group=groupMaster)
enableLiquidity    = input.bool(true,  "Enable Liquidity Swings (Lux Merge)", group=groupMaster)

// ======================================================================
// ============================ VISUAL INPUTS ===========================
// ======================================================================

groupVisual = "Momentum Visuals"
labelSizeInput = input.string("Small", "Momentum Label Size", options=["Tiny","Small","Normal","Large"], group=groupVisual)

labelSize =
     labelSizeInput == "Tiny"   ? size.tiny :
     labelSizeInput == "Small"  ? size.small :
     labelSizeInput == "Normal" ? size.normal :
     size.large

// ======================================================================
// ======================= CORE CALCULATIONS ============================
// ======================================================================

ema3  = ta.ema(close, 3)
ema8  = ta.ema(close, 8)
ema13 = ta.ema(close, 13)
ema34 = ta.ema(close, 34)
ema55 = ta.ema(close, 55)
ema70 = ta.ema(close, 70)

vwap  = ta.vwap(hlc3)
atr14 = ta.atr(14)
volSMA20 = ta.sma(volume, 20)

emaDisplay = enableEMA ? display.all : display.none

// ======================================================================
// ===================== LABEL SETTINGS (ALL) ===========================
// ======================================================================

groupLabels = "Sequenced Momentum Labels"

showLRev   = input.bool(true,  "Show L-Reversal", group=groupLabels)
showLEntry = input.bool(true,  "Show L-Entry",    group=groupLabels)
showLExit  = input.bool(true,  "Show L-Exit",     group=groupLabels)

showSRev   = input.bool(true,  "Show S-Reversal", group=groupLabels)
showSEntry = input.bool(true,  "Show S-Entry",    group=groupLabels)
showSExit  = input.bool(true,  "Show S-Exit",     group=groupLabels)

showLCont  = input.bool(true, "Show L-Cont", group=groupLabels)
showSCont  = input.bool(true, "Show S-Cont", group=groupLabels)

showLBreak = input.bool(true, "Show L-Break (Break LIQ High)", group=groupLabels)
showSBreak = input.bool(true, "Show S-Break (Break LIQ Low)",  group=groupLabels)

contCooldownBars = input.int(15, "Continuation Cooldown (bars)", minval=1, maxval=200, group=groupLabels)
contRequireBetweenLiquidity = input.bool(true, "Continuation Requires Price Between LIQ Levels", group=groupLabels)

showShift      = input.bool(true, "Show Momentum Shift", group=groupLabels)

showHShift     = input.bool(true, "Show H-Shift (Hard Pivot)", group=groupLabels)
hShiftLen      = input.int(3, "H-Shift Pivot Length", minval=1, maxval=10, group=groupLabels)
hShiftWindow   = input.int(25, "H-Shift Confirm Window (bars)", minval=5, maxval=200, group=groupLabels)
hShiftVolMultiplier = input.float(1.2, "H-Shift Volume Multiplier", minval=1.0, step=0.1, group=groupLabels)

colShiftLong   = input.color(color.new(color.green,0), "Shift Up Color", group=groupLabels)
colShiftShort  = input.color(color.new(color.red,0),   "Shift Down Color", group=groupLabels)

colHShiftLong  = input.color(color.new(color.lime,0),  "H-Shift Up Color", group=groupLabels)
colHShiftShort = input.color(color.new(color.red,0),   "H-Shift Down Color", group=groupLabels)

shiftCooldownBars = input.int(8, "Shift Cooldown (bars)", minval=0, maxval=200, group=groupLabels)
minBarsBetweenLabels = input.int(0, "Min Bars Between Labels (0 = off)", minval=0, maxval=50, group=groupLabels)

colLRev   = input.color(color.teal,                 "L-Reversal Color", group=groupLabels)
colLEntry = input.color(color.new(color.green, 0),  "L-Entry Color",    group=groupLabels)
colLExit  = input.color(color.new(color.orange, 0), "L-Exit Color",     group=groupLabels)

colSRev   = input.color(color.new(color.red, 0),     "S-Reversal Color", group=groupLabels)
colSEntry = input.color(color.new(color.maroon, 0),  "S-Entry Color",    group=groupLabels)
colSExit  = input.color(color.new(color.orange, 0),  "S-Exit Color",     group=groupLabels)

colLCont  = input.color(color.new(color.aqua, 0),    "L-Cont Color",     group=groupLabels)
colSCont  = input.color(color.new(color.fuchsia,0),  "S-Cont Color",     group=groupLabels)

colLBreak = input.color(color.new(color.lime, 0),    "L-Break Color",    group=groupLabels)
colSBreak = input.color(color.new(color.red,  0),    "S-Break Color",    group=groupLabels)

// ======================================================================
// ===================== ADVANCED MERGED LIQUIDITY ENGINE ==============
// ======================================================================

groupLiquidity = "Liquidity Engine"

liqLength   = input.int(20, "Pivot Lookback", group=groupLiquidity, minval=2)
liqArea     = input.string("Wick Extremity", "Swing Area", options=["Wick Extremity","Full Range"], group=groupLiquidity)
liqMergeATR = input.float(0.25, "Merge Threshold (ATR %)", step=0.05, group=groupLiquidity)
maxLevels   = input.int(8, "Max Historical Levels", minval=1, maxval=50, group=groupLiquidity)

showSwingHigh = input.bool(true, "Show Swing Highs", group=groupLiquidity)
showSwingLow  = input.bool(true, "Show Swing Lows",  group=groupLiquidity)

liqHighColor = input.color(color.red,  "High Level Color", group=groupLiquidity)
liqLowColor  = input.color(color.teal, "Low Level Color",  group=groupLiquidity)

liqHighZone  = input.color(color.new(color.red,80),  "High Zone Color", group=groupLiquidity)
liqLowZone   = input.color(color.new(color.teal,80), "Low Zone Color",  group=groupLiquidity)

liqLabelSizeInput = input.string("Small","Liquidity Label Size", options=["Tiny","Small","Normal","Large"], group=groupLiquidity)
liqLabelSize = liqLabelSizeInput == "Tiny" ? size.tiny : liqLabelSizeInput == "Small" ? size.small : liqLabelSizeInput == "Normal" ? size.normal : size.large

ph = ta.pivothigh(high, liqLength, liqLength)
pl = ta.pivotlow(low,  liqLength, liqLength)

mergeThreshold = atr14 * liqMergeATR

var float[] highLevels = array.new_float()
var float[] lowLevels  = array.new_float()
var line[]  highLines  = array.new_line()
var line[]  lowLines   = array.new_line()

// Required by downstream logic
var float lastLiqHigh = na
var float lastLiqLow  = na
var bool  lastHighBroken = false
var bool  lastLowBroken  = false

// ----------------------- HIGH LEVELS (history + merge) ----------------
if enableLiquidity and showSwingHigh and not na(ph)
    float newHigh = ph
    bool merged = false
    int mergeIdx = na

    if array.size(highLevels) > 0
        for i = 0 to array.size(highLevels) - 1
            float lvl = array.get(highLevels, i)
            if math.abs(lvl - newHigh) <= mergeThreshold
                array.set(highLevels, i, math.max(lvl, newHigh))
                merged := true
                mergeIdx := i

    if merged and not na(mergeIdx)
        lastLiqHigh := array.get(highLevels, mergeIdx)
        lastHighBroken := false
    else
        if array.size(highLevels) >= maxLevels
            if array.size(highLines) > 0
                line.delete(array.shift(highLines))
            array.shift(highLevels)
        array.push(highLevels, newHigh)
        array.push(highLines, line.new(bar_index-liqLength, newHigh, bar_index, newHigh, color=liqHighColor, width=1))
        label.new(bar_index-liqLength, newHigh, "LIQ HIGH", style=label.style_label_down, color=color.black, textcolor=liqHighColor, size=liqLabelSize)
        lastLiqHigh := newHigh
        lastHighBroken := false

// ----------------------- LOW LEVELS (history + merge) -----------------
if enableLiquidity and showSwingLow and not na(pl)
    float newLow = pl
    bool merged = false
    int mergeIdx = na

    if array.size(lowLevels) > 0
        for i = 0 to array.size(lowLevels) - 1
            float lvl = array.get(lowLevels, i)
            if math.abs(lvl - newLow) <= mergeThreshold
                array.set(lowLevels, i, math.min(lvl, newLow))
                merged := true
                mergeIdx := i

    if merged and not na(mergeIdx)
        lastLiqLow := array.get(lowLevels, mergeIdx)
        lastLowBroken := false
    else
        if array.size(lowLevels) >= maxLevels
            if array.size(lowLines) > 0
                line.delete(array.shift(lowLines))
            array.shift(lowLevels)
        array.push(lowLevels, newLow)
        array.push(lowLines, line.new(bar_index-liqLength, newLow, bar_index, newLow, color=liqLowColor, width=1))
        label.new(bar_index-liqLength, newLow, "LIQ LOW", style=label.style_label_up, color=color.black, textcolor=liqLowColor, size=liqLabelSize)
        lastLiqLow := newLow
        lastLowBroken := false

// Extend all liquidity lines safely
if enableLiquidity
    if array.size(highLines) > 0
        for i = 0 to array.size(highLines) - 1
            line.set_x2(array.get(highLines, i), bar_index)
    if array.size(lowLines) > 0
        for i = 0 to array.size(lowLines) - 1
            line.set_x2(array.get(lowLines, i), bar_index)

// ======================================================================
// ======================= MOMENTUM ENGINE ==============================
// ======================================================================

emaStackLong  = ema3 > ema8 and ema8 > ema13
emaStackShort = ema3 < ema8 and ema8 < ema13

longBias  = emaStackLong and close > vwap
shortBias = emaStackShort and close < vwap

longExitRisk  = (ema8 < ema13) or (close < vwap)
shortExitRisk = (ema8 > ema13) or (close > vwap)

var int pos = 0
var int seq = 0

var int lastLblBar   = na
var int lastContBar  = na
var int lastShiftBar = na

canPrintLabel() =>
    minBarsBetweenLabels == 0 ? true :
     na(lastLblBar) ? true :
     (bar_index - lastLblBar) >= minBarsBetweenLabels

canPrintCont() =>
    na(lastContBar) ? true :
     (bar_index - lastContBar) >= contCooldownBars

canPrintShift() =>
    shiftCooldownBars == 0 ? true :
     na(lastShiftBar) ? true :
     (bar_index - lastShiftBar) >= shiftCooldownBars

buildLabel(_anchor, _dir, _txt, _color) =>
    float y = _anchor + (_dir * atr14 * 1.2)
    label.new(bar_index, y, _txt, style=_dir == -1 ? label.style_label_up : label.style_label_down, color=_color, textcolor=color.white, size=labelSize)

// ======================================================================
// =================== BREAK + CONTINUATION + SHIFT =====================
// ======================================================================

liqHighBreak = showLBreak and not na(lastLiqHigh) and not lastHighBroken and (high > lastLiqHigh)
liqLowBreak  = showSBreak and not na(lastLiqLow)  and not lastLowBroken  and (low  < lastLiqLow)

emaSpreadOK = atr14 > 0 ? math.abs(ema8 - ema55) > atr14 * 0.20 : false
trendLongOK  = longBias  and emaSpreadOK
trendShortOK = shortBias and emaSpreadOK

betweenLiquidityLongOK  = contRequireBetweenLiquidity ? (na(lastLiqHigh) ? true : close < lastLiqHigh) : true
betweenLiquidityShortOK = contRequireBetweenLiquidity ? (na(lastLiqLow)  ? true : close > lastLiqLow ) : true

lContEvent = showLCont and (pos == 1)  and trendLongOK  and canPrintCont() and betweenLiquidityLongOK
sContEvent = showSCont and (pos == -1) and trendShortOK and canPrintCont() and betweenLiquidityShortOK

// ======================================================================
// ======================== SHIFT ENGINE (REPLACEMENT) ==================
// ======================================================================

_hasHistory(_barsBack) => bar_index >= _barsBack

_emaSpread = math.abs(ema8 - ema55)
_spreadContracting = _hasHistory(2) and _emaSpread < _emaSpread[1] and _emaSpread[1] < _emaSpread[2]

_liqHighSweep = not na(lastLiqHigh) and high > lastLiqHigh and close < lastLiqHigh
_liqLowSweep  = not na(lastLiqLow)  and low  < lastLiqLow  and close > lastLiqLow

_lowerHigh = _hasHistory(2) and high < high[1] and high[1] > high[2]
_higherLow = _hasHistory(2) and low  > low[1]  and low[1]  < low[2]

_bearishDisplacement = _hasHistory(1) and close < low[1]  and close < ema8
_bullishDisplacement = _hasHistory(1) and close > high[1] and close > ema8

shiftToShort = showShift and ((_liqHighSweep and close < ema8) or (_lowerHigh and _spreadContracting and _bearishDisplacement))
shiftToLong  = showShift and ((_liqLowSweep  and close > ema8) or (_higherLow and _spreadContracting and _bullishDisplacement))

// ======================================================================
// ====================== HARD PIVOT H-SHIFT ENGINE =====================
// ======================================================================

pivH = ta.pivothigh(high, hShiftLen, hShiftLen)
pivL = ta.pivotlow(low,  hShiftLen, hShiftLen)

var float hPivotHighPrice = na
var int   hPivotHighBar   = na
var bool  hShortArmed     = false

var float hPivotLowPrice  = na
var int   hPivotLowBar    = na
var bool  hLongArmed      = false

if not na(pivH)
    hPivotHighPrice := pivH
    hPivotHighBar   := bar_index - hShiftLen
    hShortArmed     := true

if not na(pivL)
    hPivotLowPrice := pivL
    hPivotLowBar   := bar_index - hShiftLen
    hLongArmed     := true

if hShortArmed and not na(hPivotHighBar) and (bar_index - hPivotHighBar) > hShiftWindow
    hShortArmed := false

if hLongArmed and not na(hPivotLowBar) and (bar_index - hPivotLowBar) > hShiftWindow
    hLongArmed := false

volExpansion = not na(volSMA20) and volume > volSMA20 * hShiftVolMultiplier

emaBearFlip = ema8 < ema13
emaBullFlip = ema8 > ema13

strongBearDisplacement = _hasHistory(1) and close < ema13 and _bearishDisplacement and volExpansion
strongBullDisplacement = _hasHistory(1) and close > ema13 and _bullishDisplacement and volExpansion

structureBreakDown = _hasHistory(6) and close < ta.lowest(low, 5)[1]
structureBreakUp   = _hasHistory(6) and close > ta.highest(high, 5)[1]

hShiftToShort = showHShift and ((hShortArmed and emaBearFlip and _spreadContracting and strongBearDisplacement) or (pos == 1 and structureBreakDown and volExpansion and emaBearFlip))
hShiftToLong  = showHShift and ((hLongArmed  and emaBullFlip and _spreadContracting and strongBullDisplacement) or (pos == -1 and structureBreakUp   and volExpansion and emaBullFlip))

// ======================================================================
// ========================== PRINTING BLOCK ============================
// ======================================================================

if enableMomentum and barstate.isconfirmed

    if liqHighBreak and canPrintLabel()
        buildLabel(high, 1, "L-BREAK", colLBreak)
        lastLblBar := bar_index
        lastHighBroken := true

    if liqLowBreak and canPrintLabel()
        buildLabel(low, -1, "S-BREAK", colSBreak)
        lastLblBar := bar_index
        lastLowBroken := true

    if lContEvent and canPrintLabel()
        buildLabel(low, -1, "L-CONT", colLCont)
        lastLblBar := bar_index
        lastContBar := bar_index

    if sContEvent and canPrintLabel()
        buildLabel(high, 1, "S-CONT", colSCont)
        lastLblBar := bar_index
        lastContBar := bar_index

    if hShiftToShort and canPrintLabel() and canPrintShift()
        buildLabel(high, 1, "H-SHIFT ↓", colHShiftShort)
        lastLblBar := bar_index
        lastShiftBar := bar_index
        hShortArmed := false
        pos := -1

    else if hShiftToLong and canPrintLabel() and canPrintShift()
        buildLabel(low, -1, "H-SHIFT ↑", colHShiftLong)
        lastLblBar := bar_index
        lastShiftBar := bar_index
        hLongArmed := false
        pos := 1

    else if shiftToShort and canPrintLabel() and canPrintShift()
        buildLabel(high, 1, "SHIFT ↓", colShiftShort)
        lastLblBar := bar_index
        lastShiftBar := bar_index
        pos := -1

    else if shiftToLong and canPrintLabel() and canPrintShift()
        buildLabel(low, -1, "SHIFT ↑", colShiftLong)
        lastLblBar := bar_index
        lastShiftBar := bar_index
        pos := 1

// ======================================================================
// ========================== EMA RIBBON ================================
// ======================================================================

p3  = plot(ema3,  display=display.none)
p8  = plot(ema8,  display=display.none)
p13 = plot(ema13, display=display.none)
p34 = plot(ema34, display=display.none)
p55 = plot(ema55, display=display.none)

fill(p3,  p8,  color = enableEMA ? color.new(color.green,80) : na)
fill(p3,  p13, color = enableEMA ? color.new(color.blue,80)  : na)
fill(p13, p34, color = enableEMA ? color.new(color.lime,80)  : na)
fill(p34, p55, color = enableEMA ? color.new(color.red,80)   : na)

plot(ema8,  color=color.orange, display=emaDisplay)
plot(ema13, color=color.blue,   display=emaDisplay)
plot(ema55, color=color.white,  linewidth=2, display=emaDisplay)
plot(ema70, color=color.purple, linewidth=2, display=emaDisplay)

plot(vwap, color=color.white, linewidth=2)
