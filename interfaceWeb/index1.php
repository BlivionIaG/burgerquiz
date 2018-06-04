<?php
define('ENVIRONMENT', 't');
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">BURGER QUIZ</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <form id="connect">
			<input type="mail">
			<input type="password">
			<input type="submit" id="log">
			</form>
        </li>
      </ul>
    </div>
  </nav>
  </div>
  <div class="container-fluid">
  <div class="row">
  
		<div class="col-sm-6 h-100">
		test
        </div>
		<div class="col-sm-6 h-100">
		etst	
        </div>
  </div>
  <div>
  
  <?php require_once("includes/footer.template.php"); ?>
</body>
</html>
