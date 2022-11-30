<?php

use Cake\Mailer\Mailer;

$mailer = new Mailer('templated');
$mailer->setViewVars(['value' => 12345]);
