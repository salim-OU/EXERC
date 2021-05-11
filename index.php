<?php
require "connect.php";
require "helpers.php";

$stmt = $db->query("SELECT * from article");
$article = $stmt->fetchAll();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between mt-3 mb-4">
            <h1 class=" rounded border border-dark p-2 m-2 text-center text-white bg-info">Liste des articles</h1>
            <a class="btn btn-primary d-flex align-items-center" href="form.php">Ajouter un article </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date de crèation</th>
                    <th>statue</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
            </thead>
            <?php foreach($article as $value){ ?>
                <tr>
                    <td><?= $value["titreArticle"] ?></td>
                    <td><?= afficheDateFR($value["dateCreationArticle"]) ?></td>
                    <td><?= $value["statueArticle"] ?></td>
                    <td><?= $value["idCategorie"] ?></td>
                    <td></td>
                    <td>
                        <a class="btn btn-success active" href="modify.php?id=<?= $value["idArticle"] ?>">Modifier</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>