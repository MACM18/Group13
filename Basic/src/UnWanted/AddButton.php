<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="JavaScript/Visibility.js"></script>
</head>

<body>
    <div id="AddButton"
        class="absolute bottom-0 right-0 p-5 h-5 w-5  border-2 rounded-lg flex flex-auto justify-center items-center"
        onClick=visibilityToggle("show","AddButton","AddButton_Max")>
        <p>+</p>
    </div>
    <div id="AddButton_Max"
        class="absolute bottom-0 right-0 p-2 w-fit h-fit rounded-lg flex flex-col justify-around border-2 gap-2 hidden"
        onClick=visibilityToggle("hide","AddButton","AddButton_Max")>
        <div class="p-2 w-fit h-fit border-2 rounded-full" onClick="newTask()">
            <p>+ New task</p>
        </div>
        <div class="p-2 w-fit h-fit border-2 rounded-full" onClick="newCategory()">
            <p>+ New Category</p>
        </div>
    </div>
</body>
<html>