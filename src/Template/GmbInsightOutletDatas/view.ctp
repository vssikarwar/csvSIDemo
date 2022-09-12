<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GmbInsightOutletData $gmbInsightOutletData
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gmb Insight Outlet Data'), ['action' => 'edit', $gmbInsightOutletData->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gmb Insight Outlet Data'), ['action' => 'delete', $gmbInsightOutletData->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gmbInsightOutletData->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gmb Insight Outlet Datas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gmb Insight Outlet Data'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gmbInsightOutletDatas view large-9 medium-8 columns content">
    <h3><?= h($gmbInsightOutletData->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location Name') ?></th>
            <td><?= h($gmbInsightOutletData->location_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Id') ?></th>
            <td><?= h($gmbInsightOutletData->location_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Outlet Id') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->master_outlet_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outlet Id') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->outlet_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Search Views') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->search_views) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Views') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->total_views) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Website') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->visit_website) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Phone Call') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->total_phone_call) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Queries Direct') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->queries_direct) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Queries Indirect') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->queries_indirect) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Views Maps') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->views_maps) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Views Search') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->views_search) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Request Directions') ?></th>
            <td><?= $this->Number->format($gmbInsightOutletData->request_directions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cron Date') ?></th>
            <td><?= h($gmbInsightOutletData->cron_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gmbInsightOutletData->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($gmbInsightOutletData->modified) ?></td>
        </tr>
    </table>
</div>
