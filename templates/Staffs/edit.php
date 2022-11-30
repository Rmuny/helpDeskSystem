<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 * @var string[]|\Cake\Collection\CollectionInterface $categories

 *
 */
?>
<style>
    option{
        float: left;
    }

    legend{
        /*padding-top: 20px;*/
        padding-left: 10px;
        color: #FFFFFF;
    }
    div#page {
        /*border:1px solid purple;*/
        width:100%;
        margin:0 auto;
        /*padding:5px;*/
        text-align:left;
        background-color: #751717;

    }
    div {
        /*padding-right: 10px;*/

        /*text-align:center;*/
    }
    div#header {
        /*border: 1px #0a53be;*/
        /*border:2px solid red;*/
        background-color: rgba(197, 197, 197, 0.22);
        padding-right: 10px;

        width:100%;
        height:70px;
        /*border-bottom: #bbd4c1 1px  ;*/
    }
    div#menu {
        /*border:2px solid green;*/
        width:210px;
        float:left;
        padding-top: 2%;

        margin:10px 0 10px 5px;
        height:350px;
    }
    div#content {
        /*border:2px solid blue;*/
        width:75%;
        padding-top: 2%;
        margin:10px 0 10px 235px;
        min-height:300px;
        _height:300px
    }
    div#footer {
        /*border:2px solid red;*/
        width:100%;
        height:50px;
    }
    .profile img{
        width: 150px;
        height: 150px;
        border-radius: 0% ;
    }
    label{
        font-size: large;
        color: rgba(0, 0, 0, 0.75);
    }
</style>
    <?= $this->Form->create($staff,['type'=>'file']) ?>
<div id="page">
    <div id="header">

<div class="container-fluid">
    <!--        <div class="card-header">-->
    <div class="roles index content">
        <div class="d-inline float-end">
            <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'index'],
                ['escape' => false, 'class' => 'btn btn-success']) ?>
        </div>
        <h3 ><?= __('Edit Staff' ) ?></h3>
    </div>
</div>
            <div id="menu">
                <div class="profile">
                        <?= $this->Html->image($staff->profileImage) ?>
                    <div>
                        <?php

                        echo $this->Form->control(
                            'image',[
                            'class' => 'form-control  rounded-4 ',
                            'type' => 'file',
                            'onchange' => 'getImagePreview(event)',
                        ]);
                        $this->Html->image($staff->image);
                        ?>
                    </div>

                </div>
            </div>
            <div id="content">
                <table >
                    <tr>
                        <td width="200px"><label for="StaffSubject:">FullName:</label>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('staffName',['label'=>false]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="StaffSubject:">Gender:</label>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('gender',
                                ['type'=>'radio', 'label'=>false,
                                    'options'=>['Male'=>'Male','Female'=>'Female'],

                                ],
                            );?>

                        </td>
                    </tr>
                    <tr>
                        <td><label for="StaffSubject:">Email:</label>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('email',['label'=>false]);
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td><label for="StaffSubject:">Phone number:</label>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('phoneNumber',['label'=>false]);
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td><label for="StaffSubject:">Role:</label>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('role_id',
                                ['options' => $roles, 'empty' => true,'label'=>false]);
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td><label for="StaffSubject:">Category:</label>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('category_id',
                                ['options' => $categories, 'empty' => false,'label'=>false]);
                            ?>

                        </td>
                    </tr>
                </table>
            <div id="footer">
                <div style="width: fit-content">
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
</div>
