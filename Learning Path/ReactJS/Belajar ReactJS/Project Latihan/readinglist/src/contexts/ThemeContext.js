import React, { createContext, useState } from "react";

export const ThemeContext = createContext();
function ThemeContextProvider(props) {
  const [theme, setTheme] = useState({
    light: {
      syntax: "#fff",
      ui: "#6d3d6d",
      bg: "#815181",
    },
    dark: {
      syntax: "#fff",
      ui: "#333",
      bg: "#555",
    },
    isLightTheme: true,
  });
  const themeToggle = () => {
    setTheme({ ...theme, isLightTheme: !theme.isLightTheme });
  };
  return (
    <div>
      <ThemeContext.Provider value={{ ...theme, themeToggle }}>
        {props.children}
      </ThemeContext.Provider>
    </div>
  );
}

export default ThemeContextProvider;
