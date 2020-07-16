<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Discount $discount
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Discount'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="discount form content">
            <?= $this->Form->create($discount) ?>
            <fieldset>
                <legend><?= __('Add Discount') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('discount');
                    echo $this->Form->control('type');
                    echo $this->Form->control('valid', ['empty' => true]);
                    echo $this->Form->control('quanty');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
