<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionario $questionario
 * @var string[]|\Cake\Collection\CollectionInterface $alunos
 */
?>

<?= $this->Form->create($questionario) ?>

                <?= $this->Form->control('alunos_id', ['options' => $alunos, 'class'=>'form-control']); ?>
                <?= $this->Form->control('coracao', ['class'=>'form-control']); ?>
                <?= $this->Form->control('dor_peito', ['class'=>'form-control']); ?>
                <?= $this->Form->control('dor_peito_mes', ['class'=>'form-control']); ?>
                <?= $this->Form->control('tontura', ['class'=>'form-control']); ?>
                <?= $this->Form->control('articular', ['class'=>'form-control']); ?>
                <?= $this->Form->control('tratamento', ['class'=>'form-control']); ?>
                <?= $this->Form->control('cirurgia', ['class'=>'form-control']); ?>
                <?= $this->Form->control('outra_razao', ['class'=>'form-control']); ?>


<div class="form-group text-right">
    <?= $this->Html->link('Cancelar', ['action'=>'index'], ['class'=>'btn btn-default']); ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>


