import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import { ScreenContainer, Card } from '../components/ScreenContainer';
import { StateBlock } from '../components/StateBlock';
import { useSdkClient } from '../hooks/useSdkClient';
import { useAsyncResource } from '../hooks/useAsyncResource';
import { colors } from '../styles/theme';

export const MarketingScreen: React.FC = () => {
  const client = useSdkClient();
  const summaries = useAsyncResource('marketing-summaries', () =>
    client.marketing.summaries({ useCache: true, cacheKey: 'marketing:summaries', ttlMs: 5 * 60_000 })
  );

  return (
    <ScreenContainer>
      <Card title="Marketing summaries">
        <StateBlock loading={summaries.loading} error={summaries.error} onRetry={summaries.refetch} emptyText="No summaries yet">
          {summaries.data ? (
            <View>
              {summaries.data.map((summary: any) => (
                <View key={summary.id} style={styles.item}>
                  <Text style={styles.title}>{summary.title}</Text>
                  <Text style={styles.meta}>{summary.created_at}</Text>
                  <Text style={styles.body}>{summary.summary}</Text>
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
  item: { marginBottom: 12 },
  title: { color: colors.text, fontWeight: '700' },
  meta: { color: colors.subtext, marginBottom: 4 },
  body: { color: colors.text }
});
