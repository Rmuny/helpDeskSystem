<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
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
<div class="container-fluid">
    <div class="card">
        <div class="card-header">

<div id="page">
    <div id="header">

        <div class="container-fluid">
            <!--        <div class="card-header">-->
            <div class="roles index content">
                <div class="d-inline float-end">
                    <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'index'],
                        ['escape' => false, 'class' => 'btn btn-success']) ?>
                </div>
                <h3 ><?= __('Staff Info' ) ?></h3>
            </div>
        </div>
    </div>
</div></div>

    <div class="card-body">
        <div id="menu">
            <div class="profile">
                <?= $this->Html->image($staff->profileImage) ?>
            </div>
            <label style="padding-left: 25px">
                <?= h($staff->staffName) ?>
            </label>




        </div>
        <div id="content">
            <table >
                <tr>
                    <td style="width:18%;">N. :
                    </td>
                    <td>
                        <label>
                        <?= $this->Number->format($staff->id) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Full Name:
                    </td>
                    <td>
                        <label>
                        <?= h($staff->staffName) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Gender:
                    </td>
                    <td>
                        <label>
                        <?= h($staff->gender) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Username:
                    </td>
                    <td>
                        <label>
                        <?= h($staff->username) ?>
                        </label>

                    </td>
                </tr>
                <tr>
                    <td>Email:
                    </td>
                    <td>
                        <label>
                        <?= h($staff->email) ?></label>

                    </td>
                </tr>
                <tr>
                    <td>Phone number:</td>
                    <td>
                        <label>
                        <?= h($staff->phoneNumber) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Role: </td>
                    <td>
                        <label>
                        <?= $staff->has('role') ? $this->Html->link($staff->role->name, ['controller' => 'Roles', 'action' => 'view', $staff->role->id]) : '' ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Category:
                    </td>
                    <td><label>
                        <?= $staff->has('category') ? $this->Html->link($staff->category->name, ['controller' => 'Categories', 'action' => 'view', $staff->category->id]) : '' ?>
                        </label>
                    </td>
                </tr>
            </table>

        </div>
    </div>







