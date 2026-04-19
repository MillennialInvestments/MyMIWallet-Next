import { useQuery } from '@tanstack/react-query';
import { Text } from 'react-native';
import { alertsApi } from '../../src/api/alerts';
import { Page } from '../../src/components/Page';

export default function AlertsScreen() {
  const query = useQuery({ queryKey: ['mobile-alerts'], queryFn: async () => (await alertsApi.getOverview()).data });
  return <Page><Text style={{ color: 'white', fontSize: 24 }}>Alerts</Text><Text style={{ color: 'white' }}>{query.isPending ? 'Loading...' : JSON.stringify(query.data?.data ?? {}, null, 2)}</Text></Page>;
}
