<?php
    /**
     * Created by PhpStorm.
     * User: rom
     * Date: 6/13/17
     * Time: 3:42 PM
     */?>


<div class="row info_content">
    <h4> User Information </h4>
    <div class="large-12 columns">
        <?= $this->Form->create($user) ?>
        <div class="row">
            <div class="large-6 columns">
                <label> First Name
                    <?= $this->Form->control('fname', ['label' => false, 'placeholder' => 'First Name', 'type' => 'text']) ?>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <label> Last Name
                    <?= $this->Form->control('lname', ['label' => false, 'placeholder' => 'Last Name', 'type' => 'text']) ?>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <label> Email
                    <?= $this->Form->email('email', ['type' => 'email']) ?>
                    <?php if ($this->Form->isFieldError('email')): ?>
                        <small class="error"><?= $this->Form->error('email') ?></small>
                    <?php endif; ?>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <fieldset class="fieldset">
                    <legend> Choose user's type</legend>
                    <?= $this->Form->radio('role_id', $roles) ?>
                </fieldset>
                <?php if ($this->Form->isFieldError('role_id')): ?>
                    <small class="error"><?= $this->Form->error('role_id') ?></small>
                <?php endif; ?>
            </div>
        </div>


        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->control('password', ['type' => 'password', 'label' => 'password']) ?>
                <?php if ($this->Form->isFieldError('password')): ?>
                    <small class="error"><?= $this->Form->error('password') ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->control('repass', ['type' => 'password', 'label' => 'password']) ?>
                <?php if ($this->Form->isFieldError('password')): ?>
                    <small class="error"><?= $this->Form->error('password') ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="text-left">
                <?= $this->Form->Button(__('Submit'),['class' => 'button']) ?>
                </div>
        <?= $this->Form->end() ?>
    </div>
</div>
