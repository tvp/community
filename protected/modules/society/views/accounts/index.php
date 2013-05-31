<?php
$this->breadcrumbs=array(
	'Сообщество'
);
?>

<h1>Сообщество</h1>

<?php foreach ($model as $user): ?>
    <div class="span-1">
        <img src="<?php echo $user['photo'] ?>" width="200">
        <h4><?php echo $user['first_name'] ?> <?php echo $user['last_name'] ?></h4>
        <p><?php echo $user['email'] ?></p>
        <p><?php echo $user['phone'] ?></p>
    </div>
<?php endforeach; ?>