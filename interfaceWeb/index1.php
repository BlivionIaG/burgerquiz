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
                            <form id="connect" action="action.php" method="GET">
                                <input type="hidden" name="action" value="connect">
                                <input name="mail" type="mail">
                                <input name="password" type="password">
                                <input type="submit" id="log">
                            </form>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid" style="margin-top:100px;">
            <div class="row">

                <div class="col-sm-6 h-100">

                    <img src="img/burger.png" style="height:500px">
                </div>
                <div class="col-sm-6 h-100">
                    <form id="insciption" action="action.php" method="GET">                    
                        <input type="hidden" name="action" value="register">
                        <input name="prenom" type="text" placeholder="prenom" style="width:39.5%">
                        <input name="nom" type="text" placeholder="nom" style="width:39.5%">
                        <input name="mail" type="mail" placeholder="monemail@mail.com" style="width:80%">
                        <input name="pass1" type="password" placeholder="password" style="width:80%">
                        <input name="pass2" type="password" placeholder="password" style="width:80%">
                        <input type="submit" style="width:80%">
                    </form>
                </div>
            </div>
        </div>

        <?php require_once("includes/footer.template.php"); ?>
    </body>
</html>
