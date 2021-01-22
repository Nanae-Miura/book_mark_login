<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    h1 {
    /* color: white; */
    background: #c2edff;/*背景色*/
    padding: 0.5em;/*文字まわり（上下左右）の余白*/
  }
  h3{
    /* color: white; */
    background: #c2edff;/*背景色*/
    padding: 0.5em;/*文字まわり（上下左右）の余白*/
  }
 
    </style>
    <title>ログイン画面</title>
</head>
<body>

<h1>Make your own library!</h1>
     <h3>Please log in.</h3>

     <form name="form1" action="login_act.php" method="post">
     <p>ログイン</p>
        ID:<input type="text" name="lid" />
        PW:<input type="password" name="lpw" />
        <input type="submit" value="LOGIN" />
    </form>

</body>
</html>
