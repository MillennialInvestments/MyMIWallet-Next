import React from 'react';
import { ActivityIndicator, StyleSheet, Text, TouchableOpacity, View } from 'react-native';

interface Props {
  loading?: boolean;
  error?: string;
  emptyText?: string;
  onRetry?: () => void;
  children?: React.ReactNode;
}

export const StateBlock: React.FC<Props> = ({ loading, error, emptyText, onRetry, children }) => {
  if (loading) {
    return (
      <View style={styles.container}>
        <ActivityIndicator color="#66b1ff" />
        <Text style={styles.text}>Loading…</Text>
      </View>
    );
  }

  if (error) {
    return (
      <View style={styles.container}>
        <Text style={[styles.text, styles.error]}>Error: {error}</Text>
        {onRetry ? (
          <TouchableOpacity onPress={onRetry} style={styles.retry}>
            <Text style={styles.retryText}>Retry</Text>
          </TouchableOpacity>
        ) : null}
      </View>
    );
  }

  if (!children) {
    return (
      <View style={styles.container}>
        <Text style={styles.text}>{emptyText || 'No data yet.'}</Text>
      </View>
    );
  }

  return <>{children}</>;
};

const styles = StyleSheet.create({
  container: {
    paddingVertical: 12,
    alignItems: 'center'
  },
  text: {
    color: '#c5d5e5',
    marginTop: 6
  },
  error: {
    color: '#f08c8c'
  },
  retry: {
    marginTop: 6,
    paddingHorizontal: 12,
    paddingVertical: 6,
    borderRadius: 8,
    backgroundColor: '#1f2f46'
  },
  retryText: {
    color: '#7ec4ff',
    fontWeight: '600'
  }
});
