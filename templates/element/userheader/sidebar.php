<?php
/**
 * @var \App\View\AppView $this
 * @var $permissions
 * @var $login
 * @var  \App\Model\Entity\Solution $categories
 *
 */
$status = $this->getRequest()->getQuery('status');
$date = $this->getRequest()->getQuery('date');
$ctrl = $this->getRequest()->getParam('controller');
$action = [];
if (isset($permissions))
{
//    foreach ($permissions->acos as $permission) {
//        $action[] = $permission['alias'];
//    }
}
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php
                    echo $this->Html->link('<span class="fas fa-user m-2"></span><span class="ml-2 text-white-50"> ' . __('User') . '</span>',
                        ['controller' => 'faqs', 'action' => 'general', 'plugin' => false, 'prefix' => false],
                        ['escape' => false, 'class' => 'nav-link']
                    );
                    echo $this->Html->link('<span class="fas fa-question-circle m-2"></span><span class="ml-2 text-white-50"> ' . __('FAQ') . '</span>',
                        ['controller' => 'faqs', 'action' => 'general', 'plugin' => false, 'prefix' => false],
                        ['escape' => false, 'class' => 'nav-link']
                    );
                    ?>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                        <div class="sb-nav-link-icon"><i class="fas fa-envelope m-2"></i></div>
                        <?= __('Tickets') ?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <!-- Order -->
                            <?php

                            echo $this->Html->link('<span class="fas fa-check m-2"></span><span class="ml-2 text-white-50"> ' . __('Submit ticket') . '</span>',
                                ['controller' => 'faqs', 'action' => 'ticketForm', 'plugin' => false, 'prefix' => false],
                                ['escape' => false, 'class' => 'nav-link']
                            );
                            echo $this->Html->link('<span class="fas fa-book m-2"></span><span class="ml-2 text-white-50"> ' . __('List tickets') . '</span>',
                                ['controller' => 'faqs', 'action' => 'submitedTicket', 'plugin' => false, 'prefix' => false],
                                ['escape' => false, 'class' => 'nav-link']
                            );

                            ?>

                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </div>
