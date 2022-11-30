<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 *
 */
echo $this->Html->css('login');
?>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <?= $this->Html->image('https://www.wowdesk.com/wp-content/uploads/2019/02/home-cycle-graphics-01-2-2.gif', ['class' => 'img-fluid', 'style' => 'border-radius: 1rem 0 0 1rem']) ?>
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">

                            <div class="card-body p-4 p-lg-5 text-black">
                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <span style="color: #124b4a" class="h1 fw-bold mb-0">
                                        Help Desk System</span>
                                </div>

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; color: #011b18">Sign into your account</h5>

                                <?= $this->Flash->render() ?>
                                <?= $this->Form->create() ?>

                                <div style="color:#011b18;">
                                    <?= $this->Form->control('username', ['class' => 'form-control form-control-lg', "placeholder"=>"Enter Your Username",]) ?><br>
                                    <?= $this->Form->control('password', ['class' => 'form-control form-control-lg', "placeholder"=>"********",]) ?>
                                </div>
                                <div class="my-2 text-end">
                                    <?php  echo $this->Html->link(__d('CakeDC/Staffs', 'Forgot Password?'), ['action' => 'forgotPassword']) ?>
                                </div>
                                <div class="my-2 text-end">
                                </div>
                                <?= $this->Form->button(__('Login'), ['class' => 'btn btn-dark btn-lg btn-block']); ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

