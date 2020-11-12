<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $idFormation = isset($_POST['idFormation']) ? $_POST['idFormation'] : NULL;
        $nomFormation = isset($_POST['nomFormation']) ? $_POST['nomFormation'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $environnementF = isset($_POST['environnementF']) ? $_POST['environnementF'] : '';
        // Update the record
        $stmt = $pdo->prepare('UPDATE formation SET nomFormation = ?, description = ?, environnementF = ? WHERE idFormation = ?');
        $stmt->execute([ $nomFormation, $description, $environnementF, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM formation WHERE idFormation = ?');
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
	<h2>Update Contact #<?=$contact['idFormation']?></h2>
    <form action="update.php?id=<?=$contact['idFormation']?>" method="post">
        <label for="id">ID</label>
        <label for="name">Name</label>
        <input type="text" name="idFormation" placeholder="1" value="<?=$contact['idFormation']?>" id="id">
        <input type="text" name="nomFormation" placeholder="John Doe" value="<?=$contact['nomFormation']?>" id="name">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="description" placeholder="johndoe@example.com" value="<?=$contact['description']?>" id="description">
        <input type="text" name="environnementF" placeholder="2025550143" value="<?=$contact['environnementF']?>" id="phone">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>