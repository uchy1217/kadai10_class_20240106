<?php
// ベースカラーを緑に設定するかどうかの変数
$baseColor = true;

// 0. SESSION開始！！
session_start();
require_once('funcs.php');

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM gs_an_table');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="detail.php?id=' . $r["id"] . '">';
        $view .= h($r['id']) . " " . h($r['name']);
        $view .= '<br>';
        $view .= h($r['url']);
        $view .= '</a>';
        $view .= "　";
        $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r['id'] . '">';

        if ($_SESSION['kanri_flg'] === 1) {
        $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
        }

        $view .= '</a>';
        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book List</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

        <?php if ($baseColor): ?>
        /* ベースカラーを緑にするスタイル */
        body {
            background: linear-gradient(to right, rgba(190, 3, 169, 0.5), rgba(255, 182, 193, 0.5));
        }
        .navbar-default {
            background: linear-gradient(to right, #be03a9, #ffb6c1); /* より薄い紫色とピンクのグラデーション */
        }

        .container-fluid {
            border:none;
        }

        .navbar-default .navbar-brand {
            color: white;
        }

        <?php endif; ?>

        </style>



</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
    <nav class="navbar navbar-default" style="border: none;"> <!-- 枠線を無くすスタイルを追加 -->
                <div class="container-fluid">
                <div class="navbar-header">
                    <div class="navbar-header"><img src="./img/proimg2.png" alt="img" class="img" style="width: 50px; height: 50px;"></div> <!-- 同じサイズに設定 -->
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron"><?= $view ?></div>
    </div>
    <!-- Main[End] -->

</body>

</html>
