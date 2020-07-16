<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductDetail[]|\Cake\Collection\CollectionInterface $productDetails
 */
?>
<div class="productDetails index content">
    <?= $this->Html->link(__('New Product Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Product Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('size') ?></th>
                    <th><?= $this->Paginator->sort('color') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productDetails as $productDetail): ?>
                <tr>
                    <td><?= $this->Number->format($productDetail->id) ?></td>
                    <td><?= $productDetail->has('product') ? $this->Html->link($productDetail->product->name, ['controller' => 'Product', 'action' => 'view', $productDetail->product->id]) : '' ?></td>
                    <td><?= h($productDetail->size) ?></td>
                    <td><?= h($productDetail->color) ?></td>
                    <td><?= h($productDetail->created) ?></td>
                    <td><?= h($productDetail->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productDetail->id)]) ?>
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
