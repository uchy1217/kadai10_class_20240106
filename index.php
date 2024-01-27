<?php
// ベースカラーを緑に設定するかどうかの変数
$baseColor = true;
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>
    <!-- Main[Start] -->
    <form method="POST" action="insert.php">    
        <div class="jumbotron" style="padding-left: 40px;">
            <fieldset>
                <legend><b>書籍登録</b></legend>
                <label><b>書籍名：</b><input type="text" name="name"></label><br>
                <label>URL：<input type="text" name="url"></label><br>
                <label>出版社：<input type="text" name="publisher"></label><br>
                <label>書籍内容：</label> 
                <br>
                <label><textArea name="content" rows="15" cols="80"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->

</body>

</html>
