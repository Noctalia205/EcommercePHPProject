<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../src/init.php';?>
<?php require_once SITE_ROOT.'src/partials/head_css.php' ; ?>
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
  try {
    //////////////////////////////
    // GET ALL PRODUCTS FROM DB //
    //////////////////////////////
    $pdoStatement = $bdd->prepare("SELECT * FROM articles;"); 
    $pdoStatement->execute();
    $allProducts = $pdoStatement->fetchAll();
    //var_dump($allProducts);
} catch (PDOException $e) {
    $errMessage = $e->getMessage();
    echo $errMessage;
}
// while ($allProducts as $infos != 1) :
  //var_dump($allProducts[0]);

 ?>


    <div class="flex flex-wrap items-baseline">
      <h1 class="w-full flex-none mb-3 text-2xl leading-none text-slate-900">
        <?php echo $infos['title'] ?>
      </h1>
      <div class="flex-auto text-lg font-medium text-slate-500">
      <?php echo $infos['price'] ?>
      </div>
      <div class="text-xs leading-6 font-medium uppercase text-slate-500">
      <?php echo $infos['stock'] ?>
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
      <p>A well-known quote, contained in a blockquote element.</p>
      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>
  </div>
</div>
    </div>



</body>
</html>