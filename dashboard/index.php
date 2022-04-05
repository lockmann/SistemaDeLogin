<?php 
session_start();

if(isset($_POST['sair'])){
	session_destroy();
	unset($_SESSION['nome']);
	unset($_SESSION['login']);
};

if (!isset($_SESSION['nome'])) {
	header("location: ../");
}


?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sistema de Login, desenvolvido em Bootstrap e PHP">
  <meta name="author" content="Henrique Lockmann">
  <title>Dashboard</title>
  <link href="../hl_assets/css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body>
	<div class="container-fluid bg-light shadow p-1">
		<div class="container d-flex justify-content-between align-items-center">
			<small class="text-primary">Bem-vindo, <?php echo $_SESSION['nome'] ?></small>
			<form method="POST">
				<button class="btn btn-primary" name="sair" type="submit">Sair</button>
			</form>
			
		</div>
	</div>
	<div class="container mt-4">
		<h4>Dashboard</h4>
		<p><a href="logs.php" target="_blank">Histórico de login</a></p>
	</div>
	
</body>
</html>

