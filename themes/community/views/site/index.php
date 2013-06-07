<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<section class="span6">
    <img alt="Community Online" src="/images/logo.jpg">
    <div class="language">
        <?php echo CHtml::link('<span class="ru">русский</span>', array('/', Yii::app()->urlManager->langParam=>'ru'), array(
        'class' => ((Yii::app()->language == 'ru') ? 'action' : ''),
    ));?>
        <?php echo CHtml::link('<span class="en">english</span>', array('/', Yii::app()->urlManager->langParam=>'en'), array(
        'class' => ((Yii::app()->language == 'en') ? 'action' : ''),
    ));?>
    </div>
</section>
<aside class="span4">
    <h3>The Venus Project Activism</h3>
    <p>Would you like to join us?</p>
    <p><a class="btn btn-large btn-primary" href="<?php echo $this->createUrl('/society/accounts/register') ?>">Join Us</a></p>

    <h3>Member's login</h3>
    <p><a class="btn" href="<?php echo $this->createUrl('/society/accounts/login') ?>">Login</a></p>

    <h3>Contact Us</h3>
    <p>Do you have a question or suggestion?</p>
    <p>Add your ideas to <a href="https://github.com/tvp/community/issues">our issue tracking system</a>.</p>

</aside>

<section class="span8">
    <h3>Social Networks</h3>

    <script type="text/javascript" src="//vk.com/js/api/openapi.js?95"></script>

    <!-- VK Widget -->
    <div id="vk_groups"></div>
    <script type="text/javascript">
        VK.Widgets.Group("vk_groups", {mode: 0, width: "220", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 30439448);
    </script>
</section>