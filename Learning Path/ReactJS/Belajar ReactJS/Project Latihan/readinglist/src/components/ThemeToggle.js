import { useContext } from "react";
import { ThemeContext } from "../contexts/ThemeContext";

function ThemeToggle() {
  const themeContext = useContext(ThemeContext);
  return (
    <div>
      <button onClick={themeContext.themeToggle}>Change Theme</button>
    </div>
  );
}

export default ThemeToggle;
