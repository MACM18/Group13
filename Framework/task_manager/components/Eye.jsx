import { useState } from "react";
import Image from "next/image";
import EyeDefault from "../public/Resources/EyeDefault.svg";
import EyeClosed from "../public/Resources/EyeClosed.svg";

export default function Eye(props) {
  const [selected, setSelected] = useState(props.Selected);
  return (
    <div
      onClick={() => {
        selected == true
          ? setSelected(false)
          : selected == false
          ? setSelected(true)
          : null;
      }}
      className={'w-10 h-10 flex flex-auto'}
    >
      {selected == true ? (
        <Image src={EyeDefault} alt="Eye" />
      ) : (
        <Image src={EyeClosed} alt="Eye" />
      )}
    </div>
  );
}
