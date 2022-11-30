<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<style>
    input[type='email']{
        border-radius: 0rem;
    }
</style>
<div class="row">
    <div class="column-responsive column-80">
        <div class="staffs form content">

            <?= $this->Form->create($category,['type'=>'file']) ?>
            <H3>Add New Category</H3>

                <table>
                    <tr>
                        <td>
                            <?php

                            echo $this->Form->control('name:',[
                                    'label'=>'Name:'
                                ]
                            );
                            ?>



                            <?php
                            echo $this->Form->control('description:'
                            );
                            ?>
                        </td>
                    </tr>

                </table>

            <?= $this->Form->button(__('Submit'),[
                'label'=>'Save'

            ]) ?>
            <?= $this->Form->end() ?>
        </div>

    </div>
</div>

