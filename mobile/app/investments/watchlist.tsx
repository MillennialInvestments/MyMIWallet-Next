import { useQuery } from '@tanstack/react-query';
import { Text } from 'react-native';
import { investmentsApi } from '../../src/api/investments';
import { Page } from '../../src/components/Page';

export default function WatchlistScreen() {
  const query = useQuery({ queryKey: ['mobile-investments'], queryFn: async () => (await investmentsApi.getOverview()).data });
  return <Page><Text style={{ color: 'white', fontSize: 24 }}>Watchlist</Text><Text style={{ color: 'white' }}>{query.isPending ? 'Loading...' : JSON.stringify(query.data?.data ?? {}, null, 2)}</Text></Page>;
}
