<?php
session_start();
$currentUser = $_SESSION['username'];
?>
<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function selectCategory(element) {
            // var subDiv = element.querySelector('#ID');
            console.log(element);
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

            fetch("fetchTasks.php", requestOptions)
                .then(response => response.json())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));
        }
        // function saveData(params) {
        //     localStorage.setItem("Tasks", JSON.stringify(params));
        // }
    </script>
</head>

<body>
    <div class="flex flex-row gap-5 overflow-x-auto overflow-y-hidden">
        <?php
        require 'Connection.php';
        $query = "Select title,emoji,id from category where visibility=true and User_Name='$currentUser' order by position";
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
                <div id="cBEmoji" class="w-20 h-20 border-2 flex text-4xl flex-auto justify-center items-center rounded-xl">
                    <?php echo $array[1]; ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>