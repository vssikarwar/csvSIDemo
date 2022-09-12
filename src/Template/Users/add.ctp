<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li> <?=  $this->Html->link(__('Import'),['controller' => 'Users', 'action'=>'import','full_base' => true]);?></li>

    </ul>

    <div class="image-upload-wrap">
        <?=$this->Form->create('Post',["enctype"=>"multipart/form-data"],['action'=>'import'])?>
        <?= $this->Form->control('',['type'=>'file', 'class'=>'file-upload-input','name'=>'file','onchange'=>'readURL(this)'])?>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
        <div class="drag-text">      
    </div>

</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('age');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

</div>


