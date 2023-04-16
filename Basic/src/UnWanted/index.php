<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Task Manager</title>
</head>

<body>
    <div id="Top_Section">
        <div id="Frame1">
            <div id="Category"></div>
        </div>
        <div id="User_Profile"></div>
    </div>

    <div id="Navbar" class="flex flex-col gap-2 border ">
        <div>
            <h1>Tasks Management</h1>
        </div>
        <div>
            <button id="Color_Button">Colors ➡️</button>
            <button id="Category_Button">Category ➡️</button>
            <button id="Dark_Button" onclick=setColor("bg-red-100","Navbar")>Dark Mode ➡️</button>
            <button id="Exit_Button">Exit ➡️</button>
        </div>
    </div>
    <div id="Tasks"></div>
    <div id="Add_Button"></div>
    <script>
        let PrimaryColor = "bg-blue-300";
        function setColor(Color, ID) {
            const element = document.getElementById(ID);
            element.classList.add(Color);
        }
    </script>
</body>

</html>