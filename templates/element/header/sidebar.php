<?php
/**
 * @var \App\View\AppView $this
 * @var $permissions
 * @var $login
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

                    echo $this->Html->link('<span class="fas fa-table m-2"></span><span class="ml-2 text-white-50"> ' . __('Dashboard') . '</span>',
                        ['controller' => 'Tickets', 'action' => 'dashboard', 'plugin' => false, 'prefix' => false],
                        ['escape' => false, 'class' => 'nav-link']
                    );
                    ?>
                    <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseUsers" >
                        <span class="fas fa-assistive-listening-systems m-2"></span><span class="ml-2 text-white-50">
                            <?= __('Admin') ?>
                    </a>

                        <nav class="sb-sidenav-menu-nested nav">
                            <!-- Order -->
                            <?php
                            echo $this->Html->link('<span class="fas fa-user m-2"></span><span class="ml-2 text-white-50"> ' . __('Staffs') . '</span>',
                                ['controller' => 'Staffs', 'action' => 'index', 'plugin' => false, 'prefix' => false],
                                ['escape' => false, 'class' => 'nav-link']
                            );

                            echo $this->Html->link('<span class="fas fa-address-card m-2"></span><span class="ml-2 text-white-50"> ' . __('Categories') . '</span>',
                                ['controller' => 'Categories', 'action' => 'index', 'plugin' => false, 'prefix' => false],
                                ['escape' => false, 'class' => 'nav-link']
                            );

                            echo $this->Html->link('<span class="fas fa-star m-2"></span><span class="ml-2 text-white-50"> ' . __('Status') . '</span>',
                                ['controller' => 'Status', 'action' => 'index', 'plugin' => false, 'prefix' => false],
                                ['escape' => false, 'class' => 'nav-link']
                            );

                            echo $this->Html->link('<span  class="fas fa-bookmark m-2" aria-hidden="true"></span><span class="ml-2 text-white-50"> ' . __('Solutions') . '</span>',
                                ['controller' => 'Solutions', 'action' => 'index', 'plugin' => false, 'prefix' => false],
                                ['escape' => false, 'class' => 'nav-link']
                            );
                            echo $this->Html->link('<span class="fas fa-tasks m-2"></span><span class="ml-2 text-white-50"> ' . __('Roles') . '</span>',
                                ['controller' => 'Roles', 'action' => 'index', 'plugin' => false, 'prefix' => false],
                                ['escape' => false, 'class' => 'nav-link']
                            );

                            echo $this->Html->link('<span class="fa fa-question m-2" aria-hidden="true"></span><span class="ml-2 text-white-50"> ' . __('Tickets') . '</span>',
                                ['controller' => 'Tickets', 'action' => 'index', 'plugin' => false, 'prefix' => false],
                                ['escape' => false, 'class' => 'nav-link']
                            );

                            ?>
                        </nav>
                    </div>
                    <?php

                    echo $this->Html->link('<span class="fas fa-book m-2"></span><span class="ml-2 text-white-50"> ' . __('Report') . '</span>',
                        ['controller' => 'Tickets', 'action' => 'report', 'plugin' => false, 'prefix' => false],
                        ['escape' => false, 'class' => 'nav-link']
                    );
                    ?>
                </div>
            </div>
        </nav>
    </div>
