import Image from "next/image";
import { Inter } from "next/font/google";
import { Category, AddButton, Task } from "@/components";
import NavBarButton from "@/components/NavBarButton";

const inter = Inter({ subsets: ["latin"] });

export default function Home() {
  return (
    <div>
      <Category Color="blue" Title="Cat1" />
      <AddButton Color="blue" Intence1="300" Intence2="500" />
      <div className="w-1/3">
        <NavBarButton Color="blue" Intence1="300" Text="option1" />
      </div>
      <Task Date="200" Time="12.00" Name="aaaaa"/>
    </div>
  );
}
