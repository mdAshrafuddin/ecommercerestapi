<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Addres[]|\Cake\Collection\CollectionInterface $address
 */
?>
<div class="address index content">
    <?= $this->Html->link(__('New Addres'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Address') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('full_name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('postcode') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($address as $addres): ?>
                <tr>
                    <td><?= $this->Number->format($addres->id) ?></td>
                    <td><?= $addres->has('user') ? $this->Html->link($addres->user->name, ['controller' => 'Users', 'action' => 'view', $addres->user->id]) : '' ?></td>
                    <td><?= h($addres->full_name) ?></td>
                    <td><?= h($addres->address) ?></td>
                    <td><?= h($addres->postcode) ?></td>
                    <td><?= h($addres->city) ?></td>
                    <td><?= h($addres->phone) ?></td>
                    <td><?= h($addres->created) ?></td>
                    <td><?= h($addres->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $addres->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $addres->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addres->id)]) ?>
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
