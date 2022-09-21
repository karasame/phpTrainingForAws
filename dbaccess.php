<?php
	$dsn = 'mysql:dbname=tang_training_db;host=database-tang-training.crqmemsomjjy.ap-northeast-1.rds.amazonaws.com;prot=3306';
	$username ='karasame';
	$password ='Tumen0105?';


	function console_log($data){
	  echo '<script>';
	  echo 'console.log('.json_encode($data).')';
	  echo '</script>';
	}

	try{
		$pdo = new PDO($dsn,$username,$password);
		$sql = "select created_at, info from site_view_history order by created_at desc limit 1";
		$stmt = $pdo->prepare($sql);
		$stmt -> execute();
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$sqlins ="insert into site_view_history (info) values ('insert test from".exec(hostname). "')";
		$stmtins = $pdo->prepare($sqlins);
		$stmtins -> execute();

		console_log($rec);

	} catch (PDOException $e) {
		echo '接続失敗：'.$e->getMessage();
	}

	function escape1($str) {
		return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
	}		
	?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>test page for database access</title>
	</head>
	<body>
		Last Access Time<br><br>
		<?php foreach($rec as $a) :?>	
	 		<?=escape1($a)?><br> 
		<?php endforeach; ?>
	</body>
</html>
