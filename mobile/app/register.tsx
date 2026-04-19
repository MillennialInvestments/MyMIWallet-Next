import { zodResolver } from '@hookform/resolvers/zod';
import { useRouter } from 'expo-router';
import { useForm } from 'react-hook-form';
import { Button, Text, TextInput } from 'react-native';
import { z } from 'zod';
import { Page } from '../src/components/Page';
import { useAuthStore } from '../src/state/auth';

const schema = z.object({ email: z.string().email(), username: z.string().min(3), password: z.string().min(8) });
type FormData = z.infer<typeof schema>;

export default function RegisterScreen() {
  const router = useRouter();
  const registerAuth = useAuthStore((s) => s.register);
  const { register, setValue, handleSubmit } = useForm<FormData>({ resolver: zodResolver(schema) });

  register('email'); register('username'); register('password');

  return (
    <Page>
      <Text style={{ color: 'white', fontSize: 24 }}>Register</Text>
      <TextInput placeholder="Email" autoCapitalize="none" onChangeText={(v) => setValue('email', v)} style={{ backgroundColor: 'white', padding: 12 }} />
      <TextInput placeholder="Username" autoCapitalize="none" onChangeText={(v) => setValue('username', v)} style={{ backgroundColor: 'white', padding: 12 }} />
      <TextInput placeholder="Password" secureTextEntry onChangeText={(v) => setValue('password', v)} style={{ backgroundColor: 'white', padding: 12 }} />
      <Button title="Create account" onPress={handleSubmit(async (v) => { await registerAuth(v.email, v.username, v.password); router.replace('/dashboard'); })} />
    </Page>
  );
}
