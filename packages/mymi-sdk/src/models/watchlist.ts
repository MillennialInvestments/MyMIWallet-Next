export interface WatchlistItem {
  symbol: string;
  notes?: string;
  created_at?: string;
}

export interface WatchlistSearchResult {
  symbol: string;
  name?: string;
  exchange?: string;
  currency?: string;
  source?: string;
}
