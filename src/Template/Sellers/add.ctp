<?php
    /**
     * Created by PhpStorm.
     * User: rom
     * Date: 6/14/17
     * Time: 11:58 AM
     */?>

<div class="row info_content">
    <h4> Seller Information</h4>
    <div class="large-12 columns">
        <?= $this->Form->create($seller) ?>

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
            <div class="large-6 columns">
                <?= $this->Form->control('user.password', ['placeholder' => 'Password', 'label' => 'Password']) ?>
                <?php if ($this->Form->isFieldError('user.password')): ?>
                    <small class="error"><?= $this->Form->error('user.password') ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->control('user.repass', ['placeholder' => 'Password', 'label' => 'Confirm Password', 'type' => 'password']) ?>
                <?php if ($this->Form->isFieldError('user.repass')): ?>
                    <small class="error"><?= $this->Form->error('user.repass') ?></small>
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

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->input('ami', ['placeholder' => 'AMI', 'label' => 'AMI']) ?>
                <?php if ($this->Form->isFieldError('ami')): ?>
                    <small class="error"><?= $this->Form->error('ami') ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <label> NIF
                    <?= $this->Form->text('nif', ['placeholder' => 'NIF']) ?>
                </label>
                <?php if ($this->Form->isFieldError('nif')): ?>
                    <small class="error"><?= $this->Form->error('nif') ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <div class="row collapse">
                    <label> URL </label>
                    <div class="small-3 large-2 columns">
                        <span class="prefix">http://</span>
                    </div>
                    <div class=" large-10 columns">
                        <?= $this->Form->text('url', ['placeholder' => 'URL']) ?>

                        <?php if ($this->Form->isFieldError('url')): ?>
                            <small class="error"><?= $this->Form->error('url') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->control('addresses.0.id',['placeholder' => 'Address'])?>
            </div>
        </div>


        <div class="row">
            <div class="large-6 columns">
                <label> Address
                    <?= $this->Form->text('addresses.0.address', ['placeholder' => 'Address']) ?>
                </label>
            </div>
        </div>


        <div class="row">
            <div class="large-6 columns">
                <label> Postal Code
                    <?= $this->Form->text('addresses.0.postal_code', ['placeholder' => 'Postal Code', 'value' => '****-***']) ?>
                </label>
            </div>
        </div>


        <div class="row">
            <div class="large-6 columns">
                <label> Phone Number
                    <?= $this->Form->text('addresses.0.phone', ['placeholder' => 'Phone']) ?>
                </label>
            </div>
        </div>

        <?= $this->Form->Button(__('Submit'), ['class' => 'button']) ?>
        <?= $this->Form->end() ?>
    </div>

</div>


