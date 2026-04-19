import { useQuery } from '@tanstack/react-query';
import { Link } from 'expo-router';
import { Text } from 'react-native';
import { apiClient } from '../src/api/client';
import { Page } from '../src/components/Page';
import { useProtectedRoute } from '../src/hooks/useProtectedRoute';

export default function DashboardScreen() {
  useProtectedRoute();
  const query = useQuery({ queryKey: ['mobile-dashboard'], queryFn: async () => (await apiClient.get('/mobile/dashboard')).data });

  return (
    <Page>
      <Text style={{ color: 'white', fontSize: 24 }}>Dashboard</Text>
      <Text style={{ color: 'white' }}>{query.isPending ? 'Loading...' : JSON.stringify(query.data?.data ?? {}, null, 2)}</Text>
      <Link href="/budget" style={{ color: '#60a5fa' }}>Budget</Link>
      <Link href="/investments" style={{ color: '#60a5fa' }}>Investments</Link>
      <Link href="/alerts" style={{ color: '#60a5fa' }}>Alerts</Link>
      <Link href="/account" style={{ color: '#60a5fa' }}>Account</Link>
      <Link href="/support" style={{ color: '#60a5fa' }}>Support</Link>
    </Page>
  );
}
