<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $phinxlog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Phinxlog'), ['action' => 'edit', $phinxlog->version]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Phinxlog'), ['action' => 'delete', $phinxlog->version], ['confirm' => __('Are you sure you want to delete # {0}?', $phinxlog->version)]) ?> </li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="phinxlog view large-9 medium-8 columns content">
    <h3><?= h($phinxlog->version) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Migration Name') ?></th>
            <td><?= h($phinxlog->migration_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version') ?></th>
            <td><?= $this->Number->format($phinxlog->version) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($phinxlog->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Time') ?></th>
            <td><?= h($phinxlog->end_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Breakpoint') ?></th>
            <td><?= $phinxlog->breakpoint ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
