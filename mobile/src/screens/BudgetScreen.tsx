import React, { useState } from 'react';
import { View, StyleSheet, Text, TextInput, Button } from 'react-native';
import { ScreenContainer, Card } from '../components/ScreenContainer';
import { StateBlock } from '../components/StateBlock';
import { useSdkClient } from '../hooks/useSdkClient';
import { useAsyncResource } from '../hooks/useAsyncResource';
import { formatMoney } from 'mymi-sdk';
import { colors } from '../styles/theme';

export const BudgetScreen: React.FC = () => {
  const client = useSdkClient();
  const [from, setFrom] = useState('');
  const [to, setTo] = useState('');
  const [strategy, setStrategy] = useState<'avalanche' | 'snowball'>('avalanche');

  const summary = useAsyncResource('budget-summary', () => client.budget.summary({ from, to }));
  const credit = useAsyncResource('budget-credit', () => client.budget.credit());
  const repayment = useAsyncResource('budget-repayment', () => client.budget.repayment({ strategy }));

  return (
    <ScreenContainer>
      <Card title="Filters">
        <View style={styles.row}>
          <View style={styles.field}>
            <Text style={styles.label}>From (YYYY-MM-DD)</Text>
            <TextInput style={styles.input} value={from} onChangeText={setFrom} placeholder="2025-06-01" placeholderTextColor={colors.subtext} />
          </View>
          <View style={styles.field}>
            <Text style={styles.label}>To (YYYY-MM-DD)</Text>
            <TextInput style={styles.input} value={to} onChangeText={setTo} placeholder="2025-06-30" placeholderTextColor={colors.subtext} />
          </View>
        </View>
        <View style={styles.row}>
          <Button title="Use avalanche" onPress={() => setStrategy('avalanche')} />
          <Button title="Use snowball" onPress={() => setStrategy('snowball')} />
        </View>
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

      <Card title="Credit Breakdown">
        <StateBlock loading={credit.loading} error={credit.error} onRetry={credit.refetch} emptyText="No credit data">
          {credit.data && Array.isArray(credit.data.items) ? (
            <View>
              {credit.data.items.map((item: any) => (
                <Text key={item.name} style={styles.value}>{item.name}: {formatMoney(item.balance || 0)}</Text>
              ))}
            </View>
          ) : null}
        </StateBlock>
      </Card>

      <Card title="Repayment Plan ({strategy})">
        <StateBlock loading={repayment.loading} error={repayment.error} onRetry={repayment.refetch}>
          {repayment.data && repayment.data.schedule ? (
            <View>
              {repayment.data.schedule.map((row: any, idx: number) => (
                <Text key={idx} style={styles.value}>{row.month}: {formatMoney(row.payment || 0)}</Text>
              ))}
            </View>
          ) : null}
        </StateBlock>
      </Card>
    </ScreenContainer>
  );
};

const styles = StyleSheet.create({
  row: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    gap: 12,
    marginBottom: 12
  },
  field: { flex: 1 },
  label: { color: colors.subtext, marginBottom: 6 },
  input: {
    backgroundColor: colors.panel,
    borderColor: colors.border,
    borderWidth: 1,
    borderRadius: 8,
    paddingHorizontal: 12,
    paddingVertical: 10,
    color: colors.text
  },
  value: { color: colors.text, marginBottom: 6 }
});
