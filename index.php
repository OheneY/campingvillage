<?php  
    include 'database.php';
    $db = new database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Camping Village</title>
</head>
<body>
    <div id="wrapper">
    <?php include 'templates/indexHeader.php';?>
        <div id="main">
            <div class="fpimg">
                <img src="img/img2.jpg" alt="">
            </div>
            <div id="content">
                
            </div>
        </div>
    <?php include 'templates/footer.php';?>
    </div>
</body>
</html>