<?php
if (!defined('ENVIRONMENT')) {
    exit();
} // On empêche l'accès direct en HTTP
?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">BURGER QUIZ</a>
    <div class="navbar-collapse">
        <ul class="navbar-nav mr-auto">
        </ul>
        <a class="nav-link" href="../action.php?action=disconnect" id="disconnectButton">
            <i class="fa fa-fw fa-sign-out"></i>
            Se déconnecter
        </a>
    </div>
</nav>

<div id="errors"></div>
