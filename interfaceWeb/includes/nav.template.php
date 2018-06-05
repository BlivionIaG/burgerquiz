<?php
if(!defined('ENVIRONMENT')) { exit(); } // On empêche l'accès direct en HTTP




?>
  <nav class="navbar navbar-expand-lg bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">BURGER QUIZ</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" href="../action.php?action=disconnect" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Se déconnecter</a>
        </li>
      </ul>
    </div>
  </nav>