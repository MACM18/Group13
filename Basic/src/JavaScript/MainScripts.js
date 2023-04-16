function exit() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "clear-session.php", true);
  xhr.send();
  window.location.href = "../Basic/src/Html/Login.html";
}

function selectCategory(element) {
  // var subDiv = element.querySelector('#ID');
  // console.log(element);
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  var urlencoded = new URLSearchParams();
  urlencoded.append("Category", element);

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  fetch(
    "http://localhost:8080/Group13/Basic/src/PHP/selectCategory.php",
    requestOptions
  )
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.log("error", error));
  location.reload();
}

function selectTask(element) {
  console.log(element);
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  var urlencoded = new URLSearchParams();
  urlencoded.append("TaskId", element);

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  fetch(
    "http://localhost:8080/Group13/Basic/src/PHP/selectTask.php",
    requestOptions
  )
    .then((response) => response.text())
    // .then(result => console.log(result))
    .catch((error) => console.log("error", error));
  setTimeout(() => {
    const section = document.getElementById("TaskEdit");
    if (section.classList.contains("hidden")) {
      section.classList.remove("hidden");
    }
  }, 1000);
}
function SelectFun1(status, id) {
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  var urlencoded = new URLSearchParams();
  urlencoded.append("status", status);
  urlencoded.append("id", id);

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  fetch(
    "http://localhost:8080/Group13/Basic/src/PHP/updateTaskStatus.php",
    requestOptions
  )
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.log("error", error));
  location.reload();
}
// function saveData(params) {
//   localStorage.setItem("Tasks", JSON.stringify(params));
// }
function UpdateData(params) {
  let form = document.getElementById(params);
  // console.log(form.elements["Category"].value);
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  var urlencoded = new URLSearchParams();
  urlencoded.append("task", form.elements["Task"].value);
  urlencoded.append("Date", form.elements["Date"].value);
  urlencoded.append("time", form.elements["Time"].value);
  urlencoded.append("Category", form.elements["Category"].value);
  urlencoded.append("id", params);

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  fetch(
    "http://localhost:8080/Group13/Basic/src/PHP/updateTask.php",
    requestOptions
  )
    .then((response) => response.json())
    .then((data) => messageFunct(data))
    .catch((error) => console.log("error", error));
}
function updateCategory(params) {
  let form = document.getElementById(params);
  // console.log(form.elements["Category"].value);
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  var urlencoded = new URLSearchParams();
  urlencoded.append("Title", form.elements["CatTitle"].value);
  urlencoded.append("Emoji", form.elements["CatEmoji"].value);
  urlencoded.append("position", form.elements["CatPosition"].value);
  urlencoded.append("visibility", form.elements["CatVisibility"].value);
  urlencoded.append("id", params);

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  fetch(
    "http://localhost:8080/Group13/Basic/src/PHP/updateCategory.php",
    requestOptions
  )
    .then((response) => response.json())
    .then((data) => messageFuncCatUpdate(data))
    .catch((error) => console.log("error", error));
}
function messageFunct(data) {
  const messageDiv = document.createElement("div");
  messageDiv.classList.add(
    "absolute",
    "p-4",
    "top-0",
    "left-0",
    "rounded-lg",
    "shadow-lg",
    "border-2",
    "flex",
    "flex-auto",
    "justify-center",
    "items-center"
  );

  const message = document.createElement("p");
  if (data["Response"] == "success") {
    message.innerHTML = "👍 Updated";
    location.reload();
  } else {
    message.innerHTML = "😿 Failed";
  }
  messageDiv.appendChild(message);
  document.getElementById("TaskEdit").appendChild(messageDiv);
  setTimeout(() => {
    document.getElementById("TaskEdit").removeChild(messageDiv);
  }, 3000);
}
function messageFunctAdd(data) {
  const messageDiv = document.createElement("div");
  messageDiv.classList.add(
    "absolute",
    "p-4",
    "top-0",
    "left-0",
    "rounded-lg",
    "shadow-lg",
    "border-2",
    "flex",
    "flex-auto",
    "justify-center",
    "items-center"
  );

  const message = document.createElement("p");
  if (data["Response"] == "success") {
    message.innerHTML = "👍 Updated";
    location.reload();
  } else {
    message.innerHTML = "😿 Failed";
  }
  messageDiv.appendChild(message);
  document.getElementById("TaskAdd").appendChild(messageDiv);
  setTimeout(() => {
    document.getElementById("TaskAdd").removeChild(messageDiv);
  }, 3000);
}
function messageFunctAddC(data) {
  const messageDiv = document.createElement("div");
  messageDiv.classList.add(
    "absolute",
    "p-4",
    "top-0",
    "left-0",
    "rounded-lg",
    "shadow-lg",
    "border-2",
    "flex",
    "flex-auto",
    "justify-center",
    "items-center"
  );

  const message = document.createElement("p");
  if (data["Response"] == "success") {
    message.innerHTML = "👍 Updated";
    location.reload();
  } else {
    message.innerHTML = "😿 Failed";
  }
  messageDiv.appendChild(message);
  document.getElementById("CategoryAdd").appendChild(messageDiv);
  setTimeout(() => {
    document.getElementById("CategoryAdd").removeChild(messageDiv);
  }, 3000);
}
function messageFuncCatUpdate(data) {
  const messageDiv = document.createElement("div");
  messageDiv.classList.add(
    "absolute",
    "p-4",
    "top-0",
    "left-0",
    "rounded-lg",
    "shadow-lg",
    "border-2",
    "flex",
    "flex-auto",
    "justify-center",
    "items-center"
  );

  const message = document.createElement("p");
  if (data["Response"] == "success") {
    message.innerHTML = "👍 Updated";
    location.reload();
  } else {
    message.innerHTML = "😿 Failed";
  }
  messageDiv.appendChild(message);
  document.getElementById("CategoryEdit").appendChild(messageDiv);
  setTimeout(() => {
    document.getElementById("CategoryEdit").removeChild(messageDiv);
  }, 3000);
}
function messageFuncCatDelete(data) {
  const messageDiv = document.createElement("div");
  messageDiv.classList.add(
    "absolute",
    "p-4",
    "top-0",
    "left-0",
    "rounded-lg",
    "shadow-lg",
    "border-2",
    "flex",
    "flex-auto",
    "justify-center",
    "items-center"
  );

  const message = document.createElement("p");
  if (data["Response"] == "success") {
    message.innerHTML = "👍 Updated";
    location.reload();
  } else {
    message.innerHTML = "😿 Failed";
  }
  messageDiv.appendChild(message);
  document.getElementById("CategoryEdit").appendChild(messageDiv);
  setTimeout(() => {
    document.getElementById("CategoryEdit").removeChild(messageDiv);
  }, 3000);
}
function DeleteData(params) {
  let form = document.getElementById(params);
  // console.log(form.elements["Category"].value);
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  var urlencoded = new URLSearchParams();
  urlencoded.append("id", params);

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  fetch(
    "http://localhost:8080/Group13/Basic/src/PHP/deleteTask.php",
    requestOptions
  )
    .then((response) => response.json())
    .then((data) => messageFunct(data))
    .catch((error) => console.log("error", error));
}
function deleteCategory(params) {
  // let form = document.getElementById(params);
  // console.log(form.elements["Category"].value);
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  var urlencoded = new URLSearchParams();
  urlencoded.append("id", params);

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  fetch(
    "http://localhost:8080/Group13/Basic/src/PHP/deleteCategory.php",
    requestOptions
  )
    .then((response) => response.json())
    .then((data) => messageFuncCatDelete(data))
    .catch((error) => console.log("error", error));
}
function AddData() {
  let form = document.getElementById("FormAddTask");
  // console.log(form.elements["Category"].value);
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  var urlencoded = new URLSearchParams();
  urlencoded.append("task", form.elements["Task"].value);
  urlencoded.append("Date", form.elements["Date"].value);
  urlencoded.append("time", form.elements["Time"].value);
  urlencoded.append("Category", form.elements["Category"].value);

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  fetch(
    "http://localhost:8080/Group13/Basic/src/PHP/addTask.php",
    requestOptions
  )
    .then((response) => response.json())
    .then((data) => messageFunctAdd(data))
    .catch((error) => console.log("error", error));
}
function AddCategory() {
  let form = document.getElementById("FormAddCategory");

  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  var urlencoded = new URLSearchParams();
  urlencoded.append("Title", form.elements["CTitle"].value);
  urlencoded.append("Emoji", form.elements["CEmoji"].value);
  urlencoded.append("position", form.elements["CPosition"].value);
  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  fetch(
    "http://localhost:8080/Group13/Basic/src/PHP/addCategory.php",
    requestOptions
  )
    .then((response) => response.json())
    // .then(data => console.log(data))
    .then((data) => messageFunctAddC(data))
    .catch((error) => console.log("error", error));
}
