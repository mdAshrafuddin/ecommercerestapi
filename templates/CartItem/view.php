<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CartItem $cartItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cart Item'), ['action' => 'edit', $cartItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cart Item'), ['action' => 'delete', $cartItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cart Item'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cart Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cartItem view content">
            <h3><?= h($cartItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $cartItem->has('user') ? $this->Html->link($cartItem->user->name, ['controller' => 'Users', 'action' => 'view', $cartItem->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Detail') ?></th>
                    <td><?= $cartItem->has('product_detail') ? $this->Html->link($cartItem->product_detail->id, ['controller' => 'ProductDetails', 'action' => 'view', $cartItem->product_detail->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Saved For Later') ?></th>
                    <td><?= h($cartItem->saved_for_later) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= h($cartItem->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cartItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time Added') ?></th>
                    <td><?= h($cartItem->time_added) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($cartItem->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($cartItem->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
