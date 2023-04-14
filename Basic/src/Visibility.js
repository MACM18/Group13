function visibilityToggle(visibility, item1, item2) {
  if (visibility == "hide") {
    document.getElementById(item2).classList.add("hidden");
    document.getElementById(item1).classList.remove("hidden");
  } else if (visibility == "show") {
    document.getElementById(item2).classList.remove("hidden");
    document.getElementById(item1).classList.add("hidden");
  }
}
function visibilityShow(item) {
  document.getElementById(item).classList.remove("hidden");
}
function visibilityHide(item) {
  document.getElementById(item).classList.add("hidden");
}
