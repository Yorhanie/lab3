<?php
/***
 * @var string $article
 */
$url = "article.php?id={$article['id']}";
?>

<article class="blog-card">
    <div class="blog-card-body">
        <header class="blog-card-header">
            <time datetime="<?= $article['created']; ?>"><?= $article['created']; ?></time>
            <h2 class="blog-card-heading"><a href="<?= $url; ?>"><?= $article['title']; ?></a></h2>
            <img class="blog-card-image" src="image/<?= $article['image']; ?>" alt="article_img">
        </header>
        <div class="blog-card-description">
            <?= $article['content']; ?>
        </div>
        <div class="blog-meta">
            <?= $article['author']; ?> | <a href="<?= $url; ?>"><?= $article['comments']; ?> Comment(s)</a>
        </div>
        <div class="divider"></div>
    </div>
</article>