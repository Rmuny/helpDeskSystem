<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 *
 */
?>


<style>

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

    div#content {
        /*border:2px solid blue;*/
        width:75%;
        padding-top: 2%;
        margin:10px 0 10px 235px;
           }
    div#footer {
        /*border:2px solid red;*/
        width:100%;
        height:50px;
    }
    div#menu {
        /*border:2px solid green;*/
        width:210px;
        float:left;
        padding-top: 2%;

        margin:10px 0 10px 5px;
        height:350px;
    }
    .profile{
        padding-top: 20px;
    }
.profile img{

    width: 170px;
    height: 170px;
}
    label{
        font-size: large;
        color: rgba(0, 0, 0, 0.75);
    }
</style>
<?= $this->Form->create($role,['type'=>'file']) ?>
<div id="page">
    <div id="header">

        <div class="container-fluid">
            <!--        <div class="card-header">-->
            <div class="roles index content">
                <div class="d-inline float-end">
                    <?= $this->Html->link('<span class="fas fa-backward text-white"></span><span class="ms-2 text-white">' . __('Back') . '</span>', ['action' => 'index'],
                        ['escape' => false, 'class' => 'btn btn-success']) ?>
                </div>
                <h3 ><?= __('Edit Role' ) ?></h3>
            </div>
        </div>
    </div>

        </div>
<div id="menu">
    <div class="profile">
        <?= $this->Html->image("https://cdn1.iconfinder.com/data/icons/genius-color/64/personality-behavior-character-role-action-512.png") ?>
    </div>
</div>
        <div id="content">
            <table >
                <tr>
                    <td width="200px"><label>Name:</label>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control('name',['label'=>false]); ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Description:</label>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control('description',['label'=>false]);
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

