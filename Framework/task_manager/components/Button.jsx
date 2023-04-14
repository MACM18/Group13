export default function Button(props) {
  return (
    <button
      className={
        "p-5px px-15px font-semibold rounded-lg border-2 border-blue-800 text-blue-300 hover:text-black hover:border-black dark:bg-blue-300 dark:text-white dark:border-blue-300 dark:hover:bg-black"
      }
      onClick={props.onClickFun}
    >
      {props.Title}
    </button>
  );
}
