import { useQuery } from '@tanstack/react-query';
import { Text } from 'react-native';
import { budgetApi } from '../../src/api/budget';
import { Page } from '../../src/components/Page';

export default function BudgetScreen() {
  const query = useQuery({ queryKey: ['mobile-budget'], queryFn: async () => (await budgetApi.getOverview()).data });
  return <Page><Text style={{ color: 'white', fontSize: 24 }}>Budget</Text><Text style={{ color: 'white' }}>{query.isPending ? 'Loading...' : JSON.stringify(query.data?.data ?? {}, null, 2)}</Text></Page>;
}
