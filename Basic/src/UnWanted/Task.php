<?php
session_start();
$currentuser = $_SESSION['username'];
$category = 0;

?>
<html>

<head>
    <script>

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
        // function TaskEditFun(id) {
        //     var myHeaders = new Headers();
        //     myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
        //     var urlencoded = new URLSearchParams();
        //     urlencoded.append("value", id);
        //    
        //     var requestOptions = {
        //         method: 'POST',
        //         headers: myHeaders,
        //         body: urlencoded,
        //         redirect: 'follow'
        //     };

        //     fetch("TaskEdit.php", requestOptions)
        //         .then(response => response.text())
        //         .then(result => responseCollection(result))
        //         .catch(error => console.log('error', error));
        // }
        function responseCollection(result) {
            const data = result.split('"State":')[1].trim();
            const final = data.substring(0, data.length - 1);
            let state;
            if (final == "true") {
                state = true;
            } else {
                state = false;
            }
            console.log(state);
            if (state == true) { document.getElementById("taskEdit").classList.remove("hidden") }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
    <div class="flex flex-col gap-5 overflow-y-auto overflow-x-hidden">
        <?php
        require 'Connection.php';
        if ($category != 0) {
            $query = "Select * from task where User_Name='$currentuser' and Category=$category order by date,time";
        } else {
            $query = "Select * from task where User_Name='$currentuser' order by date,time";
        }
        $result = mysqli_query($connection, $query);
        while ($array = mysqli_fetch_array($result)) {
            ?>
            <div class="w-full h-fit flex flex-col items-end">
                <div class="w-full rounded-xl border-2 rounded-br-none flex flex-row gap-4 items-center p-4">
                    <div onClick="SelectFun1(<?php echo $array["status"]; ?>,<?php echo $array["id"]; ?>)"
                        class="rounded-full w-10 h-10 flex justify-around items-center">
                        <p id="Tick">
                            <?php if ($array["status"] == true) {
                                echo "✔️";
                            }
                            ?>
                        </p>
                    </div>
                    <div class="w-full h-full" onClick="()=>{<?php $_SESSION['taskID'] = $array['id'] ?>}">
                        <p class="text-xl indent-5 ">
                            <?php echo $array["task"]; ?>
                        </p>
                    </div>
                </div>
                <div class="w-fit px-3 h-fit rounded-b-xl flex flex-row gap-3 border-2 border-t-0 ">
                    <div>Date :
                        <?php echo $array["Date"]; ?>
                    </div>
                    |
                    <div>Time :
                        <?php echo $array["time"]; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <!-- Task edit menu -->
    <object data="TaskEdit.php" id="taskEdit" class="absolute top-0 left-0 w-full h-full hidden">
    </object>
</body>

</html>