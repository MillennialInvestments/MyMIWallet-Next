import React, { useState } from 'react';
import { Alert, Button, StyleSheet, TextInput, View, Text } from 'react-native';
import { useRouter } from 'expo-router';
import { useSdkClient } from '../hooks/useSdkClient';
import { useAuth } from '../hooks/useAuth';
import { ScreenContainer, Card } from '../components/ScreenContainer';
import { colors } from '../styles/theme';

export const RegisterScreen: React.FC = () => {
  const client = useSdkClient();
  const { setToken } = useAuth();
  const router = useRouter();
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [name, setName] = useState('');
  const [loading, setLoading] = useState(false);

  const handleRegister = async () => {
    setLoading(true);
    try {
      const response = await client.auth.register({ email, password, name });
      if (response.success && response.data?.accessToken) {
        setToken(response.data.accessToken);
        router.replace('/dashboard');
      } else {
        Alert.alert('Registration failed', response.error || 'Unable to register');
      }
    } catch (err) {
      const message = err instanceof Error ? err.message : 'Registration failed';
      Alert.alert('Registration failed', message);
    } finally {
      setLoading(false);
    }
  };

  return (
    <ScreenContainer>
      <Card title="Create account">
        <View style={styles.field}>
          <Text style={styles.label}>Name</Text>
          <TextInput
            value={name}
            onChangeText={setName}
            placeholder="Your name"
            placeholderTextColor={colors.subtext}
            style={styles.input}
          />
        </View>
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
        <Button title={loading ? 'Creating…' : 'Register'} onPress={handleRegister} disabled={loading} />
      </Card>
    </ScreenContainer>
  );
};

const styles = StyleSheet.create({
  field: { marginBottom: 12 },
  label: { color: colors.subtext, marginBottom: 6 },
  input: {
    backgroundColor: colors.panel,
    borderColor: colors.border,
    borderWidth: 1,
    borderRadius: 8,
    paddingHorizontal: 12,
    paddingVertical: 10,
    color: colors.text
  }
});
