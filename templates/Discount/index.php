<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Discount[]|\Cake\Collection\CollectionInterface $discount
 */
?>
<div class="discount index content">
    <?= $this->Html->link(__('New Discount'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Discount') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('valid') ?></th>
                    <th><?= $this->Paginator->sort('quanty') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($discount as $discount): ?>
                <tr>
                    <td><?= $this->Number->format($discount->id) ?></td>
                    <td><?= h($discount->name) ?></td>
                    <td><?= $this->Number->format($discount->discount) ?></td>
                    <td><?= $this->Number->format($discount->type) ?></td>
                    <td><?= h($discount->created) ?></td>
                    <td><?= h($discount->modified) ?></td>
                    <td><?= h($discount->valid) ?></td>
                    <td><?= $this->Number->format($discount->quanty) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $discount->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $discount->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $discount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $discount->id)]) ?>
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
