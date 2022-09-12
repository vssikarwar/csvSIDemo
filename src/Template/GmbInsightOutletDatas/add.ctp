<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GmbInsightOutletData $gmbInsightOutletData
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Gmb Insight Outlet Datas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="gmbInsightOutletDatas form large-9 medium-8 columns content">
    <?= $this->Form->create($gmbInsightOutletData) ?>
    <fieldset>
        <legend><?= __('Add Gmb Insight Outlet Data') ?></legend>
        <?php
            echo $this->Form->control('master_outlet_id');
            echo $this->Form->control('outlet_id');
            echo $this->Form->control('search_views');
            echo $this->Form->control('total_views');
            echo $this->Form->control('visit_website');
            echo $this->Form->control('total_phone_call');
            echo $this->Form->control('queries_direct');
            echo $this->Form->control('queries_indirect');
            echo $this->Form->control('views_maps');
            echo $this->Form->control('views_search');
            echo $this->Form->control('request_directions');
            echo $this->Form->control('cron_date', ['empty' => true]);
            echo $this->Form->control('location_name');
            echo $this->Form->control('location_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
