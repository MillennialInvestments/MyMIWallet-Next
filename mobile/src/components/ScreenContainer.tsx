import React from 'react';
import { SafeAreaView } from 'react-native-safe-area-context';
import { ScrollView, StyleSheet, View, Text as RNText } from 'react-native';

interface Props {
  children: React.ReactNode;
  padded?: boolean;
}

export const ScreenContainer: React.FC<Props> = ({ children, padded = true }) => (
  <SafeAreaView style={styles.safe}>
    <ScrollView contentContainerStyle={[styles.content, padded && styles.padded]}>{children}</ScrollView>
  </SafeAreaView>
);

export const Card: React.FC<React.PropsWithChildren<{ title?: string }>> = ({ title, children }) => (
  <View style={styles.card}>
    {title ? <View style={styles.cardHeader}><TextLabel text={title} /></View> : null}
    {children}
  </View>
);

export const TextLabel: React.FC<{ text: string; muted?: boolean }> = ({ text, muted }) => (
  <View style={styles.labelWrapper}>
    <Text style={[styles.label, muted && styles.muted]}>{text}</Text>
  </View>
);

export const Text: React.FC<{ style?: object; children: React.ReactNode }> = ({ style, children }) => (
  <View>
    <RNText style={[styles.text, style]}>{children}</RNText>
  </View>
);

import { Text as RNText } from 'react-native';

const styles = StyleSheet.create({
  safe: {
    flex: 1,
    backgroundColor: '#0c1117'
  },
  content: {
    flexGrow: 1
  },
  padded: {
    padding: 16
  },
  card: {
    backgroundColor: '#121923',
    padding: 16,
    borderRadius: 12,
    marginBottom: 12,
    borderWidth: 1,
    borderColor: '#1f2a36'
  },
  cardHeader: {
    marginBottom: 8
  },
  labelWrapper: {
    marginBottom: 4
  },
  label: {
    color: '#9fb3c8',
    fontSize: 14,
    fontWeight: '600'
  },
  muted: {
    color: '#73859b'
  },
  text: {
    color: '#e5ecf4',
    fontSize: 16
  }
});
