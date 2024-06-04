<?php
require_once("functions.php");

$articleID = $_GET['id'] ?? null;

if (null == $articleID) {
    http_response_code(400);
    exit;
}

$articleID = (int)$articleID;

$article = getArticleData($articleID);

if (null === $article) {
    http_response_code(404);
    exit();
}

$page_title = "{$article['title']}";
$curPage = "articlePage";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("structure/title.php"); ?>
</head>

<body>
<?php include("structure/header.php")?>

<main class="container">
    <article class="blog-post">
        <header class="blog-post-header">
            <h1 class="blog-post-heading"><?= $article['title']; ?></h1>
            <div class="blog-meta">
                <?= $article['author']; ?> <time datetime="<?= $article['created']; ?>"><?= $article['created']; ?></time>
            </div>
            <img src="image/<?= $article['image']; ?>" alt="article_img">
        </header>
        <p class="blog-post-description">
            <?= $article['content']; ?>
        </p>
        <div>
            <?= $article['comments']; ?> Comment(s)
        </div>
    </article>
</main>

<?php include("structure/footer.php") ?>
</body>

</html>
