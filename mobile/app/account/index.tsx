import { Link } from 'expo-router';
import { Text } from 'react-native';
import { Page } from '../../src/components/Page';

export default function AccountScreen() {
  return <Page><Text style={{ color: 'white', fontSize: 24 }}>Account</Text><Link href="/account/settings" style={{ color: '#60a5fa' }}>Settings</Link></Page>;
}
