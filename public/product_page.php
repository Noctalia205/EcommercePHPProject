<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../src/init.php'; ?>
<?php require_once SITE_ROOT . 'src/partials/head_css.php'; ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>



  <div class="flex font-serif">
    <div class="flex-none w-52 relative">
      <img src="" alt="" class="absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
    </div>
    <form class="flex-auto p-6">

      <?php
      $id = $_GET['id'];
      //var_dump($_GET['id']);
      $pdoStatement = $bdd->prepare("SELECT * FROM articles WHERE id='$id';");
      $pdoStatement->execute();
      $infos = $pdoStatement->fetch();
      //var_dump($selectedProduct);
      ?>


      <div class="flex flex-wrap items-baseline">
        <h1 class="w-full flex-none mb-3 text-2xl leading-none text-slate-900">
          <?php echo $infos['title'] ?>
          <div class="card" style="width: 25rem;">
            <img src="<?= '../' . $infos['photo_path'] ?>" class="card-img-top" alt="..." style=>
          </div>
        </h1>
        <div class="flex-auto text-lg font-medium text-slate-500">
          <H3><?php echo $infos['price'] ?> €</H3>
        </div>
        <div class="text-xs leading-6 font-medium uppercase text-slate-500">
          <h4><?php echo $infos['stock'] ?> En Stock</h4>
        </div>
      </div>
      <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-slate-200">
        <div class="space-x-1 flex text-sm font-medium">
        </div>
      </div>
      <div class="flex space-x-4 mb-5 text-sm font-medium">
        <div class="flex-auto flex space-x-4 pr-4">
          <button class="flex-none w-1/2 h-12 uppercase font-medium tracking-wider border border-slate-200 text-slate-900" type="button">
            Add to cart
          </button>
        </div>
        </button>
      </div>
    </form>
  </div>







  <!--
/////////////////
///Description///
////////////////
-->

  <div>

    <div class="card">
      <div class="card-header">
        <h>Description</h>
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p> <?= $infos['description'] ?></p>
          <footer class="blockquote-footer">Someone famous in <cite title="Source Title">The Coding Factory</cite></footer>
        </blockquote>
      </div>
    </div>
  </div>



</body>

</html>