<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="<?= getAsset('css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= getAsset('css/fontawesome.min.css') ?>">

        <title>BD - Projeto 3</title>
    </head>
    <body>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php if(defined('PAGE_BACK')): ?>
                        <a href="<?= PAGE_BACK ?>">Voltar atrás</a>
                    <?php endif; ?>

                    <?php if(defined('PAGE_TITLE')): ?>
                        <h1><?= PAGE_TITLE ?></h1>
                    <?php endif; ?>
                    
                    <?php if(defined('PAGE_SUBTITLE')): ?>
                        <h3><small class="text-muted"><?= PAGE_SUBTITLE ?></small></h3>
                        <hr>
                    <?php endif; ?>
                    
                    <?php if(isset($_SESSION['message-content'])): ?>
                        <div class="alert alert-<?= $_SESSION['message-type'] ?>" role="alert"><?= $_SESSION['message-content'] ?></div>
                    <?php  unset($_SESSION['message-content']); unset($_SESSION['message-type']); endif; ?>