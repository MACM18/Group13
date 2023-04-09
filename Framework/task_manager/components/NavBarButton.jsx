export default function NavBarButton(props) {
  return (
    <div
      onClick={props.onClick}
      className={
        "border w-full p-10px rounded-l-full bg-white dark:bg-blue-700 dark:border-none text-center hover:text-right border-blue-100"
      }
    >
      <p className={" text-blue-800 dark:text-white"}>{props.Text}</p>
    </div>
  );
}
