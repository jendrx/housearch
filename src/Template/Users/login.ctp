<?php
    /**
     * Created by PhpStorm.
     * User: rom
     * Date: 6/17/17
     * Time: 2:58 PM
     */?>


<div class="row info_content">
    <div class="large-12 columns">
        <h4> Login </h4>
        <div class="row">
            <div class="col-md-12">
                <?= $this->Html->link(__('Register'),['action' => 'roleChooser'])?>
            </div>

        </div>
        <?= $this->Form->create() ?>
        <div class="row">
            <div class="large-12 columns">
                <div class="row">
                    <div class="large-6 columns">
                        <?= $this->Form->control('email',['placeholder' => 'email'])?>
                    </div>
                </div>

                <div class="row">
                    <div class="large-6 columns">
                         <?= $this->Form->control('password')?>
                     </div>
                </div>
                <div class="row">
                    <div class="large-6 columns">
                        <?= $this->Form->Button(__('Login'),['class' => 'button']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
