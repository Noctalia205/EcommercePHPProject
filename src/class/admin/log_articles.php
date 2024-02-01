<?php 
require_once '../../init.php';

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> ADMIN • Articles </title>
    <?php require_once SITE_ROOT.'src/partials/head_css.php' ; ?>
</head>

<body>
    <H1> ADMIN </H1>

    <main id="products-table">
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
	</main>

    <a href='add_articles.php'> add article </a>

</body>
</html>