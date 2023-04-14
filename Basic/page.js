import Image from "next/image";
import { Inter } from "next/font/google";
import { AddButton, Category } from "./Components";

const inter = Inter({ subsets: ["latin"] });

export default function Home() {
  return (
    <>
      <Category Color="blue" Intence1="100" Intence2="500" Title="Cat1" />
      <AddButton Color="blue" Intence1="100" Intence2="500" />
    </>
  );
}
