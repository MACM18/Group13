import { Eye } from ".";
import Select from "./Select";
import TextBox from "./TextBox";

export default function CategoryEdit(props) {
  return (
    <div
      className={
        "py-5px px-15px border-2 border-blue-800 flex flex-row justify-between w-full gap-5 h-fit rounded-xl items-center"
      }
    >
      <div className={"bg-blue-300 w-20 h-20 rounded-xl"}>
        <p>{props.emoji}</p>
      </div>
      <div className={"w-full flex flex-col gap-2"}>
        <TextBox Title="Title" />
        
        <div className={'flex flex-row gap-2'}>
        <Select Title="Position" Options={[1, 2, 3, 4, 5, 6, 7]} />
          <Eye Selected={true} />
        </div>
      </div>
    </div>
  );
}
