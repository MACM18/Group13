import StarDefault from "../public/Resources/Star=Default.svg";
import StarSelected from "../public/Resources/Star=Selected.svg";
import Image from "next/image";
import { useState } from "react";

export default function StarButton(props) {
  const [selected, setSelected] = useState(props.Selected);
  return (
    <div className="p-5px">
      {!selected && (
        <div onClick={() => setSelected(true)}>
          <Image src={StarDefault} alt="StarDefault" />
        </div>
      )}
      {selected && (
        <div onClick={() => setSelected(false)}>
          <Image src={StarSelected} alt="StarSelected" />
        </div>
      )}
    </div>
  );
}
