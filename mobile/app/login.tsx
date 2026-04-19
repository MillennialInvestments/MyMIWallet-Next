import { zodResolver } from '@hookform/resolvers/zod';
import { Link, useRouter } from 'expo-router';
import { useForm } from 'react-hook-form';
import { Button, Text, TextInput } from 'react-native';
import { z } from 'zod';
import { Page } from '../src/components/Page';
import { useAuthStore } from '../src/state/auth';

const schema = z.object({ email: z.string().email(), password: z.string().min(8) });
type FormData = z.infer<typeof schema>;

export default function LoginScreen() {
  const router = useRouter();
  const login = useAuthStore((s) => s.login);
  const { register, setValue, handleSubmit } = useForm<FormData>({ resolver: zodResolver(schema) });

  register('email');
  register('password');

  return (
    <Page>
      <Text style={{ color: 'white', fontSize: 24 }}>Login</Text>
      <TextInput placeholder="Email" autoCapitalize="none" onChangeText={(v) => setValue('email', v)} style={{ backgroundColor: 'white', padding: 12 }} />
      <TextInput placeholder="Password" secureTextEntry onChangeText={(v) => setValue('password', v)} style={{ backgroundColor: 'white', padding: 12 }} />
      <Button title="Sign in" onPress={handleSubmit(async (v) => { await login(v.email, v.password); router.replace('/dashboard'); })} />
      <Link href="/register" style={{ color: '#60a5fa' }}>Create account</Link>
      <Link href="/forgot-password" style={{ color: '#60a5fa' }}>Forgot password</Link>
    </Page>
  );
}
