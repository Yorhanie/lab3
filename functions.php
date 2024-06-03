<?php
function getArticles(): array {
    return [
        [
            'id' => 1,
            'title' => 'Article #1',
            'content' => 'He is everywhere. HELP. He is in cars. He is under the cones. In the manholes. HE IS IN THE TRASHCANS. He is zombie. He is behind me. He-',
            'author' => 'Kiryu',
            'created' => 'December 5, 2005',
            'image' => 'MAJIMA.jpg'
        ],
        [
            'id' => 2,
            'title' => 'Article #2',
            'content' => 'Aalto is a multifaceted character whose enigmatic presence, strategic mind, and unique abilities make him a compelling figure in "Wuthering Waves," contributing to the game\'s depth and engaging narrative.',
            'author' => 'Encore',
            'created' => 'April 17, 2004',
            'image' => 'Aalto.jpg'
        ],
        [
            'id' => 3,
            'title' => 'Article #3',
            'content' => 'Huening Kai’s unique background, combined with his talent and charisma, has made him a standout member of TXT. His contributions to the group’s music and his ability to connect with fans have solidified his place in the K-pop industry.',
            'author' => 'Jay',
            'created' => 'April 17, 2004',
            'image' => 'Hueningkai.jpg'
        ],
    ];
}

function getArticleData(int $articleId):? array {
    $articles = getArticles();
    foreach ($articles as $article) {
        if ($article['id'] === $articleId) {
            return $article;
        }
    }
    return null;
}