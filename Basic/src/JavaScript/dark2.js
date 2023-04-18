// if (localStorage.darkMode == "dark") {
//   dark();
// } else {
//   light();
// }
// function darkFunc() {
//   const elements = document.querySelectorAll("div");
//   const elements2 = document.querySelectorAll("input");
//   const elements3 = document.querySelectorAll("button");
//   elements.forEach((element) => {
//     if (element.classList.contains("bg-amber-600")) {
//       element.classList.toggle("bg-black");
//       element.classList.toggle("text-amber-200");
//       //   element.classList.toggle("border-amber-800");
//     } else if (element.classList.contains("bg-blue-300")) {
//       element.classList.toggle("bg-amber-700");
//     }
//     if (element.classList.contains("border-2")) {
//       element.classList.toggle("border-amber-900");
//     }
//   });
//   elements2.forEach((element) => {
//     if (element.classList.contains("bg-amber-600")) {
//       element.classList.toggle("bg-black");
//       element.classList.toggle("text-amber-200");
//       element.classList.toggle("border-amber-900");
//     }
//   });
//   elements3.forEach((element) => {
//     if (element.classList.contains("bg-amber-600")) {
//       element.classList.toggle("bg-black");
//       element.classList.toggle("text-amber-200");
//       element.classList.toggle("border-amber-900");
//     }
//   });
// }
function darkFunc(color) {
  if (localStorage.theme == "light") {
    localStorage.theme = "dark";
    dark(color);
  } else {
    localStorage.theme = "light";
    light(color);
  }
}
function dark(params) {
  const elements = document.querySelectorAll("div");
  const elements2 = document.querySelectorAll("input");
  const elements3 = document.querySelectorAll("button");
  elements.forEach((element) => {
    if (element.classList.contains("bg-" + params + "-600")) {
      element.classList.add("bg-black");
      element.classList.add("text-" + params + "-200");
      //   element.classList.toggle("border-amber-800");
    } else if (element.classList.contains("bg-" + params + "-300")) {
      element.classList.add("bg-" + params + "-700");
    }
    if (element.classList.contains("border-2")) {
      element.classList.add("border-" + params + "-900");
    }
  });
  elements2.forEach((element) => {
    if (element.classList.contains("bg-" + params + "-600")) {
      element.classList.add("bg-black");
      element.classList.add("text-" + params + "-200");
      element.classList.add("border-" + params + "-900");
    }
  });
  elements3.forEach((element) => {
    if (element.classList.contains("bg-" + params + "-600")) {
      element.classList.add("bg-black");
      element.classList.add("text-" + params + "-200");
      element.classList.add("border-" + params + "-900");
    }
  });
}
function light(params) {
  const elements = document.querySelectorAll("div");
  const elements2 = document.querySelectorAll("input");
  const elements3 = document.querySelectorAll("button");
  elements.forEach((element) => {
    if (element.classList.contains("bg-" + params + "-600")) {
      element.classList.remove("bg-black");
      element.classList.remove("text-" + params + "-200");
      //   element.classList.toggle("border-amber-800");
    } else if (element.classList.contains("bg-" + params + "-300")) {
      element.classList.remove("bg-" + params + "-700");
    }
    if (element.classList.contains("border-2")) {
      element.classList.remove("border-" + params + "-900");
    }
  });
  elements2.forEach((element) => {
    if (element.classList.contains("bg-" + params + "-600")) {
      element.classList.remove("bg-black");
      element.classList.remove("text-" + params + "-200");
      element.classList.remove("border-" + params + "-900");
    }
  });
  elements3.forEach((element) => {
    if (element.classList.contains("bg-" + params + "-600")) {
      element.classList.remove("bg-black");
      element.classList.remove("text-" + params + "-200");
      element.classList.remove("border-" + params + "-900");
    }
  });
}
