# Navbar Search & Ticker Lookup

## API Endpoint

- **GET** `/API/Investments/searchTickers`
  - `query` *(string, required)* — user-entered search string.
  - `limit` *(int, optional)* — max results (clamped between 1 and 25, default 10).
  - **Response**: JSON `{ "status": "success", "data": [ { "symbol", "name", "exchange", "currency", "source" } ] }`.
  - Local database hits come back first with `source: "local"`; AlphaVantage fallbacks use `source: "alpha"`.

## Navbar Search Flow

1. User types in the dashboard navbar search field.
2. `public/assets/js/navbar-search.js` debounces keystrokes and calls the API for autocomplete suggestions.
3. The dropdown lists up to eight tickers; selecting one navigates directly to `/Investments/Symbol/{symbol}`.
4. Submitting the form (Enter or Search button) navigates to `/Search?query=...`, which renders the results list using the same API.

## Future Enhancements

- Extend `/API/Investments/searchTickers` with additional providers (e.g., cached MarketAux) before hitting AlphaVantage.
- Expand `/Search` to include site-wide content results (pages, knowledgebase, projects) alongside tickers.
- Add client-side caching of the most recent queries to reduce round trips during fast typing bursts.