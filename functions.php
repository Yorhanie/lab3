<?php

// Конекшн до бази
function getDbConnection():PDO {
    static $connection;

    if(null===$connection) {
        try {
            $connection = new PDO('mysql:host=localhost;dbname=weblabs',
                'root', '159753');
            return $connection;
        } catch (PDOException $e) {
            http_response_code(500);
            echo "Error!: {$e->getMessage()}";
            die;
        }
    }

    return $connection;
}


// Функція для отримання списку статей
function getArticles(): array {
    $db = getDbConnection();

    // // готуємо запит до виконання
    // $query = $db->prepare("SELECT * FROM articles");
    // // запускаємо підготовлений запит
    // $query->execute();
    // // вибираємо наступний рядок з набору результатів.
    // $articles = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $db->query('SELECT * FROM articles');
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    return  $articles;
}

// Функція для отримання списку статей
function getArticleData(int $articleId):? array {
    $db = getDbConnection();

    // // готуємо запит до виконання
    // $query = $db->prepare("SELECT * FROM articles WHERE id = :articleId");
    // // запускаємо підготовлений запит
    // $query->execute([':articleId' => $articleId]);
    // // вибираємо наступний рядок з набору результатів.
    // $article = $query->fetch(PDO::FETCH_ASSOC);

    $query = $db->query("SELECT * FROM articles WHERE id = $articleId");
    $article = $query->fetch(PDO::FETCH_ASSOC);
    return $article ? $article : null;
}