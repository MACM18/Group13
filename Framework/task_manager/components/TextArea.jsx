import { useState } from "react";

export default function TextArea(props) {
  const [description, setDescription] = useState("");
  return (
    <textarea
      className={
        "w-full h-28 p-15px indent-4 bg-blue-300 border-2 border-blue-800 rounded-xl focus:bg-white"
      }
      placeholder="Description"
      onChange={(e) => setDescription(e.target.value)}
      value={description}
    ></textarea>
  );
}
