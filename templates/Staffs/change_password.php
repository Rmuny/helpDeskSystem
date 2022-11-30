
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
                                <div class="d-inline ">
                                    <?= $this->Html->link( __('⬅') . '</span>', ['action' => 'index'],
                                        ['escape' => false,]) ?>
                                </div>
                                <div style="padding-left: 180px" class="d-flex align-items-center mb-3 pb-1">
                                    <img style="width: 150px;" src="https://www.shareicon.net/data/2017/01/23/874882_password_512x512.png" alt="" />
                                </div>
                                <?= $this->Flash->render() ?>
                                <?= $this->Form->create() ?>

                                <div style="color:#011b18;">
                                    <h6 style="text-align: center">Change password</h6>
                                    <?php echo $this->Form->create()?>
                                    <?= $this->Form->control('current_password', [
                                        'class' => 'form-control form-control-lg',
                                        'placeholder'=>'********',
                                        'type' => 'password',
                                        'required' => true,
                                        'label' => __d('CakeDC/Users', 'Current password')]);
                                    ?>
                                    <?= $this->Form->control('new_password', [
                                        'class' => 'form-control form-control-lg',
                                        'placeholder'=>'********',
                                        'type' => 'password',
                                        'required' => true,
                                        'label' => __d('CakeDC/Users', 'New password')]);
                                    ?>
                                    <?= $this->Form->control('confirm_new_password', [
                                        'class' => 'form-control form-control-lg',
                                        'placeholder'=>'********',
                                        'type' => 'password',
                                        'required' => true,
                                        'label' => __d('CakeDC/Users', 'Confirm password')]);
                                    ?>
                                </div>
                                <div class="my-4 text-end">
                                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark btn-lg btn-block']) ?>
                                    <?= $this->Form->end() ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



