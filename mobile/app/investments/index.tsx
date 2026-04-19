import { Link } from 'expo-router';
import { Text } from 'react-native';
import { Page } from '../../src/components/Page';

export default function InvestmentsScreen() {
  return <Page><Text style={{ color: 'white', fontSize: 24 }}>Investments</Text><Link href="/investments/watchlist" style={{ color: '#60a5fa' }}>Watchlist</Link></Page>;
}
