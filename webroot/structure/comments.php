<?php
/**
 * @var array $errors
 * @var array $comments
 */
?>

<section class="article-comments">
    <h3>Write a comment:</h3>
    <form action="" method="post" class="form-container">
        <input type="hidden" name="action" value="new-comment">

        <div class="form-input-group">
            <input class="form-input-field" value="<?= htmlspecialchars($_POST['name']??'');?>" type="text" name="name" id="nameField" max="50" placeholder="Your name" require>
            <?php if (array_key_exists('name', $errors)) { ?>
                <div class="input-error"><?= $errors['name']; ?></div>
            <?php } ?>
        </div>

        <div class="form-input-group">
            <select class="form-input-field" name="rate" id="rateField">
                <option class='form-input-option' selected disabled>Rate this post</option>
                <?php
                $ratings = [1, 2, 3, 4, 5];
                foreach ($ratings as $rating) {
                    $selected = (int)($_POST['rate']?? '') === $rating ? 'selected' : '';
                    echo "<option class='form-input-option' value='$rating' $selected>" . $rating . str_repeat('✭', $rating) . "</option>";
                }
                ?>
            </select>
            <?php if (array_key_exists('rate', $errors)) { ?>
                <div class="input-error"><?= $errors['rate']; ?></div>
            <?php } ?>
        </div>

        <div class="form-input-group">
            <textarea class="form-input-field" name="content" id="contentField" cols="30" rows="10" placeholder="Write your comment here" require><?= htmlspecialchars($_POST['content']??''); ?></textarea>
            <?php if (array_key_exists('content', $errors)) { ?>
                <div class="input-error"><?= $errors['content']; ?></div>
            <?php } ?>
        </div>

        <button type="submit">Leave comment</button>
    </form>
    <div>
        <?php foreach ($comments as $comment) { ?>
            <div class="comment">
                <b class='comment-author' title='Comment author' ><?= htmlspecialchars($comment['author']); ?></b>
                <time class='comment-date' title='Comment time' datetime="<?= $comment['created']; ?>"><?= $comment['created']; ?></time>
                <span class='comment-rate' title='Rating'>Rate: <?= $comment['rate'] ?>✭</span>
                <p class='comment-content'><?= nl2br(htmlspecialchars($comment['content']), false); ?></p>
            </div>
        <?php } ?>
    </div>
</section>