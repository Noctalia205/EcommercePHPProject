<?php 
require_once '../../init.php';

try {
    ////////////////////////////
    // GET ALL ORDERS FROM DB //
    ////////////////////////////
    $pdoStatement = $bdd->prepare("SELECT orders.id, first_name, last_name, orders.total_price, address, `status`
                                    FROM users
                                    INNER JOIN orders ON users.id = orders.customer_id;");
    $pdoStatement->execute();
    $allOrders = $pdoStatement->fetchAll();
    //var_dump($allProducts);
} catch (PDOException $e) {
    $errMessage = $e->getMessage();
    echo $errMessage;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> ADMIN • Commandes </title>
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
                    <form action="../src/class/user/cart.php" method="GET">
                    <input type="submit" value="Cart" />
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <!-- 99+ -->
                        <span class="visually-hidden">unread messages</span>
                    </span>
                    </button>
                    </form>
                    
                
                </div>
            </div>
    </nav>

    <H1> Liste des commandes </H1>

    <main id="products-table">
		<table>
			<thead>
				<tr>
                    <th> N° de commande </th>
					<th> Nom </th>
                    <th> Prénom </th>
					<th> Prix </th>
					<th> Adresse </th>
                    <th> Statut </th>

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
                        <form>
                            <td> <a href='update_orders.php?a=<?=$infos[0]?>'> modifier </a> </td>
                        </form>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</main>


</body>
</html>