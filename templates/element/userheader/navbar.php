<?php
/**
 * @var \App\View\AppView $this
 * @var App\Controller\AppController $login
 */
echo $this->Html->css('nav');


?>

<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #141414;">
	<!-- Navbar Brand-->

        <a class="navbar-brand ps-3">HelpD</a>
        <a class="navbar-brand1">esk </a>

    <!--search-->

	<!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    <!-- Navbar Search-->


    <!-- Navbar-->
	<ul class="navbar-nav d-none d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle text-white fs-5" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $this->Html->image($login['profileImage'])?>  <?= h($login['staffName']); ?></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

				<li>
                    <div class="navprofile">
					<?= $this->Html->link(__d('CakeDC/Staffs', 'Profile'),
						['plugin' => false, 'prefix' => null, 'controller' => 'Staffs', 'action' => 'Profile'],
						['escape' => false, 'class' => 'dropdown-item']
					);?>
                    </div>
				</li>
				<li>
                    <?= $this->Html->link(__d('CakeDC/Users', 'Change Password'),
                        ['plugin' => false, 'prefix' => null, 'controller' => 'Staffs', 'action' => 'changePassword'],
                        ['escape' => false, 'class' => 'dropdown-item']
                    ); ?>
				</li>
				<li><hr class="dropdown-divider" /></li>
				<li>
					<?php echo $this->Html->link(
						'<span class="fas fa-sign-out-alt ml-2 text-gray-400"></span><span>' . __('Logout') . '</span>',
						[
							'prefix' => false, 'plugin' => false, 'controller' => 'Staffs', 'action' => 'logout'
						],
						['escape' => false, 'class' => 'dropdown-item']
					) ?>
				</li>
			</ul>
		</li>
	</ul>
</nav>

<?= $this->element('header/sidebar') ?>
