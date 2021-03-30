<?php

require_once __DIR__ . '/../common/functions.php';

class Post
{
    private $id;
    private $category_id;
    private $user_id;
    private $title;
    private $body;
    private $image;
    private $comments_count;
    private $created_at;
    private $updated_at;

    public function __construct($params)
    {
        $this->id = $params['id'];
        $this->category_id = $params['category_id'];
        $this->user_id = $params['user_id'];
        $this->title = $params['title'];
        $this->body = $params['body'];
        $this->image = $params['image'];
        $this->comments_count = $params['comments_count'];
        $this->created_at = $params['created_at'];
        $this->updated_at = $params['updated_at'];
    }

    public static function findWithUser($id)
    {
        // 自クラスのクラスメソッドを呼び出すためselfを付ける
        return self::findById($id);
    }

    private static function findById($id)
    {
        // 空の配列で初期化
        $instance = [];
        try {
            // データベース接続
            $dbh = connectDb();

            // $idを使用してデータを取得
            $sql = 'SELECT * FROM posts WHERE id = :id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            // データを取得できた場合
            if ($post) {
                // new Post($post)と同じ意味のコードを
                // 自クラスで実行する場合、以下の構文となる
                $instance = new static($post);
            }
        } catch (PDOException $e) {
            // エラーの場合はログに出力
            error_log($e->getMessage());
        }
        return $instance;
    }
}
