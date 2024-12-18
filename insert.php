<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
try {
  // DB接続
  $pdo = new PDO('mysql:dbname=gs_gs_table;charset=utf8;host=localhost', 'root', '');
  echo "DB接続成功<br>"; // DB接続確認用
} catch (PDOException $e) {
  echo 'DBConnectError: ' . $e->getMessage();
  exit;
}

// デバッグ: POSTデータ確認
echo "<pre>";
print_r($_POST); // POSTデータを確認
echo "</pre>";

if (empty($_POST['date']) || empty($_POST['mileage']) || empty($_POST['refueling']) || empty($_POST['price'])) {
  echo "必要なデータが不足しています。<br>";
  exit;
}

// SQL文を準備
$stmt = $pdo->prepare("INSERT INTO 
                        gs_gs_table(id, date, mileage, refueling, price, content) 
                        VALUES(NULL, :date, :mileage, :refueling, :price, :content)");

if (!$stmt) {
  echo "SQL準備エラー: ";
  print_r($pdo->errorInfo());
  exit;
}

// バインド変数を設定
$stmt->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
$stmt->bindValue(':mileage', $_POST['mileage'], PDO::PARAM_INT);
$stmt->bindValue(':refueling', $_POST['refueling'], PDO::PARAM_INT);
$stmt->bindValue(':price', $_POST['price'], PDO::PARAM_INT);
$stmt->bindValue(':content', $_POST['content'], PDO::PARAM_STR);

echo "SQL準備完了<br>";

// SQL実行
$status = $stmt->execute();

if ($status === false) {
  $error = $stmt->errorInfo();
  echo "SQL実行エラー:<br>";
  echo "SQLSTATEエラーコード: " . $error[0] . "<br>";
  echo "ドライバーエラーコード: " . $error[1] . "<br>";
  echo "エラーメッセージ: " . $error[2] . "<br>";
  exit;
}

if ($status === false) {
  $error = $stmt->errorInfo();
  echo "SQL実行エラー: ";
  print_r($error);
  exit;
} else {
  echo "データ挿入成功<br>";
  header('Location: index.php');
  exit;
}
?>