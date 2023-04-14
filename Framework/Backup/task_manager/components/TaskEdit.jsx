import { useState } from "react";
import {
  Button,
  CloseButton,
  DeleteButton,
  Select,
  StarButton,
  TextArea,
  TextBox,
} from ".";

export default function TaskEdit(props) {
  const [visibility, setVisibility] = useState(props.Visibility);
  return (
    visibility && (
      <div
        className={
          "absolute w-9/12 h-5/6 inset-y-16 inset-x-40 rounded-lg bg-white border-2 border-blue-800 dark:bg-slate-800"
        }
      >
        <CloseButton onClickFun={() => setVisibility(false)} />

        <div className={"w-1/3 bg-blue-100 h-full rounded-lg"}></div>
        <div
          className={
            "absolute top-0 p-15px flex flex-1 flex-col justify-around w-full h-full"
          }
        >
          <div className={"flex flex-col gap-8 justify-center w-full h-full"}>
            <div className={"self-end"}>
              <StarButton />
            </div>
            <TextBox Title={"Task"} />
            <div className={"w-full flex flex-row gap-5"}>
              <TextBox Title={"Date"} Type={"Date"} />
              <TextBox Title={"Time"} Type={"Time"} />
            </div>
            <Select Title={"Category"} Options={props.Options} />

            <TextArea />
          </div>
          <div className={"w-fit h-fit flex flex-row p-10px gap-5 self-end"}>
            <DeleteButton />
            <Button Title={"Save"} />
          </div>
        </div>
      </div>
    )
  );
}
