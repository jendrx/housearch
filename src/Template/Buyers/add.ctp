<?php
    /**
     * Created by PhpStorm.
     * User: rom
     * Date: 6/14/17
     * Time: 4:44 PM
     */?>

<div class="row info_content">
    <h4> Buyer Information</h4>
    <div class="large-12 columns">

        <?= $this->Form->create($buyer) ?>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->input('user.id') ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->input('user.email', ['placeholder' => 'email', 'label' => 'Email']) ?>
                <?php if ($this->Form->isFieldError('user.email')): ?>
                    <small class="error"><?= $this->Form->error('user.email') ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class = "large-6 columns">
                <?= $this->Form->control('user.password',['placeholder' => 'Password', 'label' => 'Password']) ?>
                <?php if($this->Form->isFieldError('user.password')): ?>
                    <small class="error" ><?= $this->Form->error('user.password')?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->control('user.repass',['placeholder' => 'Password', 'label' => 'Confirm Password', 'type' => 'password']) ?>
                <?php if($this->Form->isFieldError('user.repass')): ?>
                    <small class="error" ><?= $this->Form->error('user.repass')?></small>
                <?php endif; ?>

            </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->input('user.fname', ['placeholder' => 'First Name', 'label' => 'First Name', 'type' => 'text']) ?>
                <?php if ($this->Form->isFieldError('user.fname')): ?>
                    <small class="error"><?= $this->Form->error('user.fname') ?></small>
                <?php endif; ?>
            </div>
        </div>


        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->input('user.lname', ['placeholder' => 'Last Name', 'label' => 'Last Name', 'type' => 'text']) ?>
                <?php if ($this->Form->isFieldError('user.lname')): ?>
                    <small class="error"><?= $this->Form->error('user.lname') ?></small>
                <?php endif; ?>
            </div>
        </div>

        <!--<div class="row">
            <div class="large-6 columns">
                <?= $this->Form->input('user.role_id', ['value' => 2, 'hidden' => true, 'readonly' => true]) ?>
                <?php if ($this->Form->isFieldError('user.role_id')): ?>
                    <small class="error"><?= $this->Form->error('user.role_id') ?></small>
                <?php endif; ?>
            </div>
        </div>-->

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->input('birthdate',['label' => 'Birth Date',
                'templates' => ['dateWidget' => '{{day}}{{month}}{{year}}']]) ?>

            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->select('gender', $gender, ['label' => 'Gender']) ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->select('qualification_id', $qualifications, ['label' => 'School Level']) ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->select('job_id', $jobs, ['label' => 'Job']) ?>
            </div>
        </div>


        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->select('income_id', $incomes, ['label' => 'Income']) ?>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="large-12 columns">

    <?= $this->Form->Button(__('Submit'), ['class' => 'button'])?>
    <?= $this->Form->end() ?>
    </div>
    </div>

</div>


<script>

</script>