import { TextBox } from "@/components";
import Button from "@/components/Button";
import ThemeToggle from "@/components/ThemeToggle";
import Head from "next/head";
import Link from "next/link";

export default function LogIn() {
  return (
    <>
      <Head>
        <title>Log in</title>
      </Head>
      <div
        className={
          "flex flex-auto justify-center bg-slate-300 dark:bg-slate-800"
        }
      >
        <div
          className={
            "w-1/3 border-2 border-blue-800 bg-white dark:bg-black rounded-xl p-5 h-screen flex flex-col justify-around items-center"
          }
        >
          <div>
            <p className={"text-4xl text-blue-300 dark:text-white text-center"}>
              Log in
            </p>
          </div>
          <div
            className={
              "w-full border-2 rounded-xl dark:bg-blue-100 p-10px border-blue-800 flex flex-col gap-5 items-center"
            }
          >
            <TextBox Title={"User name"} />
            <TextBox Title={"Password"} Type={"password"} />
            <Button Title={"Log in"} />
          </div>
          <div
            className={
              "w-full flex flex-col gap-3 items-center dark:text-white"
            }
          >
            <p>Don't have an account</p>
            <Link href={"/Register"}>
              <Button Title={"Sign up"} />
            </Link>
          </div>
        </div>
        <div
          className={
            "absolute bottom-5 right-5 bg-white flex flex-row items-center gap-3 dark:text-white dark:bg-black p-10px border-2 rounded-xl border-blue-800"
          }
        >
          <div>
            <p>Need Help</p>
          </div>
          <div>
            <Button Title={"Contact Us"} />
          </div>
        </div>
      </div>
    </>
  );
}
