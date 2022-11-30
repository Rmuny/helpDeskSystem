<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'HelpDesk';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta(
        'logo.png',
        '/img/logo.png',
        ['type' => 'icon']
    );
    ?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css('all.css?v=5.15.4') ?>
    <?= $this->Html->css('styles.css?v=5.1.3') ?>
    <?= $this->Html->css('jquery-ui.css?v=1.13.0') ?>
    <?= $this->Html->css(['milligram.min','style'])?>

    <?= $this->Html->script('all.min.js') ?>
    <?= $this->Html->script('scripts.js') ?>
    <?= $this->Html->script('bootstrap.bundle.min.js?v=5.0.2') ?>
    <?= $this->Html->script('jquery-3.3.1.min.js?v=3.3.1') ?>
    <?= $this->Html->script('jquery-ui.js?v=1.13.0') ?>
    <?= $this->Html->script('Chart.min.js?v=2.8.0') ?>

    <?= $this->Html->script('bootstrapModal.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>

<div class="sb-nav-fixed">
    <?= $this->element('header/navbar'); ?>
    <div id="layoutSidenav">
        <?= $this->element('header/sidebar'); ?>
        <div id="layoutSidenav_content">
            <main class="m-3">
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </main>
        </div>
    </div>
</div>
<footer>
</footer>

<?= $this->fetch('script') ?>
</body>
</html>





