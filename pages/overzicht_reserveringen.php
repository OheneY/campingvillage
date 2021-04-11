<?php  
    include '../database.php';
    $db = new database();

    $reservering = $db->select("SELECT * from reservering",[]);

    $columns = array_keys($reservering[0]);
    $row_data = array_values($reservering);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Camping Village</title>
</head>
<body>
    <div id="wrapper">
        <?php include '../templates/header.php';?>
        <div id="main">
            <div id="content">
                <div style="flex-flow: row;">
                    <table>
                        <tr>
                            <?php
                                foreach($columns as $column){
                                    echo "<th><strong> $column </strong></th>";
                                }
                            ?>
                        </tr>
                        <?php
                            foreach($row_data as $row){?>
                                <tr>
                                    <?php
                                        $reservering_id = $row['ReserveringID'];

                                        foreach($row as $data){
                                            echo "<td> $data </td>";
                                        }?>
                                <?php
                            }
                            ?>
                    </table>
                    <div class="ovzBtn">
                        <a href="../pages/overzicht_activiteiten.php"><span>Overzicht Activiteiten</span></a>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../templates/footer.php';?>
    </div>

</body>
</html>