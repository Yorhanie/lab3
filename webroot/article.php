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
$comments = getArticleComments($articleID);
$averageRate = $article['avgRate'];
if ($averageRate === null) {
    $averageRate = 0;
}
else {
    $averageRate = number_format($averageRate, 1);
}

$action = $_POST['action'] ?? null;
$errors = [];
if ('new-comment' === $action) {
    $author = trim((string)($_POST['name'] ?? null));
    if ('' === $author) {
        $errors['name'] = 'This field is can not be empty';
    } elseif (mb_strlen($author) > 50) {
        $errors['name'] = 'Length can not be more than 50 characters';
    }

    $rate = (int)($_POST['rate'] ?? null);
    if ($rate < 1 || $rate > 5) {
        $errors['rate'] = 'Invalid rate';
    }

    $content = trim((string)($_POST['content'] ?? null));
    if ('' === $content) {
        $errors['content'] = 'This field is can not be empty';
    } elseif (mb_strlen($content) > 200) {
        $errors['content'] = 'Length can not be more than 200 characters';
    }
    if (0 === count($errors)) {
        $db = getDbConnection();
        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `comments` 
                (`id`, `article_id`, `author`, `rate`, `content`, `created`) VALUES 
                (NULL, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$articleID, $author, $rate, $content, $createdAt]);

        if (false === $result) {
            http_response_code(500);
            exit();
        }

        header("Location: article.php?id={$articleID}");
        exit;
    }
}
$article['created'] = date('F d, Y');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("structure/title.php"); ?>
</head>

<body>
<?php include("structure/header.php") ?>

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
    </article>
    <div class="article-meta">
        <span><?= $article['numbersComments']; ?> Comment(s)</span>
        <span>Rate: <?= $averageRate ?>✭</span>
    </div>

    <?php include("structure/comments.php") ?>
</main>

<?php include("structure/footer.php") ?>
</body>

</html>
