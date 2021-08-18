import { useContext } from "react";
import { ThemeContext } from "../contexts/ThemeContext";

function UseStyle() {
  const themeContext = useContext(ThemeContext);
  const style = themeContext.isLightTheme
    ? themeContext.light
    : themeContext.dark;
  return { style };
}

export default UseStyle;
