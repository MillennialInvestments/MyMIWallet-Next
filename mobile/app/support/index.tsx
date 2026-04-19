import { Link } from 'expo-router';
import { Text } from 'react-native';
import { Page } from '../../src/components/Page';

export default function SupportScreen() {
  return <Page><Text style={{ color: 'white', fontSize: 24 }}>Support</Text><Link href="/webview/support" style={{ color: '#60a5fa' }}>Open support center</Link></Page>;
}
