<?php
    include 'Database.php';
    $db =  new database();

    //haal gegevens uit de database
    $sql = "SELECT * FROM artikel WHERE artikelID=:code";
    $result = $db->select($sql, ['code'=>$_GET['artikel_id']]);
    print_r($result);
    if(count($result)>0){
        $artikel = $result[0]['artikel'];
        $prijs = $result[0]['prijs'];
    }



    if(isset($_POST['submit'])){ 

        $sql = "UPDATE artikel SET artikel=:artikel, prijs=:prijs WHERE artikelID = :code;";
        
        $placeholders = [
            'code'=>$_POST['artikelcode'],
            'artikel'=>$_POST['artikel'],
            'prijs'=>$_POST['prijs']        
        ];

        print_r($_POST);

        // roep functie aan uit je database class
        // $db->update($sql, $placeholders);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>FlowerPower</title>
</head>
<body>
    <div id="wrapper">
        <header>
            <div class="logo">
                <a href="../index.php"><img src="../img/logo.png" alt=""></a>
            </div>
            <div class="title">
                <span>FlowerPower</span>
            </div>
        </header>
        <div id="main">
            <nav>
            <ul>
                <li><a href="../pages/loginEmployee.php">Inloggen Medewerkers</a></li>
                <li><a href="../pages/loginCustomer.php">Inloggen Klanten</a></li>
                <li><a href="#">Registreren</a></li>
                <li><a href="../pages/contact.php">Contact pagina</a></li>
                <li><a href="../pages/overzicht_artikelen.php">OVA</a></li>
                <li><a href="../pages/overzicht_medewerker.php">OVM</a></li>
            </ul>
            </nav>
            <div id="content">
                <form action="edit_artikel.php" method="post">
                    <input type="hidden" name="artikelID" value="<?php echo isset($_GET['artikel_id']) ? $_GET['artikel_id'] :'' ?>">
                    <input type="text" name="artikel" placeholder="<?php echo isset($artikel) ? $artikel : 'artikel'?>">
                    <input type="text" name="prijs" placeholder="<?php echo isset($prijs) ? $prijs : 'prijs'?>">
                    <input type="button" name="submit" value="Wijzig">
                </form>
            </div>
        </div>
    </div>

</body>
</html>