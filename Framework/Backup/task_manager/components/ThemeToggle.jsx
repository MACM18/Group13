import { useEffect, useState } from "react";

import NavBarButton from "./NavBarButton";
export default function ThemeToggle() {
  const [darkMode, setDarkMode] = useState(false);

  useEffect(() => {
    if (
      localStorage.theme === "dark" ||
      (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
      document.body.classList.add("dark");
    } else {
      document.body.classList.remove("dark");
    }
  }, [darkMode]);
  return (
    <div>
      <NavBarButton
        onClickFun={() => {
          setDarkMode(!darkMode);
          darkMode == true
            ? (localStorage.theme = "dark")
            : (localStorage.theme = "light");
        }}
        Title={darkMode ? "Light" : "Dark"}
      ></NavBarButton>
    </div>
  );
}
