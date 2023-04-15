<?php
session_start();
require "Connection.php";
$currentuser = $_SESSION['username'];
// $currentuser = "Elephant";
$query = "select * from user where User_Name='$currentuser'";
$result = mysqli_query($connection, $query);
$data = mysqli_fetch_assoc($result);
?>
<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="JavaScript/Visibility.js"></script>
    <script src="Visibility.js"></script>
</head>

<body>
    <div>
        <div id="User_Profile"
            class="absolute top-1 right-0 py-3 px-1 hover:cursor-pointer bg-blue-300 border-2 border-blue-800 dark:bg-black rounded-l-xl"
            onClick=visibilityToggle("show","User_Profile","User_Profile_Max")>
            ◀️
        </div>
        <div id="User_Profile_Max" onClick=visibilityToggle("hide","User_Profile","User_Profile_Max")
            class=" absolute top-1 right-1 w-fit h-fit p-2 border-2 rounded-lg shadow-lg hover:cursor-pointer hidden">
            <div class="p-2 border-2 w-fit h-fit flex flex-col justify-around rounded-lg items-center">
                <div class="w-fit h-fit rounded-lg border-2">
                    <img class=" object-cover w-20 h-20 rounded-lg" alt="<?php echo $data['image'] ?>"
                        src="images\<?php echo $data['image'] ?>.jpg">
                </div>
                <div>
                    <?php echo $data['User_Name'] ?>
                </div>
                <div class="max-w-40">
                    <?php echo $data['Email'] ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>