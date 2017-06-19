<?php
    /**
     * Created by PhpStorm.
     * User: rom
     * Date: 6/19/17
     * Time: 11:44 AM
     */?>


<div class="row info_content">
    <div class="large-12 columns">
        <?= $this->Form->create() ?>
        <div class="row">
            <div class="large-6 columns">

                <fieldset class="fieldset">
                    <legend> Choose Your Type </legend>
                    <?= $this->Form->radio('role_id',$roles, ['empty' => false, 'required' => true])?>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->Button(__('Submit'),['class' => 'button']) ?>
            </div>

        </div>

        <?= $this->Form->end() ?>
    </div>

</div>
