<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductDetail $productDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productDetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Product Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productDetails form content">
            <?= $this->Form->create($productDetail) ?>
            <fieldset>
                <legend><?= __('Edit Product Detail') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $product, 'empty' => true]);
                    echo $this->Form->control('size');
                    echo $this->Form->control('color');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
