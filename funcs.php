<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。
function db_conn(){
    try {
        $db_name = "book_mark";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "localhost"; //DBホスト
        $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt) 
{
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}


//リダイレクト関数: redirect($file_name)
// file.nameにファイル名を記述するとそのファイルへ飛ぶ？
function redirect($file_name)
{
header("Location:".$file_name);
exit();
}

// ログインチェック
// セッションidを持った人であれば、閲覧ができる
// 持っていなければ、閲覧できない処理にする

// ！は打ち消し。条件、chk_ssidを持っていなければ
// もしくはいまサーバーが保持しているセッションidとログイン認証したときののセッションidが異なっていないか

function sessionCheck(){
    if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid']!=session_id()){
        // ログインに以上がある人は強制退出
        exit('LOGIN Eroor');
    }else{
        // ログインが出来た人に新しく、session_idを付与する
        session_regenerate_id(true);
        $_SESSION['chk_ssid']==session_id();
    }
}
