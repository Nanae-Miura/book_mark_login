<?php
// データベースの内容を表示するページ
// ログインしなくても見れます


include('funcs.php');

//1.  DB接続します
//  決まった型なので、必ずコピペ!!
$pdo=db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
h2 {
    /* color: white; */
    background: #c2edff;/*背景色*/
    padding: 0.5em;/*文字まわり（上下左右）の余白*/
  }
 .nav{
    background: #c2edff;/*背景色*/
    margin-bottom: 50px;
    height: 30px;
 }
</style>
<title>詳細表示ページ</title>
</head>
<body id="main">
<!-- Head[Start] -->



<h2> 登録されたデータ一覧</h2>

    <?php
        $view="";
    if ($status==false) {
        sql_error($status);
    }else{
        while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
             //GETデータ送信リンク作成
            //  whileは繰り返し
            // pタグで囲み
            // 中をaで囲む
            // 詳細ページリンク
            $view .= '<p>';
            $view .= '<a href="detail.php?id=' . $result['id'] . '">';
            $view .= $result["title"] . "：" . $result["author"]. ":" . ":" . $result["URL"]. "：" .$result["comment"]. "：" .$result["date"];
            $view .= '</a>';
            // // 削除ページリンク
            // $view .= '<a href="delete.php?id=' . $result['id'] . '">';
            // $view .= '【削除】';
            // $view .= '</a>';
            // $view .= '</p>';
        }
    }

            // $query = "SELECT * FROM gs_bm_table";
            // $result = $pdo->query($query);
            // foreach ($result as $row) {
            //     echo "<tr>";
            //     echo "<td>".$row['id']."</td>";
            //     echo "<td>".$row['title']."</td>";
            //     echo "<td>".$row['author']."</td>";
            //     echo "<td>".$row['URL']."</td>";
            //     echo "<td>".$row['comment']."</td>";
            //     echo "<td>".$row['date']."</td>";
            //     echo '<td><a href="delete.php?id='.$result['id'].'">';
            //     ">削除</a></td>';
            //     echo '<td><a href="update.php">更新</a></td>';
            //     echo "</tr>";
            // }
            // // $pdo = null;
            
        ?>
    </tbody>
</table>
<div>
    <!-- ここで表示させる -->
     <div class="container jumbotron">
     <a href="detail.php"></a>
     <?= $view ?></div>
</div>
<!-- Main[End] -->
</body>
