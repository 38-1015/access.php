<?php

// (1) 更新するデータ
$user_name = '鬼原';
$user_mail = '13@gmail.com';
$inquiry = 'UPDATEです';


// (2) データベースに接続
require_once('db.php');
try {
   $pdo = new PDO($dsn, $user, $password);
   // $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "データベース{$dbName}に接続しました。";
   //$pdo = NULL;
} catch (Exception $e) {
   echo "<span class='error'>エラーがありました。</span><br>";
   echo $e->getMessage();
   exit();
}
// (3) SQL作成
$stmt = $pdo->prepare("UPDAET  contact SET user_name =
	:user_name, user_mail =  : user_mail WHERE inquiry = :inquiry");



// (4) 登録するデータをセット
$stmt->bindParam( ':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindParam( ':user_mail', $user_mail, PDO::PARAM_STR);
$stmt->bindParam( ':inquiry', $inquiry, PDO::PARAM_STR);


// (5) SQL実行
$res = $stmt->execute();


// (6) データベースの接続解除
$pdo = null;
