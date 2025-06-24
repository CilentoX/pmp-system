<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AlunosSaude $alunosSaude
 * @var string[]|\Cake\Collection\CollectionInterface $alunos
 */
?>

<?= $this->Form->create($alunosSaude) ?>

                <?= $this->Form->control('alunos_id', ['options' => $alunos, 'class'=>'form-control']); ?>
                <?= $this->Form->control('plano_saude', ['class'=>'form-control']); ?>
                <?= $this->Form->control('tipo_sanguineo', ['class'=>'form-control']); ?>
                <?= $this->Form->control('remedio_regular', ['class'=>'form-control']); ?>
                <?= $this->Form->control('remedio_regular_qual', ['class'=>'form-control']); ?>
                <?= $this->Form->control('arquivo_atestado', ['class'=>'form-control']); ?>
                <?= $this->Form->control('validade_atestado', ['class'=>'form-control']); ?>
                <?= $this->Form->control('deficiencia', ['class'=>'form-control']); ?>
                <?= $this->Form->control('deficiencia_qual', ['class'=>'form-control']); ?>
                <?= $this->Form->control('doenca_respiratoria', ['class'=>'form-control']); ?>
                <?= $this->Form->control('doenca_respiratoria_qual', ['class'=>'form-control']); ?>
                <?= $this->Form->control('doenca_historico', ['class'=>'form-control']); ?>
                <?= $this->Form->control('doenca_historico_qual', ['class'=>'form-control']); ?>
                <?= $this->Form->control('cirurgia', ['class'=>'form-control']); ?>
                <?= $this->Form->control('cirurgia_qual', ['class'=>'form-control']); ?>
                <?= $this->Form->control('alergia', ['class'=>'form-control']); ?>
                <?= $this->Form->control('alergia_qual', ['class'=>'form-control']); ?>
                <?= $this->Form->control('atividade_fisica', ['class'=>'form-control']); ?>
                <?= $this->Form->control('atividade_fisica_qual', ['class'=>'form-control']); ?>
                <?= $this->Form->control('atividade_fisica_restricao', ['class'=>'form-control']); ?>
                <?= $this->Form->control('atividade_fisica_restricao_qual', ['class'=>'form-control']); ?>
                <?= $this->Form->control('fuma', ['class'=>'form-control']); ?>


<div class="form-group text-right">
    <?= $this->Html->link('Cancelar', ['action'=>'index'], ['class'=>'btn btn-default']); ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>


