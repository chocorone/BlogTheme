<!-- ブログ以外のヘッダー -->
<html>

<?php include('head.php'); ?>

<body>
  <div class="main-wrapper">
    <header>
      <?php include('hamburger-menu.php'); ?>
    </header>

    <main>
      <h1 class="page-title">
        <nobr id="title"><?php global $topName;
                          echo $topName ?></nobr>
        <nobr id="explore">を探索する</nobr>
      </h1>