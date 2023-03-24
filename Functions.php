<?php
require Connection.php;
$query='Select title,emoji from category where status="open"';
$array=mysqli_fetch_array($query);
function categoriesArray($array)
{
    while ($array) {
        ?>
        <div class="categotyBox">
            <div class="Title">
                <?php $array[0] ?>
            </div>
            <div>
                <?php $array[1] 
            </div>
        </div>
    }
}
?>