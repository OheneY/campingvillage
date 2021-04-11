<?php  
    include '../database.php';
    $db = new database();

    // initialiseer sessie
    session_start();
    
    // check of gebruiker al is ingelogd
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        //leid gebruiker om
        header("location: medewerker.php");
        exit;
    }

    //variabelen defineren met lege waarden
    $username = $password = "";
    $username_err = $password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //controleer of velden leeg zijn
        //trim verwijderd wit ruimte
        if(empty(trim($_POST["username"]))){
            $username_err = "Gebruikersnaam is verplicht!";
        }else{
            $username = trim($_POST["username"]);
        }

        if(empty(trim($_POST["psw"]))){
            $password_err = "Wachtwoord is verplicht!";
        }else{
            $password = trim($_POST["psw"]);
        }


        //Valideer inloggegevens
        $sql = "SELECT medewerkerID, gebruikersnaam, wachtwoord FROM medewerker WHERE gebruikersnaam = :username";
        
        if($statement = $dbh->prepare($sql)){
            // Bind variabelen als parameters aan de prepared statement
            $statement->bindParam(":username", $param_username, PDO::PARAM_STR);

            //parameters instellen
            $param_username = trim($_POST["username"]);

            //probeer prepared statement uittevoeren
            if($statement->execute()){
                //check of gebruikersnaam bestaat & varifiëer wachtwoord
                if($statement->rowCount() == 1){
                    if($row = $statement->fetch()){
                        $id = $row["medewerkerID"];
                        $username = $row["gebruikersnaam"];
                        $hashed_password = $row["wachtwoord"];
                        if(password_verify($password,$hashed_password)){
                            //start nieuwe sessie
                            session_start();

                            //sessie variabelen
                            $_SESSION["loggedin"] = true;

                            header("location: medewerker.php");
                        }else{
                            //wachtwoord error message
                            $password_err = "Wachtwoord is onjuist.";
                        }
                    }
                }else{
                    //gebruikersnaam error message
                    $username_err = "Geen account gevonden met de naam ";
                }
            }else{
                //als uitvoeren niet lukt
                echo "Er is iets misgegaan probeer later opnieuw";
            }
        }
    }
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
                        <span>Login Medewerkers</span>
                    </div>
                    <form action="" method="POST">
                        <div class="fmrow <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <div class="fmblk">
                                <label for="">Gebruikersnaam:</label>
                            </div>
                            <div class="fmblk">
                                <input type="text" name="username">
                                <span class=""><?php echo $username_err; ?></span>
                            </div>
                        </div>
                        <div class="fmrow <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"">
                            <div class="fmblk">
                                <label for="">Wachtwoord:</label>
                            </div>
                            <div class="fmblk">
                                <input type="password" name="psw">
                                <span class=""><?php echo $password_err; ?></span>
                            </div>
                        </div>
                        <div class="fmrow">
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