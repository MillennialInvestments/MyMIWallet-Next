import { Text } from 'react-native';
import { Page } from '../src/components/Page';

export default function ForgotPasswordScreen() {
  return (
    <Page>
      <Text style={{ color: 'white', fontSize: 24 }}>Forgot password</Text>
      <Text style={{ color: 'white' }}>Use web fallback until dedicated mobile reset endpoint is enabled.</Text>
    </Page>
  );
}
