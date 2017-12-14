<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Showtimes'), ['controller' => 'Showtimes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Showtime'), ['controller' => 'Showtimes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($room->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($room->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($room->capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($room->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($room->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Showtimes') ?></h4>
        <?php if (!empty($showtimesThisWeek)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Lundi') ?></th>
                <th scope="col"><?= __('Mardi') ?></th>
                <th scope="col"><?= __('Mercredi') ?></th>
                <th scope="col"><?= __('Jeudi') ?></th>
                <th scope="col"><?= __('Vendredi') ?></th>
                <th scope="col"><?= __('Samedi') ?></th>
                <th scope="col"><?= __('Dimanche') ?></th>
            </tr>
            <?php foreach ($showtimesThisWeek as $showtimes): ?>
            <tr>
                <td><?= $r = ($showtimes->start->day == $monday->day ) ? h($showtimes->movie->name . " " . $showtimes->start->hour . "H/" . $showtimes->end->hour ."H") : "" ; ?></td>
                <td><?= $r = ($showtimes->start->day == $tuesday->day ) ? h($showtimes->movie->name . " " . $showtimes->start->hour . "H/" . $showtimes->end->hour ."H") : "" ; ?></td>
                <td><?= $r = ($showtimes->start->day == $wednesday->day ) ? h($showtimes->movie->name . " " . $showtimes->start->hour . "H/" . $showtimes->end->hour ."H") : "" ; ?></td>
                <td><?= $r = ($showtimes->start->day == $thursday->day ) ? h($showtimes->movie->name . " " . $showtimes->start->hour . "H/" . $showtimes->end->hour ."H") : "" ; ?></td>
                <td><?= $r = ($showtimes->start->day == $friday->day ) ? h($showtimes->movie->name . " " . $showtimes->start->hour . "H/" . $showtimes->end->hour ."H") : "" ; ?></td>
                <td><?= $r = ($showtimes->start->day == $saturday->day ) ? h($showtimes->movie->name . " " . $showtimes->start->hour . "H/" . $showtimes->end->hour ."H") : "" ; ?></td>
                <td><?= $r = ($showtimes->start->day == $sunday->day ) ? h($showtimes->movie->name . " " . $showtimes->start->hour . "H/" . $showtimes->end->hour ."H") : "" ; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
