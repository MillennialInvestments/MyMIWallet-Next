import React from 'react';
import { View, StyleSheet, Text } from 'react-native';
import { ScreenContainer, Card } from '../components/ScreenContainer';
import { StateBlock } from '../components/StateBlock';
import { useSdkClient } from '../hooks/useSdkClient';
import { useAsyncResource } from '../hooks/useAsyncResource';
import { colors } from '../styles/theme';
import { formatMoney } from 'mymi-sdk';

export const DashboardScreen: React.FC = () => {
  const client = useSdkClient();
  const summary = useAsyncResource('budget-summary', () =>
    client.budget.summary({ from: '', to: '' }, { useCache: true, cacheKey: 'budget:summary' })
  );
  const available = useAsyncResource('budget-available', () =>
    client.budget.available({ from: '', to: '' }, { useCache: true, cacheKey: 'budget:available' })
  );

  return (
    <ScreenContainer>
      <Card title="Dashboard">
        <Text style={styles.meta}>Environment: {process.env.EXPO_PUBLIC_MYMI_APP_ENV || 'dev'}</Text>
        <Text style={styles.meta}>API: {client.baseUrl}</Text>
      </Card>

      <Card title="Budget Summary">
        <StateBlock loading={summary.loading} error={summary.error} onRetry={summary.refetch}>
          {summary.data ? (
            <View>
              <Text style={styles.value}>Income: {formatMoney(summary.data.income || 0)}</Text>
              <Text style={styles.value}>Expenses: {formatMoney(summary.data.expenses || 0)}</Text>
              <Text style={styles.value}>Savings Rate: {(summary.data.savingsRate || 0) * 100}%</Text>
            </View>
          ) : null}
        </StateBlock>
      </Card>

      <Card title="Available">
        <StateBlock loading={available.loading} error={available.error} onRetry={available.refetch}>
          {available.data ? (
            <Text style={styles.value}>{formatMoney(available.data.cashAvailable || 0)}</Text>
          ) : null}
        </StateBlock>
      </Card>
    </ScreenContainer>
  );
};

const styles = StyleSheet.create({
  meta: { color: colors.subtext, marginBottom: 4 },
  value: { color: colors.text, fontSize: 18, marginBottom: 6 }
});
