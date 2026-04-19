import { useLocalSearchParams } from 'expo-router';
import { ActivityIndicator, Text, View } from 'react-native';
import { WebView } from 'react-native-webview';
import { WEB_BASE_URL } from '../../src/constants/config';

export default function WebviewFallbackScreen() {
  const { slug } = useLocalSearchParams<{ slug: string }>();
  const route = Array.isArray(slug) ? slug[0] : slug;

  if (!route) {
    return <View><Text>Invalid route</Text></View>;
  }

  return (
    <WebView
      source={{ uri: `${WEB_BASE_URL}/${route}` }}
      startInLoadingState
      renderLoading={() => <ActivityIndicator style={{ marginTop: 32 }} />}
      injectedJavaScriptBeforeContentLoaded={`window.__MYMI_MOBILE = true; true;`}
      onShouldStartLoadWithRequest={() => true}
      sharedCookiesEnabled
      thirdPartyCookiesEnabled
      javaScriptEnabled
    />
  );
}
