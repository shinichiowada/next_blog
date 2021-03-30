<?php

require_once __DIR__ . '/../../models/Post.class.php';

$post = Post::findWithUser(1);
var_dump($post);

?>

<!DOCTYPE html>
<html lang="ja">

<?php include __DIR__ . "/../common/_head.php"; ?>

<body>
    <?php include __DIR__ . "/../common/_header.php"; ?>

    <div class="wrapper">
        <article class="post-detail">
            <!-- <h2 class="post-title">テストタイトル</h2> -->
            <h2 class="post-title"><?= h($post->getTitle()); ?></h2>
            <div class="post-user-area">
                <div class="post-user">
                    <!-- <img src="/images/users/20210220090602_user2.png" alt="">
                    <p class="post-user-name">テストユーザー名</p> -->
                    <img src="<?= h($post->getUser()->getAvatarPath()); ?>" alt="">
                    <p class="post-user-name"><?= h($post->getUser()->getName()); ?></p>
                </div>
                <!-- <div class="post-date">2021.2.10 14:20:11</div> -->
                <div class="post-date"><?= h($post->getCreatedAt()); ?></div>
            </div>
            <div class="image-trim">
                <!-- <img src="/images/posts/202102200906025_post1.jpg" alt=""> -->
                <img src="<?= h($post->getImagePath()); ?>" alt="">
            </div>
            <!-- <p class="post-body">テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文 テストブログの本文</p> -->
            <p class="post-body"><?= nl2br(h($post->getBody())); ?></p>
            <div class="post-btn-edit-area">
                <a href="edit.php" class="btn btn-edit">編集</a>
                <form action="delete.php" method="post">
                    <input type="submit" value="削除" class="btn btn-delete" onClick="return confirm('ブログを削除しますか？')">
                </form>
            </div>
        </article>

        <div class="comment">
            <div class="comment-header">
                <h3 class="comment-count">
                    <!-- コメント(2) -->
                    コメント(<?= h($post->getCommentsCount()); ?>)
                </h3>
                <a href="/comments/new.php" class="btn-comment-new">コメントする</a>
            </div>
            <hr class="comment-hr">
            <ul class="comment-list">
                <li class="comment-list-item">
                    <div class="comment-no">1</div>
                    <div class="comment-detail">
                        <p class="comment-body">テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント</p>
                        <div class="comment-user-area">
                            <div class="comment-user">
                                <img src="/images/users/20210220090602_user3.png" alt="">
                                <h4 class="comment-user-name">テストコメントユーザー</h4>
                            </div>
                            <p class="comment-date">2021-02-07 10:00:41</p>
                            <div class="comment-btn-area">
                                <a href="/comments/edit.php" class="comment-edit">編集</a>
                                <form action="/comments/delete.php" method="post">
                                    <input type="submit" value="削除" class="comment-delete" onClick="return confirm('ブログのコメントを削除しますか？')">
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="comment-list-item">
                    <div class="comment-no">2</div>
                    <div class="comment-detail">
                        <p class="comment-body">テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント テストコメント</p>
                        <div class="comment-user-area">
                            <div class="comment-user">
                                <img src="/images/users/20210220090602_user2.png" alt="">
                                <h4 class="comment-user-name">テストコメントユーザー2</h4>
                            </div>
                            <p class="comment-date">2021-02-08 14:20:01</p>
                            <div class="comment-btn-area">
                                <a href="/comments/edit.php" class="comment-edit">編集</a>
                                <form action="/comments/delete.php" method="post">
                                    <input type="submit" value="削除" class="comment-delete" onClick="return confirm('ブログのコメントを削除しますか？')">
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <?php include __DIR__ . "/../common/_footer.php"; ?>
</body>

</html>