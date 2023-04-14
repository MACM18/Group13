import { useState } from "react";
import Image from "next/image";

export default function User(props) {
  const [show, setShow] = useState(false);
  return show == false ? (
    <div
      className={
        "absolute top-0 right-0 w-fit h-fit py-15px px-1 border-2 border-blue-800 bg-white dark:bg-black rounded-l-xl"
      }
      onClick={() => setShow(true)}
    >
      <p>◀️</p>
    </div>
  ) : (
    <div
      className={
        "absolute top-0 right-0 border-2 border-blue-800 rounded-xl bg-white dark:bg-black h-fit w-fit p-10px"
      }
      onClick={() => setShow(false)}
    >
      <div
        className={
          "text-blue-300 dark:text-white border-2 border-blue-800 rounded-xl bg-white dark:bg-blue-300 flex flex-col justify-around h-[240]px w-fit p-5px items-center"
        }
      >
        <div className={"w-150 h-150 rounded-xl flex flex-auto"}>
          <Image
            src={"/Resources/" + props.Image + ".jpg"}
            alt={props.Image}
            width={150}
            height={150}
            intrinsic
            className={"rounded-xl"}
          />
        </div>
        <p>{props.Name}</p>
        <p>{props.Email}</p>
      </div>
    </div>
  );
}
