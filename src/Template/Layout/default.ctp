<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php echo $this->element('head'); ?>
    <?= $this->Html->script('//code.jquery.com/jquery-2.1.3.min.js') ?>
    <?= $this->Html->script('jquery-ui-1.12.1/jquery-ui.min.js') ?>
    <?= $this->Html->script('//cdn.jsdelivr.net/foundation/6.0.6/foundation.min.js') ?>
    <?= $this->Html->script('//api.mapbox.com/mapbox-gl-js/v0.38.0/mapbox-gl.js')?>


    <!--<?= $this->Html->script('vendor/app.js') ?>-->



</head>
<body>

<div id="wrap">
    <header>

        <?php if ($authUser == null):
            echo $this->element('Headers/header');
            else:
                if($authUser['role_id'] == 2):
                    echo $this->element('Headers/sellersHeader');
                elseif ($authUser['role_id'] == 3):
                    echo $this->element('Headers/buyersHeader');
                else:
                    echo $this->element('Headers/othersHeader');
                endif;
        endif;
            ?>
    </header>


    <?= $this->Flash->render() ?>
    <section class="main">
        <div>
            <div class="wrap">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </section>


</div>
<footer>
    <div class="wrap ">
        <div class="col-lg-3"></div>
    </div>
</footer>


<script>
    $(document).foundation();

</script>
</body>
</html>

