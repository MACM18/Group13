<?php
session_start();
require 'Connection.php';
$currentuser = $_SESSION['username'];
?>
<html>

<head></head>
<script src="https://cdn.tailwindcss.com"></script>
<script src="Visibility.js"></script>
<script>

</script>

<body>
    <div class="w-5/12 h-screen flex flex-col gap-5 overflow-y-auto p-2 border-2 rounded-lg">
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
                                <label for="CatTitle" class="border-2 p-2 rounded-lg min-w-max">Title</label><input
                                    type="text" name="CatTitle" id="CatTitle" class=" w-full indent-2 rounded-lg"
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
                        <input type="button" value="Delete"
                            class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light">
                        <input type="button" value="Update"
                            class="border-2 p-2 rounded-lg shadow-lg hover:shadow-none font-light">
                    </div>
                </form>
                <?php
            }
            ?>
        </div>
</body>

</html>