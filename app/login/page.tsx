"use client";

import { useState } from "react";
import { useRouter } from "next/navigation";
import axios from "axios";
import { motion } from "framer-motion";
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
  CardFooter,
} from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";
import { Label } from "@/components/ui/label";
import { useToast } from "@/components/ui/use-toast";
import { AiOutlineEye, AiOutlineEyeInvisible } from "react-icons/ai"; // ⬅️ Tambahkan ini

// Ambil BASE_URL dari .env
const API_BASE_URL =
  process.env.NEXT_PUBLIC_API_BASE_URL || "http://localhost:8000";

export default function LoginPage() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [showPassword, setShowPassword] = useState(false); // ⬅️ Tambahkan ini
  const [loading, setLoading] = useState(false);
  const router = useRouter();
  const { toast } = useToast();

  const handleLogin = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);

    try {
      await axios.get(`${API_BASE_URL}/sanctum/csrf-cookie`, {
        withCredentials: true,
      });

      const res = await axios.post(
        `${API_BASE_URL}/api/admin/login`,
        { email, password },
        {
          withCredentials: true,
          headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
          },
        }
      );

      if (!res.data.token) {
        throw new Error("Login gagal: Token tidak diterima.");
      }

      localStorage.setItem("token", res.data.token);

      toast({
        title: "Login Berhasil",
        description: "Selamat datang di UMKM Admin Dashboard!",
      });

      router.push("/");
    } catch (err: any) {
      console.error("Login Error:", err);
      toast({
        title: "Login Gagal",
        description: err.message || "Terjadi kesalahan saat login.",
        variant: "destructive",
      });
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="flex items-center justify-center min-h-screen bg-background">
      <motion.div
        initial={{ opacity: 0, y: -20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.5 }}
      >
        <Card className="w-[350px]">
          <CardHeader>
            <CardTitle>Login</CardTitle>
            <CardDescription>
              Masukkan kredensial untuk mengakses Admin Dashboard
            </CardDescription>
          </CardHeader>
          <CardContent>
            <form onSubmit={handleLogin}>
              <div className="grid w-full items-center gap-4">
                <div className="flex flex-col space-y-1.5">
                  <Label htmlFor="email">Email</Label>
                  <Input
                    id="email"
                    type="email"
                    placeholder="Masukkan email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    required
                  />
                </div>

                {/* ✅ PASSWORD DENGAN IKON MATA */}
                <div className="flex flex-col space-y-1.5 relative">
                  <Label htmlFor="password">Password</Label>
                  <Input
                    id="password"
                    type={showPassword ? "text" : "password"}
                    placeholder="Masukkan password"
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}
                    required
                    className="pr-10"
                  />
                  <div
                    className="absolute right-3 bottom-2 cursor-pointer text-gray-500"
                    onClick={() => setShowPassword((prev) => !prev)}
                  >
                    {showPassword ? (
                      <AiOutlineEyeInvisible size={20} />
                    ) : (
                      <AiOutlineEye size={20} />
                    )}
                  </div>
                </div>
              </div>

              <CardFooter className="mt-4 px-0">
                <Button type="submit" disabled={loading} className="w-full">
                  {loading ? "Loading..." : "Login"}
                </Button>
              </CardFooter>
            </form>
          </CardContent>
        </Card>
      </motion.div>
    </div>
  );
}
