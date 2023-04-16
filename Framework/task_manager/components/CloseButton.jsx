export default function CloseButton(props) {
  return (
    <button
      className={
        "absolute top-3 right-3 p-5px w-10 h-10 font-semibold rounded-lg border-2 border-blue-800 text-black hover:text-white hover:border-none hover:bg-red-500 dark:bg-black dark:text-white dark:border-none dark:hover:bg-red-800 dark:hover:text-black z-10"
      }
      onClick={props.onClickFun}
    >
      X
    </button>
  );
}
