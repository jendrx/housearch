<?php
    /**
     * Created by PhpStorm.
     * User: rom
     * Date: 6/30/17
     * Time: 10:23 AM
     */?>

<div class="top-bar">
    <div class="wrap">
        <div class="top-bar-left">
            <h3> HouSearch </h3>
            <!--<h3> <?= $this->fetch('title') ?> </h3>-->
        </div>
        <div class="top-bar-right">
            <ul class="menu menu-hover-lines">
                <li><?= $this->Html->link(__('Home'), ['controller' => 'Buyers', 'action' => 'home'])?></li>
                <li><?= $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index'])?></li>
                <li><?= $this->Html->link(__('Explore'), ['controller' => 'Buyers', 'action' => 'explore'])?></li>
                <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'Logout'])?></li>
            </ul>
        </div>
    </div>
</div>

