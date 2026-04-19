import { Redirect } from 'expo-router';
import { ActivityIndicator, View } from 'react-native';
import { useAuthStore } from '../src/state/auth';

export default function IndexScreen() {
  const { user, isBootstrapped } = useAuthStore();

  if (!isBootstrapped) {
    return (
      <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
        <ActivityIndicator />
      </View>
    );
  }

  return <Redirect href={user ? '/dashboard' : '/login'} />;
}
