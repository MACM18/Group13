export default function Select(props) {
  return (
    <div className={"w-full flex flex-row items-center"}>
      <label
        htmlFor="SelectionBox"
        className={
          "p-5px border-2 border-blue-800 rounded-lg text-blue-300 font-bold"
        }
      >
        {props.Title}
      </label>
      <select
        className={
          "p-5px w-full h-fit bg-blue-300 rounded-lg border-2 border-blue-800 indent-2"
        }
        id="SelectionBox"
      >
        {props.Options != undefined &&
          props.Options.map((option, index) => (
            <option
              key={index}
              className={"p-10px h-auto indent-4 bg-blue-300"}
            >
              {option}
            </option>
          ))}
      </select>
    </div>
  );
}
