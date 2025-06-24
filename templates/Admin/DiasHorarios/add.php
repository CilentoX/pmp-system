<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiasHorario $diasHorario
 * @var \Cake\Collection\CollectionInterface|string[] $cursos
 */
?>

<?= $this->Form->create($diasHorario) ?>

                <?= $this->Form->control('cursos_id', ['options' => $cursos, 'class'=>'form-control']); ?>
                <?= $this->Form->control('dia_semana', ['class'=>'form-control']); ?>
                <?= $this->Form->control('horario_inicio', ['class'=>'form-control']); ?>
                <?= $this->Form->control('horario_fim', ['class'=>'form-control']); ?>


<div class="form-group text-right">
    <?= $this->Html->link('Cancelar', ['action'=>'index'], ['class'=>'btn btn-default']); ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>


