<?php  
    include '../database.php';
    $db = new database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/form.css">
    <title>Camping Village</title>
</head>
<body>
    <div id="wrapper">
        <?php include '../templates/header.php';?>
        <div id="main">
            <div id="content">
                <div class="form">
                    <div class="formTitle">
                        <span>Reserveren</span>
                    </div>
                    <form action="" method="POST">
                        <div class="fmrow">
                            <div class="fmblk">
                                <label for="">Voornaam:</label>
                            </div>
                            <div class="fmblk">
                                <input type="text" name="voornaam">
                            </div>
                        </div>
                        <div class="fmrow">
                            <div class="fmblk">
                                <label for="">Achternaam:</label>
                            </div>
                            <div class="fmblk">
                                <input type="txt" name="achternaam">
                            </div>
                        </div>
                        <div class="fmrow">
                            <div class="fmblk">
                                <label for="">Email:</label>
                            </div>
                            <div class="fmblk">
                                <input type="txt" name="email">
                            </div>
                        </div>
                        <div class="fmrow">
                            <div class="fmblk">
                                <label for="">Telefoon Nummer:</label>
                            </div>
                            <div class="fmblk">
                                <input type="txt" name="telnummer">
                            </div>
                        </div>
                        <div class="fmrow">
                            <div class="fmblk">
                                <label for="">Periode:</label>
                            </div>
                            <div class="fmblk">
                                <input type="date" class="periode" name="periodeStart"><br />
                                <span style="color:black;">tot</span><br />
                                <input type="date" class="periode" name="periodeEind">
                            </div>
                        </div>
                        <div class="fmrow" style="margin-top: 30px;">
                            <input class="submitBtn" value="Login" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include '../templates/footer.php';?>
    </div>

</body>
</html>