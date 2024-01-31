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
    <title> ADMIN • Articles </title>
    <?php require_once SITE_ROOT.'src/partials/head_css.php' ; ?>
</head>

<body>
    <H1> ADMIN </H1>

    <main id="products-table">
		<table>
			<thead>
				<tr>
					<th> Titre </th>
					<th> Prix </th>
					<th> Stock </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($allProducts as $infos) : ?>
					<tr id='<?= $infos['id'] ?>'>
						<td><?php echo $infos['title'] ?></td>
						<td><?php echo $infos['price'] ?></td>
						<td><?php echo $infos['stock'] ?></td>
                        <form>
                            <td> <input type="submit" value="modifier"> </td>
                            <td> <input type="submit" value="supprimer">
                                <?php //$pdoStatement = $bdd->prepare("DELETE FROM articles WHERE id=:articleid");
                                //$pdoStatement->execute([':articleid' => $infos['id']]);?> </td>
                        </form>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</main>

</body>
</html>