<?php
require "connect.php";
require "helpers.php";

if(validGET("id")){
    $idArticleToEdit = $_GET["id"];
    $stmt = $db->prepare("SELECT * from article WHERE idArticle = :idArticleToEdit;");
    $stmt->execute([
        ':idArticleToEdit' => $idArticleToEdit
     ]);
     $blogEdit = $stmt->fetchAll(); 
    //  print_r($blogEdit);

     $valueIdArticle = $blogEdit[0]['idArticle'];
     $valueTitre = $blogEdit[0]['titreArticle'];
     $valueArea = $blogEdit[0]['contenuArticle'];
     $valueToTestTemp = $blogEdit[0]['idCategorie'];
}

$errors = [];


if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["titreArticle"])){
        $statueArticle = "Publié";
        

        $stmt = $db->prepare("
        UPDATE article SET 
        titreArticle = :titreArticle, 
        contenuArticle = :contenuArticle, 
        statueArticle = :statueArticle 
        WHERE idArticle = :idArticle;
        ");
        $stmt->execute([
            ':titreArticle' => htmlspecialchars($_POST["titreArticle"]), 
            ':contenuArticle' => htmlspecialchars($_POST["contenuArticle"]), 
            ':statueArticle' => $statueArticle, 
            ':idArticle' => htmlspecialchars($_POST["idArticle"])
         ]);

    }
    header("Location: ./index.php");
}


?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier l'article</title>
        <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.min.css">
    </head>

    <body>
            <div class="container d-flex flex-column align-items-center">
                <h1>Modifier l'article</h1>
                <?php foreach($errors as $error){ ?>
                    <div class="alert alert-warning">
                        <?= $error ?>
                    </div>
                <?php } ?>

                <form method="POST" >
                    Titre : <br/>
                    <input type="hidden" value="<?= $valueIdArticle ?>" name="idArticle" placeholder="">
                    <input type="text" value="<?= $valueTitre ?>" name="titreArticle" placeholder="Titre de l'article" required/><br/>
                    Contenu : <br/>
                    <textarea name="contenuArticle" class="form-label"required ><?= $valueArea ?></textarea><br/>
                    <input type="submit" name="submit" class="btn btn-primary" value="Publier" />
                    <input type="submit" name="submit" class="btn btn-primary" value="sauvegarder" />
                    <a class="btn btn-success active" href="delete.php?id=<?= $valueIdArticle ?>">Supprimer</a>
                </form>
            
            
                <div class="card p-4 w-50">
                    <form method="POST">
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-50">
                                <label for="input-lieu">Catégorie</label><br/>
                                <select id="input-lieu" name="nomCategorie">
                                    <option>Cake</option>
                                    <option>Sweets</option>
                                </select>
                            </div>

                            <div class="form-group w-50">
                                <label for="input-statutArticle">Statue Article</label><br/>
                                <select id="input-statutArticle" name="statueArticle">
                                    <option>Publié</option>
                                    <option>Brouillon</option>
                                    <option>Corbeille</option>
                                </select>
                        </div>

                            <div class="form-group w-50">
                                <label for="input-groupe">tags</label><br/>
                                <select id="input-groupe" name="nomTag">
                                    <option >Jelly</option>
                                    <option>Fudge</option>
                                    <option>Beans</option>
                                </select>
                            </div>
                        </div>  
                    <button type="submit" class="mt-3 btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    </body>
</html>