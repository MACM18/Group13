import { TaskEdit } from ".";
export default function (props) {
  return (
    <div className={"w-full h-fit flex flex-col items-end"}>
      <div
        className={
          "w-full rounded-xl border-2 rounded-br-none flex flex-row gap-4 items-center border-blue-800 dark:border-none dark:bg-blue-300 p-15px"
        }
      >
        <div
          onClick={props.SelectFun}
          className={
            "bg-blue-300 dark:bg-white rounded-full w-10 h-10  flex justify-around items-center"
          }
        >
          {props.selected && <p>✔️</p>}
        </div>
        <div className={"w-full h-full"} onClick={props.TaskEditFun}>
          <p className={"text-xl indent-5  text-blue-800"}>{props.Title}</p>
        </div>
      </div>
      <div
        className={
          "w-fit px-10px h-fit rounded-b-xl flex flex-row gap-3 text-black border-2 border-t-0 dark:border-none dark:bg-blue-300 border-blue-800"
        }
      >
        <div>Date : {props.Date}</div>|<div>Time : {props.Time}</div>
      </div>
      {props.editMenu && <TaskEdit Visibility={true} />}
    </div>
  );
}
