export default function DeleteButton(props) {
  return (
    <button
      className={
        "p-5px px-15px font-semibold rounded-lg border-2 border-red-800 text-red-800 hover:text-black hover:border-black dark:bg-red-800 dark:text-white dark:border-red-800 dark:hover:bg-black"
      }
      onClick={props.onClickFun}
    >
      Delete
    </button>
  );
}
