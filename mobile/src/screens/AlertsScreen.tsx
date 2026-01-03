import React, { useState } from 'react';
import { Button, StyleSheet, Text, TextInput, View } from 'react-native';
import { ScreenContainer, Card } from '../components/ScreenContainer';
import { StateBlock } from '../components/StateBlock';
import { useSdkClient } from '../hooks/useSdkClient';
import { useAsyncResource } from '../hooks/useAsyncResource';
import { colors } from '../styles/theme';

export const AlertsScreen: React.FC = () => {
  const client = useSdkClient();
  const [ticker, setTicker] = useState('MSFT');

  const alerts = useAsyncResource(`alerts-${ticker}`, () => client.alerts.newsByTicker(ticker));

  return (
    <ScreenContainer>
      <Card title="Ticker">
        <TextInput
          value={ticker}
          onChangeText={(text) => setTicker(text.toUpperCase())}
          placeholder="MSFT"
          placeholderTextColor={colors.subtext}
          autoCapitalize="characters"
          style={styles.input}
        />
        <Button title="Refresh" onPress={alerts.refetch} />
      </Card>

      <Card title="Alerts & News">
        <StateBlock loading={alerts.loading} error={alerts.error} onRetry={alerts.refetch} emptyText="No news yet">
          {alerts.data && Array.isArray(alerts.data) ? (
            <View>
              {alerts.data.map((item: any, idx: number) => (
                <View key={idx} style={styles.item}>
                  <Text style={styles.title}>{item.title || 'Alert'}</Text>
                  <Text style={styles.meta}>{item.published_at || item.created_at}</Text>
                  <Text style={styles.body}>{item.summary || item.message}</Text>
                </View>
              ))}
            </View>
          ) : null}
        </StateBlock>
      </Card>
    </ScreenContainer>
  );
};

const styles = StyleSheet.create({
  input: {
    backgroundColor: colors.panel,
    borderColor: colors.border,
    borderWidth: 1,
    borderRadius: 8,
    paddingHorizontal: 12,
    paddingVertical: 10,
    color: colors.text,
    marginBottom: 12
  },
  item: {
    marginBottom: 12
  },
  title: { color: colors.text, fontWeight: '700' },
  meta: { color: colors.subtext, marginBottom: 4 },
  body: { color: colors.text }
});
