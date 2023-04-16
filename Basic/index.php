<?php
session_start();
require 'src/PHP/Connection.php';
if (isset($_SESSION['username']) == false) {
  header('Location: src/Html/LogIn.html');
} else {
  $currentuser = $_SESSION['username'];
}
// $_SESSION['Category'] = 0;
if (isset($_SESSION['Category']) == false) {
  $category = '0';
} else {
  $category = $_SESSION['Category'];
}
if (isset($_SESSION['TaskId']) == false) {
  $task = '0';
} else {
  $task = $_SESSION['TaskId'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Task Manager</title>
  <!-- <script src="dark.js"> -->
  <!-- </script> -->
  <!-- <script src="JavaScript\script.js"></script> -->
  <script src="src/JavaScript/Visibility.js"></script>
  <script src="src/JavaScript/MainScripts.js"></script>
  <script>
    window.addEventListener("load", function () {
      document.querySelector("#Loading").style.display = "none";
    });
  </script>
</head>

<body>
  <div id="Loading">
    <h1
      class="absolute top-0 left-0 text-3xl w-screen h-screen text-amber-600 text-center flex flex-auto justify-center items-center z-50 bg-white font-bold font-sans underline">
      Loading!</h1>
    <p>You will be redirected!</p>
  </div>
  <div class="h-screen" id="background">
    <!-- <object data="Profile.php" class="absolute top-0 right-0 w-fit h-full"></object> -->
    <!-- Profile -->
    <?php
    $queryP = "select * from user where User_Name='$currentuser'";
    $resultP = mysqli_query($connection, $queryP);
    $dataP = mysqli_fetch_assoc($resultP);
    ?>
    <div id="User_Profile"
      class="absolute top-1 right-0 py-3 px-1 hover:cursor-pointer bg-amber-600 border-2 border-white dark:bg-black rounded-l-xl"
      onClick=visibilityToggle("show","User_Profile","User_Profile_Max")>
      ◀️
    </div>
    <div id="User_Profile_Max" onClick=visibilityToggle("hide","User_Profile","User_Profile_Max")
      class=" absolute top-1 right-1 bg-amber-600 w-fit h-fit p-2 border-2 rounded-lg shadow-lg hover:cursor-pointer hidden">
      <div id="User_Profile_Max_Inside"
        class="p-2 border-2 w-fit h-fit flex flex-col justify-around rounded-lg items-center">
        <div class="w-fit h-fit rounded-lg border-2">
          <img id="User_Profile_Max_Image" class=" object-cover w-20 h-20 rounded-lg"
            alt="<?php echo $dataP['image'] ?>" src="src/images/<?php echo $dataP['image'] ?>.jpg">
        </div>
        <div>
          <?php echo $dataP['User_Name'] ?>
        </div>
        <div class="max-w-40">
          <?php echo $dataP['Email'] ?>
        </div>
      </div>
    </div>
    <!-- ADD -->
    <div id="AddButton"
      class="absolute bottom-10 right-10 bg-amber-600 p-5 h-5 w-5 border-2 rounded-lg flex flex-auto justify-center items-center"
      onClick=visibilityToggle("show","AddButton","AddButton_Max")>
      <p>+</p>
    </div>
    <div id="AddButton_Max"
      class="absolute bottom-8 right-8 p-2  w-fit h-fit rounded-lg flex flex-col justify-around border-2 gap-2 hidden"
      onClick=visibilityToggle("hide","AddButton","AddButton_Max")>
      <div id="newTask" class="p-2 bg-amber-600 w-fit h-fit border-2 rounded-full" onClick=visibilityShow("TaskAdd")>
        <p>+ New task</p>
      </div>
      <div id="newCategory" class="p-2 bg-amber-600 backdrop-blur-lg w-fit h-fit border-2 rounded-full"
        onClick=visibilityShow("CategoryAdd")>
        <p>+ New Category</p>
      </div>
    </div>
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
                class=" rounded-xl bg-amber-600 border-2 shadow-lg hover:shadow-sm flex flex-col items-center justify-around w-fit h-fit gap-2 p-2"
                onclick="selectCategory(<?php echo $array[2]; ?>)">
                <div id="cBTitle" class="font-medium text-lg">
                  <?php echo $array[0]; ?>
                </div>
                <div id="cBEmoji"
                  class="w-20 h-20 border-2 border-amber-600 bg-white flex text-4xl flex-auto justify-center items-center rounded-xl">
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
            class="p-4 w-full bg-amber-600 font-semibold rounded-l-full hover:text-right border-2" onClick=colorsMenu()>
          <input type="button" value="Category" id="categoryButton"
            class="p-4 w-full bg-amber-600 font-semibold rounded-l-full hover:text-right border-2"
            onClick=visibilityShow("CategoryEdit")>
          <input type="button" value="DarkMode" id="darkButton"
            class="p-4 w-full bg-amber-600 font-semibold rounded-l-full hover:text-right border-2" onClick=dark("red")>
          <input type="button" value="Exit" id="exitButton"
            class="p-4 w-full bg-amber-600 font-semibold rounded-l-full hover:text-right border-2" onClick=exit()>
        </div>
      </div>
      <div id="TaskArea"
        class="w-full h-full bg-blue-300 dark:bg-blue-800 rounded-xl flex flex-col gap-5 p-4 border-2 border-blue-800">
        <!-- Tasks -->
        <div class="w-full h-full">
          <div class=" w-full h-full p-4 flex flex-col gap-5 overflow-y-auto overflow-x-hidden">
            <?php
            if ($category != 0) {
              $queryTask = "Select * from task where User_Name='$currentuser' and Category=$category order by date,time";
            } else {
              $queryTask = "Select * from task where User_Name='$currentuser' order by date,time";
            }
            $resultTask = mysqli_query($connection, $queryTask);
            mysqli_data_seek($resultTask, 0);
            while ($arrayTask = mysqli_fetch_array($resultTask)) {
              ?>
              <div class="w-full h-fit flex flex-col items-end">
                <div class="w-full rounded-xl border-2 bg-amber-600 rounded-br-none flex flex-row gap-4 items-center p-4">
                  <div onClick="SelectFun1(<?php echo $arrayTask["status"]; ?>,
              <?php echo $arrayTask["id"]; ?>)"
                    class="rounded-full bg-amber-600 border-white border-2 w-10 h-10 flex justify-around items-center">
                    <p id="Tick">
                      <?php if ($arrayTask["status"] == true) {
                        echo "✔️";
                      }
                      ?>
                    </p>
                  </div>
                  <div class="w-full h-full text-amber-600 bg-white rounded-lg text-xl indent-5"
                    onClick="selectTask(<?php echo $arrayTask["id"]; ?>)" <p>
                    <?php echo $arrayTask["task"]; ?>
                    </p>
                  </div>
                </div>
                <div
                  class="w-fit px-3 h-fit text-amber-600 bg-white rounded-b-xl flex flex-row gap-3 border-2 border-t-0 ">
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

    $queryEdit2 = "SELECT id,Title FROM category WHERE User_Name='$currentuser'";
    $queryEdit = "SELECT * FROM task WHERE id=$task";
    $resultEdit = mysqli_query($connection, $queryEdit);
    $resultEdit2 = mysqli_query($connection, $queryEdit2);
    $dataEdit = mysqli_fetch_assoc($resultEdit);
    $dataEdit2 = mysqli_fetch_array($resultEdit2);
    ?>
    <div class=" w-full h-full border-2 rounded-lg p-5 flex flex-row">
      <div class="w-1/6 h-full"></div>
      <div class="w-5/6 h-full flex flex-row">
        <div class="w-10 h-10 absolute top-0 right-0 flex flex-auto justify-center items-center"
          onClick=visibilityHide("TaskEdit")>x</div>
        <form class="w-full h-full p-5 flex flex-col justify-around items-end" id="<?php echo $dataEdit['id'] ?>">
          <div class="flex flex-row gap-1 w-full"><label for="TaskTitle"
              class="border-2 p-2 rounded-lg min-w-max">Task</label><input type="text" name="Task" id="TaskTitle"
              class="w-full indent-2 rounded-lg" value="<?php echo $dataEdit['task'] ?>"></div>
          <div class="w-full flex flex-row gap-2 ">
            <div class="flex flex-row gap-1 w-full"><label for=" TaskDate"
                class="border-2 p-2 rounded-lg min-w-max">Date</label><input type="date" name="Date" id="TaskDate"
                class="w-full indent-2 rounded-lg " value="<?php echo $dataEdit['Date'] ?>"></div>
            <div class="flex flex-row gap-1 w-full"><label for="TaskTime"
                class="border-2 p-2 rounded-lg min-w-max">Time</label><input type="time" name="Time" id="TaskTime"
                class="w-full indent-2 rounded-lg" value="<?php echo $dataEdit['time'] ?>"></div>
          </div>
          <div class="flex flex-row gap-1 w-full"><label for="TaskCategory"
              class="border-2 p-2 rounded-lg min-w-max">Category</label><select name="Category" id="TaskCategory"
              class="w-full indent-2 rounded-lg">
              <?php
              mysqli_data_seek($resultEdit2, 0);
              while ($dataEdit2 = mysqli_fetch_array($resultEdit2)) {
                echo "<option>" . $dataEdit2['Title'] . "</option>";
              }
              ?>
            </select></div>
          <div class="flex flex-row gap-1 w-full justify-end">

            <input type="button" value="Delete" class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light"
              onclick="DeleteData(<?php echo $dataEdit['id'] ?>)">
            <input type="button" value="Update" class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light"
              onclick="UpdateData(<?php echo $dataEdit['id'] ?>)">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Add Task -->
  <div id="TaskAdd" class="hidden absolute top-20 left-28 w-3/4 h-5/6 backdrop-blur-xl">
    <?php

    $queryAdd2 = "SELECT id,Title FROM category WHERE User_Name='$currentuser'";
    $resultAdd2 = mysqli_query($connection, $queryAdd2);
    $dataAdd2 = mysqli_fetch_array($resultAdd2);
    ?>
    <div class=" w-full h-full border-2 rounded-lg p-5 flex flex-row">
      <div class="w-1/6 h-full"></div>
      <div class="w-5/6 h-full flex flex-row">
        <div
          class="w-10 h-10 absolute top-0 right-0 flex flex-auto rounded-lg hover:text-white border-2 bg-amber-600 hover:bg-red-600 justify-center items-center"
          onClick=visibilityHide("TaskAdd")>x</div>
        <form class="w-full h-full p-5 flex flex-col justify-around items-end" id="FormAddTask">
          <div class="flex flex-row gap-1 w-full"><label for="TaskTitle"
              class="border-2 p-2 rounded-lg min-w-max">Task</label><input type="text" name="Task" id="TaskTitle"
              class="w-full indent-2 rounded-lg"></div>
          <div class="w-full flex flex-row gap-2">
            <div class="flex flex-row gap-1 w-full"><label for=" TaskDate"
                class="border-2 p-2 rounded-lg min-w-max">Date</label><input type="date" name="Date" id="TaskDate"
                class="w-full indent-2 rounded-lg "></div>
            <div class="flex flex-row gap-1 w-full"><label for="TaskTime"
                class="border-2 p-2 rounded-lg min-w-max">Time</label><input type="time" name="Time" id="TaskTime"
                class="w-full indent-2 rounded-lg"></div>
          </div>
          <div class="flex flex-row gap-1 w-full"><label for="TaskCategory"
              class="border-2 p-2 rounded-lg min-w-max">Category</label><select name="Category" id="TaskCategory"
              class="w-full indent-2 rounded-lg">
              <?php
              mysqli_data_seek($resultAdd2, 0);
              while ($dataAdd2 = mysqli_fetch_array($resultAdd2)) {
                echo "<option>" . $dataAdd2['Title'] . "</option>";
              }
              ?>
            </select></div>
          <div class="flex flex-row gap-1 w-full justify-end">
            <input type="button" value="Save" class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light"
              onclick="AddData()">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Add Category -->
  <div id="CategoryAdd" class="hidden absolute top-20 left-28 w-3/4 h-5/6 backdrop-blur-xl">
    <?php

    $queryAddC2 = "SELECT position FROM category WHERE User_Name='$currentuser' ORDER BY position";
    $resultAddC2 = mysqli_query($connection, $queryAddC2);
    $dataAddC2 = mysqli_fetch_array($resultAddC2);
    ?>
    <div class=" w-full h-full border-2 rounded-lg p-5 flex flex-row">
      <div class="w-1/6 h-full"></div>
      <div class="w-5/6 h-full flex flex-row">
        <div
          class="w-10 h-10 absolute top-0 right-0 flex rounded-lg hover:text-white border-2 bg-amber-600 hover:bg-red-600 flex-auto justify-center items-center"
          onClick=visibilityHide("CategoryAdd")>x</div>
        <form class="w-full h-full p-5 flex flex-col justify-around items-end" id="FormAddCategory">
          <div class="flex flex-row gap-1 w-full"><label for="CTitle"
              class="border-2 p-2 rounded-lg min-w-max">Title</label><input type="text" name="CTitle" id="CTitle"
              class="w-full indent-2 rounded-lg"></div>
          <div class="w-full flex flex-row gap-2">
            <div class="flex flex-row gap-1 w-full"><label for=" CEmoji"
                class="border-2 p-2 rounded-lg min-w-max">Emoji</label><input type="text" name="CEmoji" id="CEmoji"
                maxlength="5" class="w-full indent-2 rounded-lg "></div>
            <div class="flex flex-row gap-1 w-full"><label for="CPosition"
                class="border-2 p-2 rounded-lg min-w-max">position</label><input type="number" name="CPosition"
                id="CPosition" class="w-full indent-2 rounded-lg"></div>
          </div>
          <p class="self-start">Current Positions</p>
          <div class="flex flex-row gap-1 w-full overflow-auto">
            <?php
            mysqli_data_seek($resultAddC2, 0);
            while ($dataAddC2 = mysqli_fetch_array($resultAddC2)) {
              echo "<div class='p-2 w-fit h-fit border-2 rounded-lg'>" . $dataAddC2['position'] . "</div>";
            }
            ?>
          </div>
          <div class="flex flex-row gap-1 w-full justify-end">
            <input type="button" value="Save" class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light"
              onclick="AddCategory()">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Category Edit -->
  <div id="CategoryEdit"
    class="absolute top-0 right-0 backdrop-blur-md w-5/12 h-screen hidden flex flex-col gap-5 overflow-y-auto p-2 border-2 rounded-lg">
    <div
      class="w-10 h-10 absolute top-0 left-0 flex flex-auto rounded-lg hover:text-white border-2 bg-amber-600 hover:bg-red-600 justify-center items-center"
      onClick=visibilityHide("CategoryEdit")>x</div>
    <div class="flex flex-col gap-3 overflow-y-auto overflow-x-hidden">
      <div class="w-full h-fit p-4 border-2 rounded-lg text-center text-3xl font-bold">📃 Categories</div>
      <?php
      $queryCat = "Select * from category where User_Name='$currentuser' order by position";
      $resultCat = mysqli_query($connection, $queryCat);
      mysqli_data_seek($resultCat, 0);
      while ($arrayCat = mysqli_fetch_array($resultCat)) {
        ?>
        <form method="post" class="w-full h-fit flex flex-col p-2 gap-2 border-2 rounded-lg"
          id="<?php echo $arrayCat['id']; ?>">
          <div class="w-full h-fit flex flex-row">
            <input type="text" maxlength="5"
              class="text-center w-20 h-20 border-2 flex text-4xl flex-auto justify-center items-center rounded-xl"
              placeholder="<?php echo $arrayCat['Emoji']; ?>" name="CatEmoji" id="CatEmoji">
            <div class="flex flex-col gap-2 px-2">
              <div class="flex flex-row gap-2 w-full h-fit">
                <label for="CatTitle" class="border-2 p-2 rounded-lg min-w-max">Title</label><input type="text"
                  name="CatTitle" id="CatTitle" class=" w-full indent-2 rounded-lg"
                  value="<?php echo $arrayCat['Title']; ?>">
              </div>
              <div class="flex flex-row gap-5">
                <div class="flex flex-row gap-2 w-full h-fit">
                  <label for=" CatPosition" class="border-2 p-2 rounded-lg min-w-max">
                    Position</label><input type="text" name="CatPosition" id="CatPosition"
                    class="w-full indent-2 rounded-lg" value="<?php echo $arrayCat['position']; ?>">
                </div>

                <input type="checkbox" name="CatVisibility" id="CatVisibility" <?php
                if ($arrayCat['visibility'] == 1) {
                  echo "checked";
                }
                ?> class="">
              </div>
            </div>
          </div>
          <div class="w-full h-fit flex flex-row justify-around">
            <input type="button" value="Delete" class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light"
              onclick=deleteCategory(<?php echo $arrayCat['id']; ?>)>
            <input type="button" value="Update" class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light"
              onclick=updateCategory(<?php echo $arrayCat['id']; ?>)>
          </div>
        </form>
        <?php
      }
      ?>
    </div>
</body>

</html>