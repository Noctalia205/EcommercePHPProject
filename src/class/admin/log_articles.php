<?php 
require_once '../../init.php';

//////////////////////////////
// GET ALL PRODUCTS FROM DB //
$productsPdoStatement = $bdd->prepare("SELECT * FROM articles;");
$productsPdoStatement->execute();
$allProducts = $productsPdoStatement->fetchAll();

////////////////////////////
// GET ALL ORDERS FROM DB //
$sort = 'purchase_date';
if (isset($_GET)) {
    $sort = 'last_modified';
}
$pdoStatement = $bdd->prepare("SELECT orders.id, first_name, last_name, orders.total_price, address, purchase_date, `status`, last_modified
                                FROM users
                                INNER JOIN orders ON users.id = orders.customer_id ORDER BY $sort ;");
$pdoStatement->execute();
$allOrders = $pdoStatement->fetchAll();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> ADMIN • Home </title>
    <?php require_once SITE_ROOT.'src/partials/head_css.php' ; ?>
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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <H1> ADMIN </H1>

    <main id="products-table">
        <H1> Liste des articles </H1>
		<table>
			<thead>
				<tr>
                    <th> ID </th>
					<th> Titre </th>
					<th> Prix </th>
					<th> Stock </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($allProducts as $infos) : ?>
					<tr id='<?= $infos['id'] ?>'>
                        <td><?php echo $infos['id'] ?></td>
						<td><?php echo $infos['title'] ?></td>
						<td><?php echo $infos['price'] ?></td>
						<td><?php echo $infos['stock'] ?></td>
                        <form>
                            <td> <a href='update_articles.php?a=<?=$infos['id']?>'> modifier </a> </td>
                            <td> <a href='../../../public/actions/delete.php?a=<?=$infos['id']?>'> supprimer </a> </td>
                        </form>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
        <a href='add_articles.php'> add article </a>
	</main>
    

    <main id="orders-table">
        <H1> Liste des commandes </H1>
		<table>
			<thead>
				<tr>
                    <th> N° de commande </th>
					<th> Nom </th>
                    <th> Prénom </th>
					<th> Prix </th>
					<th> Adresse </th>
                    <th> Date </th>
                    <th> Statut </th>
                    <th> Dernière modification </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($allOrders as $infos) : ?>
					<tr?>
                        <td><?php echo $infos[0] ?></td>
						<td><?php echo $infos[1] ?></td>
						<td><?php echo $infos[2] ?></td>
                        <td><?php echo $infos[3] ?></td>
                        <td><?php echo $infos[4] ?></td>
                        <td><?php echo $infos[5] ?></td>
                        <td><?php echo $infos[6] ?></td>
                        <td><?php echo $infos[7] ?></td>
                        <form>
                            <td> <a href='update_orders.php?a=<?=$infos[0]?>'> modifier </a> </td>
                        </form>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
        <form method='get'>
            <input type='submit' value='trier par date de modification'>
        </form>
	</main>


</body>
</html>