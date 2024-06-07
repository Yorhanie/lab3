<?php

require_once("functions.php");
$page_title='Home';
$curPage='home';
$articles = getArticles();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("structure/title.php"); ?>
</head>

<body>
<?php require("structure/header.php"); ?>

<main class="container">
    <?php foreach ($articles as $article) { ?>
        <?php $numberOfComments = $article['numbersComments']; ?>
        <?php $averageRate = $article['avgRate']; ?>
        <?php require("structure/articles.php") ?>
    <?php }?>
</main>

<?php include("structure/footer.php"); ?>
</body>
</html>>