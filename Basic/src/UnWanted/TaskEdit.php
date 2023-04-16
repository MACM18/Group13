<?php
session_start();
require 'Connection.php';
$currentUser = $_SESSION['username'];
$id = $_SESSION['TaskId'];
$query2 = "SELECT id,Title FROM category WHERE User_Name='$currentUser'";
$query = "SELECT * FROM task WHERE id=$id";
$result = mysqli_query($connection, $query);
$result2 = mysqli_query($connection, $query2);
$data = mysqli_fetch_assoc($result);
$data2 = mysqli_fetch_array($result2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>TaskEdit</title>
    <script>

    </script>
</head>

<body class="flex flex-row justify-center ">
    <div class=" w-2/3 h-screen border-2 rounded-lg p-5 flex flex-row">
        <div class="w-1/6 h-full"></div>
        <div class="w-5/6 h-full">
            <form class="w-full h-full p-5 flex flex-col justify-around items-end">
                <div class="flex flex-row gap-1 w-full"><label for="TaskTitle"
                        class="border-2 p-2 rounded-lg min-w-max">Task</label><input type="text" name="Task"
                        id="TaskTitle" class="w-full indent-2 rounded-lg" value="<?php echo $data['task'] ?>"></div>
                <div class="w-full flex flex-row gap-2">
                    <div class="flex flex-row gap-1 w-full"><label for=" TaskDate"
                            class="border-2 p-2 rounded-lg min-w-max">Date</label><input type="date" name="Date"
                            id="TaskDate" class="w-full indent-2 rounded-lg " value="<?php echo $data['Date'] ?>"></div>
                    <div class="flex flex-row gap-1 w-full"><label for="TaskTime"
                            class="border-2 p-2 rounded-lg min-w-max">Time</label><input type="time" name="Time"
                            id="TaskTime" class="w-full indent-2 rounded-lg" value="<?php echo $data['time'] ?>"></div>
                </div>
                <div class="flex flex-row gap-1 w-full"><label for="TaskCategory"
                        class="border-2 p-2 rounded-lg min-w-max">Category</label><select name="Category"
                        id="TaskCategory" class="w-full indent-2 rounded-lg">
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
                        onclick="DeleteData()">Delete</button><button
                        class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light"
                        onclick="UpdateData()">Save</button></div>
            </form>
        </div>

    </div>
</body>

</html>
<?php
$response = array();
if (isset($id)) {
    $response['State'] = true;
} else {
    $response['State'] = false;
}
echo json_encode($response);
?>