<?php
$this->breadcrumbs=array(
	'Сообщество'
);
?>

<h1>Сообщество</h1>

<?php foreach ($model as $user): ?>
    <div class="span-1" style="height: 300px; overflow: hidden;">
        <div style="height: 200px;overflow: hidden">
            <img src="<?php echo $user['photo'] ?>" width="200">
        </div>
        <h4><?php echo $user['first_name'] ?> <?php echo $user['last_name'] ?></h4>
        <p><?php echo $user['email'] ?></p>
        <p><?php echo $user['phone'] ?></p>
    </div>
<?php endforeach; ?>