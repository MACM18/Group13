import Image from "next/image";
import { Inter } from "next/font/google";
import { TaskEdit } from "@/components";
import NavBarButton from "@/components/NavBarButton";
import ThemeToggle from "@/components/ThemeToggle";

const inter = Inter({ subsets: ["latin"] });

export default function Home() {
  return (
    <div>
      <TaskEdit Options={[1,2,3]}/>
      <ThemeToggle />
    </div>
  );
}
