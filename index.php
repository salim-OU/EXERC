<?php
require "data.php";
/*require "helpers.php";*/

$stmt = $db->query("SELECT * from article");
$article = $stmt->fetchAll();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between mt-3 mb-3">
            <h1>Liste des articles</h1>
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
</body>
</html>