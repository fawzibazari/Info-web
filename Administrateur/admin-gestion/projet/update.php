<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nomP = isset($_POST['nomP']) ? $_POST['nomP'] : '';
        $descriptionP = isset($_POST['descriptionP']) ? $_POST['descriptionP'] : '';
        $environnementP = isset($_POST['environnementP']) ? $_POST['environnementP'] : '';
        // Update the record
        $stmt = $pdo->prepare('UPDATE projet SET nomP = ?, descriptionP = ?, environnementP = ? WHERE id = ?');
        $stmt->execute([ $nomP, $descriptionP, $environnementP, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM projet WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="name">Name</label>
        <input type="text" name="id" placeholder="1" value="<?=$contact['id']?>" id="id">
        <input type="text" name="nomP" placeholder="John Doe" value="<?=$contact['nomP']?>" id="name">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="descriptionP" placeholder="johndoe@example.com" value="<?=$contact['descriptionP']?>" id="description">
        <input type="text" name="environnementP" placeholder="2025550143" value="<?=$contact['environnementP']?>" id="phone">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>