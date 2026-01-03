import React, { useMemo, useState } from 'react';
import { Button, StyleSheet, Text, TextInput, View } from 'react-native';
import { ScreenContainer, Card } from '../components/ScreenContainer';
import { StateBlock } from '../components/StateBlock';
import { useSdkClient } from '../hooks/useSdkClient';
import { useAsyncResource } from '../hooks/useAsyncResource';
import { colors } from '../styles/theme';

export const WatchlistScreen: React.FC = () => {
  const client = useSdkClient();
  const [query, setQuery] = useState('');
  const [pendingSymbol, setPendingSymbol] = useState<string | undefined>();

  const list = useAsyncResource('watchlist-list', () => client.watchlist.list({ useCache: true, cacheKey: 'watchlist:list' }));

  const search = useAsyncResource('watchlist-search', () => client.watchlist.searchTickers(query || '')); // runs on mount; minimal load

  const filteredResults = useMemo(() => {
    if (!search.data || !Array.isArray(search.data)) return [];
    if (!query) return [];
    return search.data.filter((row) => row.symbol.toLowerCase().includes(query.toLowerCase()));
  }, [query, search.data]);

  const addToWatchlist = async (symbol: string) => {
    setPendingSymbol(symbol);
    try {
      await client.watchlist.add({ symbol });
      await list.refetch();
    } catch (err) {
      // eslint-disable-next-line no-console
      console.error(err);
    } finally {
      setPendingSymbol(undefined);
    }
  };

  const removeFromWatchlist = async (symbol: string) => {
    setPendingSymbol(symbol);
    try {
      await client.watchlist.remove(symbol);
      await list.refetch();
    } catch (err) {
      // eslint-disable-next-line no-console
      console.error(err);
    } finally {
      setPendingSymbol(undefined);
    }
  };

  return (
    <ScreenContainer>
      <Card title="Your watchlist">
        <StateBlock loading={list.loading} error={list.error} onRetry={list.refetch} emptyText="No symbols yet">
          {list.data ? (
            <View>
              {list.data.map((item: any) => (
                <View key={item.symbol} style={styles.row}>
                  <Text style={styles.symbol}>{item.symbol}</Text>
                  <Button
                    title={pendingSymbol === item.symbol ? 'Removing…' : 'Remove'}
                    onPress={() => removeFromWatchlist(item.symbol)}
                    disabled={pendingSymbol === item.symbol}
                  />
                </View>
              ))}
            </View>
          ) : null}
        </StateBlock>
      </Card>

      <Card title="Search & add">
        <TextInput
          placeholder="Search tickers"
          placeholderTextColor={colors.subtext}
          value={query}
          onChangeText={(text) => {
            setQuery(text);
            search.refetch();
          }}
          style={styles.input}
        />
        <StateBlock loading={search.loading} error={search.error} onRetry={search.refetch} emptyText="Type to search">
          {filteredResults.map((row) => (
            <View key={row.symbol} style={styles.row}>
              <Text style={styles.symbol}>{row.symbol}</Text>
              <Button
                title={pendingSymbol === row.symbol ? 'Adding…' : 'Add'}
                onPress={() => addToWatchlist(row.symbol)}
                disabled={pendingSymbol === row.symbol}
              />
            </View>
          ))}
        </StateBlock>
      </Card>
    </ScreenContainer>
  );
};

const styles = StyleSheet.create({
  row: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    marginBottom: 10
  },
  symbol: { color: colors.text, fontSize: 16 },
  input: {
    backgroundColor: colors.panel,
    borderColor: colors.border,
    borderWidth: 1,
    borderRadius: 8,
    paddingHorizontal: 12,
    paddingVertical: 10,
    color: colors.text,
    marginBottom: 12
  }
});
