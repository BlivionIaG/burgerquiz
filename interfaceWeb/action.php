<?php
define('ENVIRONMENT', 't');
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="author" content="Kévin Le Torc'h" />
        <title>Burger Quiz</title>


        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
    </head>
    <body>
        <?php require_once("includes/nav.template.php"); ?>
        <div class="main-content">
            <?php
            require_once('php/InterfaceBDD.php');
            
            $db = new InterfaceBDD();
            
            ?>
        </div>
        <?php require_once("includes/footer.template.php"); ?>
    </body>
</html>
