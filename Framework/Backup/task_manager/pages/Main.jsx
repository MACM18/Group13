import { AddButton, Category, Task, User } from "@/components";
import NavBarButton from "@/components/NavBarButton";
import ThemeToggle from "@/components/ThemeToggle";

export default function Main(props) {
  const Category1 = [
    { Title: "aaaaa", Emoji: "a" },
    { Title: "Bbbb", Emoji: "b" },
    { Title: "aaaaa", Emoji: "a" },
  ];
  const task1 = [
    { Title: "aaaaa", Date: "a", Time: "b", Selected: true },
    { Title: "Bbbb", Date: "a", Time: "b", Selected: false },
    { Title: "aaaaa", Date: "a", Time: "b", Selected: false },
  ];
  return (
    <div className={"w-screen h-screen flex flex-1 flex-col"}>
      <div className={"w-full h-fit p-10px"}>
        <User Image={10} Name={"User1"} Email={"email"} />
        <div
          className={
            "flex flex-1 flex-row gap-5 overflow-auto p-15px border-2 border-blue-800 dark:bg-blue-800 rounded-xl"
          }
        >
          {Category1.map((item, index) => (
            <Category Title={item.Title} Emoji={item.Emoji} key={index} />
          ))}
        </div>
      </div>
      <div className={"flex flex-row flex-1 gap-5 p-10px h-full"}>
        <div
          className={
            "h-full w-2/6 p-15px border-2 border-blue-800 dark:bg-black rounded-lg dark:text-white flex flex-col justify-around"
          }
        >
          <p className={"text-center text-2xl"}>Task Management</p>
          <NavBarButton Title={"Colors"} />
          <NavBarButton Title={"Categories"} />
          <ThemeToggle />
          <NavBarButton Title={"Exit"} />
        </div>

        <div
          className={
            " h-full w-full border-2 border-blue-800 dark:bg-blue-800 p-15px rounded-lg flex flex-col gap-5 overflow-auto"
          }
        >
          {task1.map((item, index) => (
            <Task
              Title={item.Title}
              Date={item.Date}
              Time={item.Time}
              Selected={item.Selected}
              key={index}
              // SelectFun={()=>}
            />
          ))}
        </div>
      </div>
      <AddButton />
    </div>
  );
}
