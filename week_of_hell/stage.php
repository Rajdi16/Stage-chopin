<?php
include('./config.php');

function entreprise_list()
{
    global $conn;
    $query = "SELECT * FROM entreprise";
    $result = $conn->query($query);
    return $result->fetchAll();

}
?>
<html lang="en">


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Fatech Data From Database in Php</title>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card_mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Fatech Data From Database in Php</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nom de enterprise</td>
                                <td>Date de debut </td>
                                <td>Date de fin</td>
                                <td> Email </td>
                            </tr>
                            <?php
                            $data = entreprise_list();
                            foreach ($data as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['nom'] ?></td>
                                    <td><?php echo $row['date_debut'] ?></td>
                                    <td><?php echo $row['date_fin'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>