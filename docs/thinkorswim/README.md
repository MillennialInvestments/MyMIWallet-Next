# MyMI Options Opportunity Scanner & Momentum Manager for thinkorswim (TOS)

This directory contains the native **thinkScript** suite corresponding directly to the **MyMI Weekly Options Opportunity Scanner and Trade Momentum Manager** ($100 Call / $100 Put target balance entry, $1.90 debit, $3.90 exit target, +$200 net profit target, Brent Sweet Spot 2 strikes OTM).

---

## Suite Components

| File | Purpose | Where to Use in thinkorswim |
| :--- | :--- | :--- |
| **`MyMI_Options_Momentum_Stock_Hacker_Scan.ts`** | Autonomous candidate scanner (single-plot query) | **Scan** tab $\to$ **Stock Hacker** $\to$ Study Filter |
| **`MyMI_Options_Momentum_Watchlist_Column.ts`** | Live RVOL with color-coded alert state | Watchlist sidebar / Scan results column |
| **`MyMI_Options_Momentum_Tracker_Study.ts`** | Complete Chart Study, Strike Lines & HUD Overlay | **Charts** tab $\to$ Studies $\to$ Edit Studies |

---

## 1. How to Set Up the Stock Hacker Scanner

1. In thinkorswim, navigate to the **Scan** tab $\to$ **Stock Hacker**.
2. Under **Scan in:** select your preferred universe:
   - Recommended: **All Optionable** or a custom watchlist containing `NVDA, TSLA, AMD, BA, COIN, SPY, QQQ, IWM`.
3. Click **Add filter** $\to$ **Study**.
4. Click on the study dropdown (default is ADX) $\to$ select **Custom...**.
5. In the Custom Study window:
   - Delete any default text in the **thinkScript Editor** tab.
   - Open and copy the entire contents of [`MyMI_Options_Momentum_Stock_Hacker_Scan.ts`](./MyMI_Options_Momentum_Stock_Hacker_Scan.ts).
   - Paste the code into the **thinkScript Editor**.
   - Set the aggregation timeframe to **D** (Daily) or **15m / 5m** depending on your scanning horizon.
6. Click **OK**.
7. In the top right corner of the Scan tab, click the hamburger menu icon $\to$ **Save scan query...** $\to$ name it `MyMI_Options_Momentum_Scanner`.
8. Click **Scan**! Qualified stocks with high RVOL, volume acceleration, 5-day movement reachability, and clean IV/RV pricing will display in real time.

---

## 2. How to Set Up the Custom Watchlist Column

1. In the thinkorswim left sidebar (or any Watchlist / Scan Results table), click the small **Gear / Customize** icon at the top right of the table headers.
2. In the Customize Quotes dialog, search for `Custom`.
3. Double-click on any available `Custom1`, `Custom2`, etc.
4. Click on the small **scroll/script icon** next to the selected custom item to open the editor.
5. In the **thinkScript Editor** tab:
   - Set the Column Name to `MyMI Mom` or `RVOL`.
   - Set the aggregation timeframe to **D** (Daily) or **5m**.
   - Paste the contents of [`MyMI_Options_Momentum_Watchlist_Column.ts`](./MyMI_Options_Momentum_Watchlist_Column.ts).
6. Click **OK** $\to$ click **Apply**.
7. The column will now display the live RVOL ratio with background colors:
   - **Dark Green**: Call momentum surging with high volume.
   - **Dark Red**: Put momentum surging with high volume.
   - **Dark Orange**: Volatility squeeze (coiling before expansion).

---

## 3. How to Set Up the Chart Study & HUD Overlay

1. Open a chart for any stock (e.g. `BA`, `NVDA`, `TSLA`, `SPY`).
2. Click **Studies** (flask icon) $\to$ **Edit Studies...** (or press `Ctrl+E`).
3. Click **Create...** (bottom left corner).
4. Enter Study Name: `MyMI_Options_Momentum_Tracker`.
5. Erase all existing text in the editor window.
6. Copy and paste the entire contents of [`MyMI_Options_Momentum_Tracker_Study.ts`](./MyMI_Options_Momentum_Tracker_Study.ts).
7. Click **OK** $\to$ click **Apply** $\to$ click **OK**.

### What Displays on Your Chart:
- **Dashed Yellow Lines**: The automatically calculated Brent Sweet Spot strikes:
  - Upper: Call Strike (e.g., $192.50 on BA)
  - Lower: Put Strike (e.g., $182.50 on BA)
- **Cyan Line**: Fast EMA (9)
- **Orange Line**: Slow EMA (21)
- **Plum Line**: Baseline EMA (55)
- **Top-Left HUD Labels**:
  - Live Ticker, Price, and calculated Strike intervals.
  - Sizing allocation ($100 Call / $100 Put) and total outlay ($190.00 standard or $617.00 for BA).
  - Estimated combined debit & required exit price ($3.90/pair for standard or $8.17/pair for BA) for +$200 target profit.
  - Live unrealized P&L and peak profit trailing drawdown.
  - Real-time **ACTION GUIDANCE** (Hold, Ride Upward, Take Profit, or Trailing Stop Triggered).
- **Audio & Visual Alerts**:
  - In-The-Money strike breaches.
  - +$200 profit target reached.
  - Trailing stop protection when profit pulls back >25% from peak.
