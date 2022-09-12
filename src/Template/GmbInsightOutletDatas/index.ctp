<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GmbInsightOutletData[]|\Cake\Collection\CollectionInterface $gmbInsightOutletDatas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gmb Insight Outlet Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gmbInsightOutletDatas index large-9 medium-8 columns content">
    <h3><?= __('Gmb Insight Outlet Datas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_outlet_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('outlet_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('search_views') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_views') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_website') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_phone_call') ?></th>
                <th scope="col"><?= $this->Paginator->sort('queries_direct') ?></th>
                <th scope="col"><?= $this->Paginator->sort('queries_indirect') ?></th>
                <th scope="col"><?= $this->Paginator->sort('views_maps') ?></th>
                <th scope="col"><?= $this->Paginator->sort('views_search') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_directions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cron_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gmbInsightOutletDatas as $gmbInsightOutletData): ?>
            <tr>
                <td><?= $this->Number->format($gmbInsightOutletData->id) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->master_outlet_id) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->outlet_id) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->search_views) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->total_views) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->visit_website) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->total_phone_call) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->queries_direct) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->queries_indirect) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->views_maps) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->views_search) ?></td>
                <td><?= $this->Number->format($gmbInsightOutletData->request_directions) ?></td>
                <td><?= h($gmbInsightOutletData->cron_date) ?></td>
                <td><?= h($gmbInsightOutletData->created) ?></td>
                <td><?= h($gmbInsightOutletData->modified) ?></td>
                <td><?= h($gmbInsightOutletData->location_name) ?></td>
                <td><?= h($gmbInsightOutletData->location_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gmbInsightOutletData->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gmbInsightOutletData->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gmbInsightOutletData->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gmbInsightOutletData->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
