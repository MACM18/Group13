import { useState } from "react";

export default function (props) {
  const [selected, setSelected] = useState(false);
  const [editMenu, setEditMenu] = useState(false);
  return (
    <div
      className={"w-full h-fit flex flex-col items-end"}
      onClick={() => setEditMenu(true)}
    >
      <div
        className={
          "w-full rounded-xl border rounded-br-none flex flex-row gap-4 items-center border-blue-300 dark:border-none p-15px"
        }
      >
        <div
          onClick={() =>
            selected == false
              ? setSelected(true)
              : selected == true
              ? setSelected(false)
              : null
          }
          className={
            "bg-blue-300 rounded-full w-10 h-10  flex justify-around items-center"
          }
        >
          {selected && <p>✔️</p>}
        </div>
        <div className={"w-full h-full"}>
          <p className={"text-xl indent-5  text-blue-800"}>{props.Name}</p>
        </div>
      </div>
      <div
        className={
          "w-fit px-10px h-fit rounded-b-xl flex flex-row gap-3 text-black border border-t-0 border-blue-300"
        }
      >
        <div>Date : {props.Date}</div>|<div>Time : {props.Time}</div>
      </div>
      {editMenu && <TaskEdit />}
    </div>
  );
}
