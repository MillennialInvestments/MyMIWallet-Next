# MyMI Momentum Tracker + Crystal Order Block (Public)

## A) Overview
- **What it is:** EMA ribbon and VWAP momentum framework that aligns breakout structure (pivot support/resistance) with Crystal Order Block visualization for context. Designed to highlight when trend bias, volume confirmation, and structure breaks are in agreement.
- **What it is not:** A guarantee of outcomes or financial advice. Signals are informational and should be paired with independent analysis and risk management.

## B) Components
- **Momentum Tracker**
  - EMA ribbon with VWAP bands for directional bias.
  - Confirm/Early/Hazard signals to categorize momentum strength.
  - Pivot support/resistance breakout alignment to surface structurally confirmed moves.
  - Clarity presets to tune sensitivity for noise vs. responsiveness.
- **Crystal Order Block**
  - High-level detection: identifies order blocks from structural highs/lows with displacement; marks zones for potential reaction.
  - Filters: minimum ATR-height threshold and maximum visible order-block count to avoid clutter.
  - Mitigation behavior: zones mark invalidation/mitigation when breached to help avoid re-using stale blocks.

## C) Inputs (Recommended Defaults)
- `srLookback = 20`
- `retestBars = 5`
- `srTolerance = 0.25`
- `volConfirmLen = 20`
- `clarityPreset = Balanced`
- `clarityCobMax = 10`
- `clarityObMinAtr = 0.10`

Inputs that materially affect performance: object count controls (e.g., `clarityCobMax`) and broader lookbacks (e.g., `srLookback`) can increase drawing load on lower timeframes.

## D) How To Use (Workflows)
1. **Trend bias workflow (EMA/VWAP)**
   - Use the EMA ribbon and VWAP bands to establish bullish or bearish bias.
   - Favor setups aligned with ribbon slope and price relation to VWAP bands.
2. **Confirm signal workflow (buyConfirm/sellConfirm + filters)**
   - Wait for Buy Confirm / Sell Confirm signals; treat Early/Hazard as context only.
   - Combine signals with volume confirmation and clarity preset to reduce noise.
3. **Breakout alignment workflow (pivot S/R + retest + volume)**
   - Identify pivot support/resistance levels from the indicator.
   - Look for break + retest behavior within `retestBars`, with volume confirmed via `volConfirmLen`.
   - Prioritize trades when breakout alignment agrees with trend bias.

## E) Limitations
- Pivot support/resistance confirmations can arrive late relative to the initial move.
- Alerts convey conditions only; they are not predictions.
- Object-heavy drawings (order blocks, labels) can be demanding on low timeframes.
- Crypto or extended-hours behavior depends on the symbol session and VWAP settings.

## F) Alerts
- Internal/Swing BOS/CHoCH
- Order block breaks
- Equal highs/lows
- FVG (if enabled)
- Buy Confirm / Sell Confirm / Pivot Buy / Pivot Sell
- Breakout Aligned / Breakdown Aligned

## G) Publishing Notes
- Suggested category: **Momentum**
- Suggested tags: `momentum`, `ema`, `vwap`, `breakout`, `support-resistance`, `order-block`
- Suggested signature: “MyMI Wallet — Technical Analysis Tools”
- Safe description wording: “Educational TradingView indicator combining momentum bias, structure alignment, and order block visualization. No guarantees; use with independent analysis and risk management.”
