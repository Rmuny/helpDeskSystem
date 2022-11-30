
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 *
 */
echo $this->Html->css('forgotpassword');
?>
<section class="vh-100" >

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-6">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">

                        <div class="card-body text-black">
                            <div style="padding-left: 180px" class="d-flex align-items-center mb-3 pb-1">
                                <img style="width: 150px;" src="https://img.freepik.com/premium-vector/cute-panda-forgot-password-vector-icon-illustration_138676-419.jpg?w=2000" alt="" />

                            </div>
                            <?= $this->Flash->render() ?>
                            <?= $this->Form->create() ?>

                            <div style="color:#011b18; text-align: center">
                                <h5 style="color:red ; text-align: center ">Forgot Password?
                                    <h6>Enter your email and we'll send you a link to reset your</h6>
                                    <h6>password.</h6>
                                    <?php echo $this->Form->create()?>
                                    <?php echo $this->Form->input('email',
                                        ['class' => 'form-control form-control-lg',
                                            "placeholder"=>"Enter Your Email",
                                        ],

                                    )?>
                            </div>
                            <div class="my-4 text-end"></div>
                            <div style="padding-left: 180px">
                                <?php

                                echo $this->Form->button('Reset Password', ['class' => 'btn btn-dark btn-lg btn-block',['action'=>'forgotPassword']]);
                                ?>
                            </div>
                            <div class="my-4 text-end">
                                <?php
                                echo $this->Html->link(__d('CakeDC/Staffs', 'Back to login'), ['action' => 'login']) ;
                                echo $this->Form->end();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


