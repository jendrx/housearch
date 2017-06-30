<?php
    /**
     * Created by PhpStorm.
     * User: rom
     * Date: 6/30/17
     * Time: 11:37 AM
     */?>

<div class="top-bar">
    <div class="wrap">
        <div class="top-bar-left">
            <h3> HouSearch </h3>
            <!--<h3> <?= $this->fetch('title') ?> </h3>-->
        </div>
        <div class="top-bar-right">
            <ul class="menu menu-hover-lines">
                <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'Logout'])?></li>
            </ul>
        </div>
    </div>
</div>

