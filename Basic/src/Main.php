<?php
session_start();
require 'Connection.php';
if (isset($_SESSION['username']) == false) {
  header('Location: LogIn.html');
} else {
  $currentuser = $_SESSION['username'];
}
// $_SESSION['Category'] = 0;
$category = $_SESSION['Category'];
$task = $_SESSION['TaskId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Task Manager</title>
  <script>
    function exit() {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'clear-session.php', true);
      xhr.send();
      window.location.href = "LogIn.html";
    }

    function selectCategory(element) {
      // var subDiv = element.querySelector('#ID');
      // console.log(element);
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

      var urlencoded = new URLSearchParams();
      urlencoded.append("Category", element);

      var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: urlencoded,
        redirect: 'follow'
      };

      fetch("selectCategory.php", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
      location.reload();
    }

    function selectTask(element) {
      console.log(element);
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

      var urlencoded = new URLSearchParams();
      urlencoded.append("TaskId", element);

      var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: urlencoded,
        redirect: 'follow'
      };

      fetch("selectTask.php", requestOptions)
        .then(response => response.text())
        // .then(result => console.log(result))
        .catch(error => console.log('error', error));
      setTimeout(() => {
        const section = document.getElementById("TaskEdit");
        if (section.classList.contains('hidden')) {
          section.classList.remove("hidden");
        }
      }, 1000)
    }
    function SelectFun1(status, id) {
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

      var urlencoded = new URLSearchParams();
      urlencoded.append("status", status);
      urlencoded.append("id", id);

      var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: urlencoded,
        redirect: 'follow'
      };

      fetch("updateTaskStatus.php", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
      location.reload();
    }
    // function saveData(params) {
    //   localStorage.setItem("Tasks", JSON.stringify(params));
    // }
    function hideFunction(params) {
      { document.getElementById(params).classList.add('hidden'); }
    }
    function UpdateData(params) {
      let form = document.getElementById(params);
      console.log(params);
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

      var urlencoded = new URLSearchParams();
      urlencoded.append("task", form.elements["Task"], value);
      urlencoded.append("Date", form.elements["Date"], value);
      urlencoded.append("time", form.elements["Time"], value);
      urlencoded.append("Category", form.elements["Category"], value);
      urlencoded.append("status", form.elements["Status"], value);
      urlencoded.append("status", form.elements["Status"], value);

      var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: urlencoded,
        redirect: 'follow'
      };

      fetch("updateTask.php", requestOptions)
        .then(response => response.json())
        .then(data => messageFunct(data))
        .catch(error => console.log('error', error));
    }
    function messageFunct(data) {
      // if (data["Response"] == "success") {
      //   console.log(Success!);
      // }
    }
  </script>
</head>

<body>
  <div class="h-screen">
    <object data="Profile.php" class="absolute top-0 right-0 w-fit h-full"></object>
    <object data="AddButton.php" class="absolute bottom-8 right-8"></object>
    <div id="Top_Section" class="p-2 flex flex-row w-full h-fit">
      <div id="CategoryArea" class="w-full h-fit bg-blue-300 dark:bg-blue-800 rounded-xl p-2 border-2 border-blue-800">
        <div class="w-full h-fit ">
          <div class="flex flex-row gap-5 overflow-x-auto overflow-y-hidden">
            <?php
            $query = "Select title,emoji,id from category where visibility=true and User_Name='$currentuser' order by position";
            $result = mysqli_query($connection, $query);
            //echo $array["title"];
            while ($array = mysqli_fetch_array($result)) {
              ?>
              <div id=" categoryBox"
                class=" rounded-xl border-2 shadow-lg hover:shadow-sm flex flex-col items-center justify-around w-fit h-fit gap-2 p-2"
                onclick="selectCategory(<?php echo $array[2]; ?>)">
                <div id="cBTitle" class="font-medium text-lg">
                  <?php echo $array[0]; ?>
                </div>
                <div id="cBEmoji"
                  class="w-20 h-20 border-2 flex text-4xl flex-auto justify-center items-center rounded-xl">
                  <?php echo $array[1]; ?>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div id="Bottom_Section" class="p-2 flex flex-row w-full h-3/4 gap-5">
      <div id="NavBar"
        class="w-1/3 h-full bg-blue-300 dark:bg-black rounded-xl flex flex-col gap-5 p-2 border-2 border-blue-800">
        <div id="Title" class="p-2 text-center w-full h-fit font-bold text-2xl">Task Manager</div>
        <div id="NavBar_Buttons" class="flex flex-col w-full h-full justify-around">
          <input type="button" value="Colors" id="colorButton"
            class="p-4 w-full font-semibold rounded-l-full hover:text-right border-2" onClick=colorsMenu()>
          <input type="button" value="Category" id="categoryButton"
            class="p-4 w-full font-semibold rounded-l-full hover:text-right border-2" onClick=categoriesMenu()>
          <input type="button" value="DarkMode" id="darkButton"
            class="p-4 w-full font-semibold rounded-l-full hover:text-right border-2" onClick=darkMode()>
          <input type="button" value="Exit" id="exitButton"
            class="p-4 w-full font-semibold rounded-l-full hover:text-right border-2" onClick=exit()>
        </div>
      </div>
      <div id="TaskArea"
        class="w-full h-full bg-blue-300 dark:bg-blue-800 rounded-xl flex flex-col gap-5 p-4 border-2 border-blue-800">
        <!-- Tasks -->
        <div class="w-full h-full">
          <div class="flex flex-col gap-5 overflow-y-auto overflow-x-hidden">
            <?php
            if ($category != 0) {
              $queryTask = "Select * from task where User_Name='$currentuser' and Category=$category order by date,time";
            } else {
              $queryTask = "Select * from task where User_Name='$currentuser' order by date,time";
            }
            $resultTask = mysqli_query($connection, $queryTask);
            while ($arrayTask = mysqli_fetch_array($resultTask)) {
              ?>
              <div class="w-full h-fit flex flex-col items-end">
                <div class="w-full rounded-xl border-2 rounded-br-none flex flex-row gap-4 items-center p-4">
                  <div onClick="SelectFun1(<?php echo $arrayTask["status"]; ?>,<?php echo $arrayTask["id"]; ?>)"
                    class="rounded-full w-10 h-10 flex justify-around items-center">
                    <p id="Tick">
                      <?php if ($arrayTask["status"] == true) {
                        echo "✔️";
                      }
                      ?>
                    </p>
                  </div>
                  <div class="w-full h-full" onClick="selectTask(<?php echo $arrayTask["id"]; ?>)" <p
                    class="text-xl indent-5 ">
                    <?php echo $arrayTask["task"]; ?>
                    </p>
                  </div>
                </div>
                <div class="w-fit px-3 h-fit rounded-b-xl flex flex-row gap-3 border-2 border-t-0 ">
                  <div>Date :
                    <?php echo $arrayTask["Date"]; ?>
                  </div>
                  |
                  <div>Time :
                    <?php echo $arrayTask["time"]; ?>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Task Edit -->
  <div id="TaskEdit" class="hidden absolute top-20 left-28 w-3/4 h-5/6 backdrop-blur-xl">
    <?php

    $query2 = "SELECT id,Title FROM category WHERE User_Name='$currentuser'";
    $query = "SELECT * FROM task WHERE id=$task";
    $result = mysqli_query($connection, $query);
    $result2 = mysqli_query($connection, $query2);
    $data = mysqli_fetch_assoc($result);
    $data2 = mysqli_fetch_array($result2);
    ?>
    <div class=" w-full h-full border-2 rounded-lg p-5 flex flex-row">
      <div class="w-1/6 h-full"></div>
      <div class="w-5/6 h-full flex flex-row">
        <div class="w-10 h-10 absolute top-0 right-0 flex flex-auto justify-center items-center"
          onClick="hideFunction('TaskEdit')">x</div>
        <form class="w-full h-full p-5 flex flex-col justify-around items-end" id="<?php echo $data['id'] ?>">
          <div class="flex flex-row gap-1 w-full"><label for="TaskTitle"
              class="border-2 p-2 rounded-lg min-w-max">Task</label><input type="text" name="Task" id="TaskTitle"
              class="w-full indent-2 rounded-lg" value="<?php echo $data['task'] ?>"></div>
          <div class="w-full flex flex-row gap-2">
            <div class="flex flex-row gap-1 w-full"><label for=" TaskDate"
                class="border-2 p-2 rounded-lg min-w-max">Date</label><input type="date" name="Date" id="TaskDate"
                class="w-full indent-2 rounded-lg " value="<?php echo $data['Date'] ?>"></div>
            <div class="flex flex-row gap-1 w-full"><label for="TaskTime"
                class="border-2 p-2 rounded-lg min-w-max">Time</label><input type="time" name="Time" id="TaskTime"
                class="w-full indent-2 rounded-lg" value="<?php echo $data['time'] ?>"></div>
          </div>
          <div class="flex flex-row gap-1 w-full"><label for="TaskCategory"
              class="border-2 p-2 rounded-lg min-w-max">Category</label><select name="Category" id="TaskCategory"
              class="w-full indent-2 rounded-lg">
              <?php
              while ($data2 = mysqli_fetch_array($result2)) {
                echo "<option>" . $data2['Title'] . "</option>";
              }
              ?>
            </select></div>

          <div class="flex flex-row gap-1 w-full justify-start"><label for="TaskStatus"
              class="border-2 p-2 rounded-lg min-w-max">Status</label><input type="checkbox" name="Status"
              id="TaskStatus" class=" h-10 w-10 rounded-lg" checked="<?php echo $data['status'] ?>"></div>
          <div class="flex flex-row gap-1 w-full justify-end"><button
              class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light"
              onclick="DeleteData(<?php echo $data['id']; ?>)">Delete</button><button
              class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light"
              onclick="UpdateData(<?php echo $data['id']; ?>)">Save</button>
          </div>
        </form>
      </div>
    </div>


</body>
