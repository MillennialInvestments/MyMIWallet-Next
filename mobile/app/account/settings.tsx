import { useRouter } from 'expo-router';
import { Button, Text } from 'react-native';
import { Page } from '../../src/components/Page';
import { useAuthStore } from '../../src/state/auth';

export default function SettingsScreen() {
  const router = useRouter();
  const logout = useAuthStore((s) => s.logout);

  return (
    <Page>
      <Text style={{ color: 'white', fontSize: 24 }}>Settings</Text>
      <Button title="Logout" onPress={async () => { await logout(); router.replace('/login'); }} />
    </Page>
  );
}
