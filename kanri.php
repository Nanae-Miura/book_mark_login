<?php
// ユーザーの管理画面
// 管理ユーザーができること
// 登録されたユーザーの情報を見ることができる
// セッションスタート
session_start();

include('funcs.php');
// ログインチェック処理を行う
sessionCheck();