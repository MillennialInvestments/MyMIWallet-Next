import { useRouter } from 'expo-router';
import { useEffect } from 'react';
import { useAuthStore } from '../state/auth';

export const useProtectedRoute = () => {
  const router = useRouter();
  const user = useAuthStore((s) => s.user);

  useEffect(() => {
    if (!user) {
      router.replace('/login');
    }
  }, [router, user]);
};
