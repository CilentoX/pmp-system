<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ModalidadesNucleo $modalidadesNucleo
 * @var \Cake\Collection\CollectionInterface|string[] $modalidades
 * @var \Cake\Collection\CollectionInterface|string[] $nucleos
 */
?>

<?= $this->Form->create($modalidadesNucleo) ?>

                <?= $this->Form->control('modalidades_id', ['options' => $modalidades, 'class'=>'form-control']); ?>
                <?= $this->Form->control('nucleos_id', ['options' => $nucleos, 'class'=>'form-control']); ?>


<div class="form-group text-right">
    <?= $this->Html->link('Cancelar', ['action'=>'index'], ['class'=>'btn btn-default']); ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>


