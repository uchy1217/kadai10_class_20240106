<?php

session_start();
require_once('funcs.php');

$id = $_GET['id']; //?id~**を受け取る
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_an_table WHERE id=:id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}

$baseColor = true;

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
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

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default" style="border: none;"> <!-- 枠線を無くすスタイルを追加 -->
            <div class="container-fluid">
                <div class="navbar-header"><img src="./img/proimg2.png" alt="img" class="img" style="width: 50px; height: 50px;"></div> <!-- 同じサイズに設定 -->
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php">
        <div class="jumbotron" style="padding-left: 40px;">
            <fieldset>
                <legend>[編集]</legend>
                <label>名前：<input type="text" name="name" value="<?= $row['name'] ?>"></label><br>
                <label>URL：<input type="text" name="url" value="<?= $row['url'] ?>"></label><br>
                <label>Publisher：<input type="text" name="publisher" value="<?= $row['publisher'] ?>"></label><br>
                <label>内容</label><br>
                <textArea name="content" rows="15" cols="80"><?= $row['content'] ?></textArea></label><br>
                <label>GPT要約</label><br>
                <textArea name="gptcontent" rows="5" cols="80"><?= $row['gptcontent'] ?></textArea></label><br>

                
                    <?php
                if ($_SESSION['kanri_flg'] === 1) {
                    echo '<input type="submit" value="送信">';
                }
                ?>




                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
