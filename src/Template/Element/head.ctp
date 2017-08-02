<?php
/**
 * Created by PhpStorm.
 * User: rom
 * Date: 6/7/17
 * Time: 5:09 PM
 */?>

<title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
</title>

<?= $this->Html->meta('icon') ?>


<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css')?>

<!-- modified -->
<?= $this->Html->css('//cdn.jsdelivr.net/foundation/6.0.6/foundation.min.css')?>
<?= $this->Html->css('jquery-ui-1.12.1/jquery-ui.min.css')?>
<!--<?= $this->Html->css('jquery-ui-1.12.1/jquery-ui.theme.min.css')?>-->
<!--<?= $this->Html->css('font-awesome.min.css')?>-->
<?= $this->Html->css('//api.mapbox.com/mapbox-gl-js/v0.38.0/mapbox-gl.css')?>

<?= $this->Html->css('app.css') ?>





<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

