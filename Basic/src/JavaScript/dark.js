let Classes = [
  "AddButton",
  "AddButton_Max",
  "NavBar",
  "TaskArea",
  "User_Profile",
  "User_Profile_Max",
  "User_Profile_Max_Inside",
  "User_Profile_Max_Image",
];
let Classes2 = [
  "newCategory",
  "newTask",
  "colorButton",
  "categoryButton",
  "darkButton",
  "exitButton",
  "background",
];
let ClassesWithoutText = ["CategoryArea"];
let ClassesWithoutText2 = ["background"];
let theme = localStorage.theme;
let color = localStorage.color;
function switchMode() {
  let count = Classes.length - 1;
  let count2 = Classes2.length - 1;
  let countWithoutText = ClassesWithoutText.length - 1;
  let countWithoutText2 = ClassesWithoutText2.length - 1;
  if (localStorage.theme == "dark") {
    while (count >= 0) {
      document
        .getElementById(Classes[count])
        .classList.add("border-" + color + "-800");
      document.getElementById(Classes[count]).classList.add("bg-black");
      document.getElementById(Classes[count]).classList.add("text-white");
      count--;
    }
    while (count2 >= 0) {
      document.getElementById(Classes2[count2]).classList.add("border-black");
      document
        .getElementById(Classes2[count2])
        .classList.add("bg-" + color + "-800");
      document.getElementById(Classes2[count2]).classList.add("text-white");
      count2--;
    }
    while (countWithoutText >= 0) {
      document
        .getElementById(ClassesWithoutText[countWithoutText])
        .classList.add("border-" + color + "-800");
      document
        .getElementById(ClassesWithoutText[countWithoutText])
        .classList.add("bg-black");
      countWithoutText--;
    }
    while (countWithoutText2 >= 0) {
      document
        .getElementById(ClassesWithoutText2[countWithoutText2])
        .classList.add("border-black");
      document
        .getElementById(ClassesWithoutText2[countWithoutText2])
        .classList.add("bg-" + color + "-800");
      countWithoutText2--;
    }
  } else if (localStorage.theme == "light") {
    while (count >= 0) {
      document
        .getElementById(Classes[count])
        .classList.remove("border-" + color + "-800");
      document.getElementById(Classes[count]).classList.remove("bg-black");
      document.getElementById(Classes[count]).classList.remove("text-white");
      count--;
    }
    while (count2 >= 0) {
      document
        .getElementById(Classes2[count2])
        .classList.remove("border-black");
      document
        .getElementById(Classes2[count2])
        .classList.remove("bg-" + color + "-800");
      document.getElementById(Classes2[count2]).classList.remove("text-white");
      count2--;
    }
    while (countWithoutText >= 0) {
      document
        .getElementById(ClassesWithoutText[countWithoutText])
        .classList.remove("border-" + color + "-800");
      document
        .getElementById(ClassesWithoutText[countWithoutText])
        .classList.remove("bg-black");
      countWithoutText--;
    }
    while (countWithoutText2 >= 0) {
      document
        .getElementById(ClassesWithoutText2[countWithoutText2])
        .classList.remove("border-black");
      document
        .getElementById(ClassesWithoutText2[countWithoutText2])
        .classList.remove("bg-" + color + "-800");
      countWithoutText2--;
    }
  }
}
function dark(params) {
  localStorage.color = params;
  if (localStorage.theme == "light") {
    localStorage.theme = "dark";
  } else if (localStorage.theme == "dark") {
    localStorage.theme = "light";
  }
  switchMode();
}
window.onload = switchMode();
