<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CartItem[]|\Cake\Collection\CollectionInterface $cartItem
 */
?>
<div class="cartItem index content">
    <?= $this->Html->link(__('New Cart Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cart Item') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('product_details_id') ?></th>
                    <th><?= $this->Paginator->sort('saved_for_later') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('time_added') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItem as $cartItem): ?>
                <tr>
                    <td><?= $this->Number->format($cartItem->id) ?></td>
                    <td><?= $cartItem->has('user') ? $this->Html->link($cartItem->user->name, ['controller' => 'Users', 'action' => 'view', $cartItem->user->id]) : '' ?></td>
                    <td><?= $cartItem->has('product_detail') ? $this->Html->link($cartItem->product_detail->id, ['controller' => 'ProductDetails', 'action' => 'view', $cartItem->product_detail->id]) : '' ?></td>
                    <td><?= h($cartItem->saved_for_later) ?></td>
                    <td><?= h($cartItem->quantity) ?></td>
                    <td><?= h($cartItem->time_added) ?></td>
                    <td><?= h($cartItem->created) ?></td>
                    <td><?= h($cartItem->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cartItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cartItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cartItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartItem->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
