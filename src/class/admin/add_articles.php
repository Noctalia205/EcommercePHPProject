<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../..//init.php'; ?>
<?php require_once SITE_ROOT . 'src/partials/head_css.php'; 
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <h1> Add product </h2>
    <form method='post' action='../../../public/actions/add.php'>
        <input type="text" id="title" name="title" placeholder='Titre'>
        <input type="text" id="price" name="price" placeholder='Prix'>
        <input type="text" id="stock" name="stock" placeholder='Stock'>
        <input type="text" id="description" name="description" placeholder='Description'>
        <input type="submit" id="submit" name="submit" value='submit'>
    </form>

</body>
</html>