import React, { useState } from 'react';
import { Alert, Button, StyleSheet, TextInput, View, Text } from 'react-native';
import { useRouter } from 'expo-router';
import { useSdkClient } from '../hooks/useSdkClient';
import { useAuth } from '../hooks/useAuth';
import { ScreenContainer, Card } from '../components/ScreenContainer';
import { colors } from '../styles/theme';

export const LoginScreen: React.FC = () => {
  const client = useSdkClient();
  const { setToken } = useAuth();
  const router = useRouter();
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [loading, setLoading] = useState(false);

  const handleLogin = async () => {
    setLoading(true);
    try {
      const response = await client.auth.login({ email, password });
      if (response.success && response.data?.accessToken) {
        setToken(response.data.accessToken);
        router.replace('/dashboard');
      } else {
        Alert.alert('Login failed', response.error || 'Unable to login');
      }
    } catch (err) {
      const message = err instanceof Error ? err.message : 'Login failed';
      Alert.alert('Login failed', message);
    } finally {
      setLoading(false);
    }
  };

  return (
    <ScreenContainer>
      <Card title="Login">
        <View style={styles.field}>
          <Text style={styles.label}>Email</Text>
          <TextInput
            value={email}
            onChangeText={setEmail}
            placeholder="you@example.com"
            placeholderTextColor={colors.subtext}
            autoCapitalize="none"
            keyboardType="email-address"
            style={styles.input}
          />
        </View>
        <View style={styles.field}>
          <Text style={styles.label}>Password</Text>
          <TextInput
            value={password}
            onChangeText={setPassword}
            placeholder="••••••••"
            placeholderTextColor={colors.subtext}
            secureTextEntry
            style={styles.input}
          />
        </View>
        <Button title={loading ? 'Signing in…' : 'Login'} onPress={handleLogin} disabled={loading} />
        <View style={styles.switchRow}>
          <Text style={styles.switchText}>No account?</Text>
          <Button title="Register" onPress={() => router.push('/register')} />
        </View>
      </Card>
    </ScreenContainer>
  );
};

const styles = StyleSheet.create({
  field: {
    marginBottom: 12
  },
  label: {
    color: colors.subtext,
    marginBottom: 6
  },
  input: {
    backgroundColor: colors.panel,
    borderColor: colors.border,
    borderWidth: 1,
    borderRadius: 8,
    paddingHorizontal: 12,
    paddingVertical: 10,
    color: colors.text
  },
  switchRow: {
    marginTop: 12,
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between'
  },
  switchText: {
    color: colors.subtext
  }
});
