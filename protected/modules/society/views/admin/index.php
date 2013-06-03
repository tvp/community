<?php
$this->breadcrumbs=array(
    t('Administration')
);
?>

<h1><?php echo t('Administration') ?></h1>
<div>
    <div class="span3">
        <ul class="nav nav-list">
            <li class="nav-header">Human Resources</li>
            <li class="active"><a href="#"><i class="icon-home"></i> Requests</a></li>
            <li><a href="#"><i class="icon-book"></i> Skills</a></li>
        </ul>
    </div>
    <div class="span8">
        <div class="btn-toolbar">
            <div class="btn-group">
                <a class="btn" href="#">Active</a>
                <a class="btn" href="#">Pending</a>
                <a class="btn" href="#">Blocked</a>
            </div>
        </div>

        <div>
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
        </div>
    </div>
</div>