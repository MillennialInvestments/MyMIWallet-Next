import { create } from 'zustand';
import { MobileUser } from '../types/api';
import { authApi } from '../api/auth';
import { tokenStore } from '../lib/secureStore';

type AuthState = {
  user: MobileUser | null;
  isBootstrapped: boolean;
  bootstrap: () => Promise<void>;
  login: (email: string, password: string) => Promise<void>;
  register: (email: string, username: string, password: string) => Promise<void>;
  logout: () => Promise<void>;
};

export const useAuthStore = create<AuthState>((set) => ({
  user: null,
  isBootstrapped: false,
  bootstrap: async () => {
    const token = await tokenStore.get();
    if (!token) return set({ isBootstrapped: true });

    try {
      const { data } = await authApi.me();
      set({ user: data.data, isBootstrapped: true });
    } catch {
      await tokenStore.clear();
      set({ user: null, isBootstrapped: true });
    }
  },
  login: async (email, password) => {
    const { data } = await authApi.login({ email, password, device_name: 'expo-mobile' });
    await tokenStore.set(data.data.token.access_token);
    set({ user: data.data.user });
  },
  register: async (email, username, password) => {
    const { data } = await authApi.register({ email, username, password, device_name: 'expo-mobile' });
    await tokenStore.set(data.data.token.access_token);
    set({ user: data.data.user });
  },
  logout: async () => {
    try {
      await authApi.logout();
    } finally {
      await tokenStore.clear();
      set({ user: null });
    }
  },
}));
