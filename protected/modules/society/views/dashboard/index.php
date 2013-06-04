<?php
$this->breadcrumbs=array(
    t('Dashboard')
);
?>

<h1><?php echo t('Dashboard') ?></h1>
<div>
    <div class="span4">
        <textarea>Status message</textarea>

        <select name="group" id="group">
            <option value="0">General</option>
            <option value="1">Design</option>
            <option value="2">Programming</option>
        </select>

        <div>
            <button class="btn btn-primary">Post</button>
        </div>
    </div>
    <div class="span2">
        <ul class="nav nav-list">
            <li class="nav-header">My Groups</li>
            <li class="active"><a href="#">All</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Programming</a></li>

            <li class="nav-header">Trends</li>
            <li><a href="#">General</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Programming</a></li>
        </ul>
    </div>
</div>