<?php require_once __DIR__ . '/../src/db.php';
require_once __DIR__ . '/../src/init.php';

//$_SESSION['cart_contents'] = [];

$id_article = $_GET['id'];
$pdoStatement = $bdd->prepare("SELECT * FROM articles WHERE `id` = $id_article;");
$pdoStatement->execute();
$article_info = $pdoStatement->fetch();

if (!in_array($article_info,$_SESSION['cart_contents'])) {
    array_push($_SESSION['cart_contents'],$article_info);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
            </div>
        </div>
    </nav>



	<main id="table">
		<table>
			<thead>
				<tr>
					<th> Title </th>
					<th> Price </th>
					<th> Quantity </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($_SESSION['cart_contents'] as $infos) : ?>
					<tr>
						<td><?php echo $infos[1] ?></td>
						<td><?php echo $infos[3] ?></td>
						<td> <form method='post' action='../src/class/user/orders.php'> 
                                <input type="number" name = '<?=$infos[0]?>' min = '1' max='10'>
                        </td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
        <input type='submit' value='order!'>
        </form>
	</main>


</body>

</html>