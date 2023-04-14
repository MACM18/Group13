import { useState } from "react";

export default function TextBox(props) {
  const [tBoxValue, setTBoxValue] = useState("");
  return (
    <div className={"flex flex-row w-full"}>
      <label
        htmlFor="tBox"
        className={
          "border-2 p-10px rounded-xl  border-blue-800 min-w-fit text-blue-300 font-bold"
        }
      >
        {props.Title}
      </label>
      <input
        type={props.Type}
        id="tBox"
        placeholder={props.Placeholder}
        onChange={(e) => setTBoxValue(e.target.value)}
        value={tBoxValue}
        className={
          "border-2 p-10px rounded-xl border-blue-800 w-full indent-4 bg-blue-300  focus:bg-white"
        }
      ></input>
      {console.log(tBoxValue)}
    </div>
  );
}
