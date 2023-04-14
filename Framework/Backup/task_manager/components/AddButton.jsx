"use client";
import { useState } from "react";

export default function AddButton(props) {
  const [visibility, setVisibility] = useState(false);
  return (
    <div
      onClick={() => {
        visibility == false
          ? setVisibility(true)
          : visibility == true
          ? setVisibility(false)
          : null;
      }}
      className={
        "p-20px rounded-xl absolute bottom-20 right-20 flex flex-col bg-white dark:bg-black gap-5 border border-" +
        props.Color +
        "-" +
        props.Intence2
      }
    >
      {visibility && (
        <>
          <div
            className={
              "rounded-full text-black w-fit dark:text-white p-5 bg-blue-100 dark:bg-blue-800"
            }
            onClick={props.onClickTask}
          >
            <p>+ New Task</p>
          </div>
          <div
            className={
              "rounded-full text-black w-fit dark:text-white p-5 bg-blue-100 dark:bg-blue-800"
            }
            onClick={props.onClickCategory}
          >
            <p>+ New Category</p>
          </div>
        </>
      )}
      {!visibility && <div className={'dark:text-white'}>+</div>}
    </div>
  );
}
