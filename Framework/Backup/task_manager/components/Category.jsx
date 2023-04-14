export default function Category(props) {
  return (
    <div
      className={
        "w-150 p-15px flex flex-col justify-between dark:bg-black shadow-lg shadow-black hover:shadow-md h-150 border rounded-xl bg-blue-100 border-blue-500"
      }
    >
      <div className={"text-center text-black dark:text-blue-500"}>
        {props.Title}
      </div>
      <div
        className={"w-full h-full bg-white rounded-xl border border-blue-500"}
      >
        {props.Emoji}
      </div>
    </div>
  );
}
