<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nucleo $nucleo
 */
?>

<?= $this->Form->create($nucleo) ?>

<?= $this->Form->control('nome', ['class' => 'form-control']); ?>
<?= $this->Form->control('endereco', ['label' => 'Endereço', 'class' => 'form-control']); ?>
<div class="row">
    <div class="col-md-8">
        <?= $this->Form->control('bairro', ['class' => 'form-control']); ?>
    </div>
    <div class="col-md-4">
        <?= $this->Form->control('telefone', ['class' => 'form-control telefone']); ?>
    </div>
</div>

<div class="form-group text-right">
    <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>


