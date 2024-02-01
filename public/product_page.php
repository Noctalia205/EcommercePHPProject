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
  
  <link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/ratings.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Notre Super site Ecommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <?php
                    if ($user === false) { ?>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="register.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="actions/logout.php">Log Out </a>
                        </li>
                    <?php } ?>
                </ul>
                <?php var_dump($_GET["id"]) ?>
                <form action="../src/class/user/cart.php?" method="GET">
                <input type="submit" name="submit" value=" <?php echo $_GET['id'] ?>" />
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <!-- 99+ -->
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
                </form>
                
               
            </div>
        </div>
    </nav>
    
   
  <div class="flex font-serif">
    <div class="flex-none w-52 relative">
      <img src="" alt="" class="absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
    </div>
    <form class="flex-auto p-6">

      <?php
      $id = $_GET['id'];
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

  <div class="container"></div>
  <span id="rateMe3"  class="rating-faces"></span>
  </div>
    
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

  <div class="card">
               
               <div class="row">
                   
                   <div class="col-2">
                       
                       
                       <img src="https://i.imgur.com/xELPaag.jpg" width="70" class="rounded-circle mt-2">
                   
                   
                   </div>
                   
                   <div class="col-10">
                       
                       <div class="comment-box ml-2">
                           
                           <h4>commentair</h4>
                           
                           <div class="rating"> 
                               <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                               <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                               <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                               <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                               <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                           </div>
                           
                           <div class="comment-area">
                               
                               <textarea class="form-control" placeholder="what is your view?" rows="4"></textarea>
                           
                           </div>
                           
                           <div class="comment-btns mt-2">
                               
                               <div class="row">
                                   
                                   <div class="col-6">
                                       
                                       <div class="pull-left">
                                       
                                       <button class="btn btn-success btn-sm">Cancel</button>      
                                           
                                       </div>
                                   
                                   </div>
                                   
                                   <div class="col-6">
                                       
                                       <div class="pull-right">
                                       
                                       <button class="btn btn-success send btn-sm">Send <i class="fa fa-long-arrow-right ml-1"></i></button>      
                                           
                                       </div>
                                   
                                   </div>
                               
                               </div>
                           
                           </div>
                       
                       
                       </div>
                   
                   </div>
               
               
               </div>
     
           </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

<!-- rating.js file -->

</html>