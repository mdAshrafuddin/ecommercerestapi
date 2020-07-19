<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $Login
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('User Login') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
