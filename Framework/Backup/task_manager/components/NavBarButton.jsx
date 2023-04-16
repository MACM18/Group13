export default function NavBarButton(props) {
  return (
    <div
      onClick={props.onClickFun}
      className={
        "border-2 w-full p-10px rounded-l-full bg-white dark:bg-blue-700 dark:border-none text-center hover:text-right border-blue-800"
      }
    >
      <p className={" text-blue-800 dark:text-white"}>{props.Title}</p>
    </div>
  );
}
