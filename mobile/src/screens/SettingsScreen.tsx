import React from 'react';
import { Button, StyleSheet, Text, View } from 'react-native';
import { ScreenContainer, Card } from '../components/ScreenContainer';
import { StateBlock } from '../components/StateBlock';
import { useSdkClient } from '../hooks/useSdkClient';
import { useAsyncResource } from '../hooks/useAsyncResource';
import { useAuth } from '../hooks/useAuth';
import { colors } from '../styles/theme';

export const SettingsScreen: React.FC = () => {
  const client = useSdkClient();
  const { clearToken } = useAuth();

  const me = useAsyncResource('user-me', () => client.user.me());
  const health = useAsyncResource('health', () => client.health.check({ useCache: true, cacheKey: 'health', ttlMs: 30_000 }));

  return (
    <ScreenContainer>
      <Card title="Profile">
        <StateBlock loading={me.loading} error={me.error} onRetry={me.refetch}>
          {me.data ? (
            <View>
              <Text style={styles.value}>Name: {me.data.name || 'n/a'}</Text>
              <Text style={styles.value}>Email: {me.data.email}</Text>
            </View>
          ) : null}
        </StateBlock>
      </Card>

      <Card title="API Health">
        <StateBlock loading={health.loading} error={health.error} onRetry={health.refetch}>
          {health.data ? (
            <View>
              <Text style={styles.value}>Status: {health.data.status}</Text>
              <Text style={styles.value}>DB: {health.data.db}</Text>
              <Text style={styles.meta}>{health.data.time}</Text>
            </View>
          ) : null}
        </StateBlock>
      </Card>

      <Button title="Logout" onPress={clearToken} />
    </ScreenContainer>
  );
};

const styles = StyleSheet.create({
  value: { color: colors.text, marginBottom: 6 },
  meta: { color: colors.subtext }
});
