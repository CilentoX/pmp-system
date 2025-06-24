<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionario $questionario
 */
?>

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body view-detalhes">
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Aluno') ?></strong><br>
            <?= $questionario->has('aluno') ? $this->Html->link($questionario->aluno->id, ['controller' => 'Alunos', 'action' => 'view', $questionario->aluno->id]) : '' ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Id') ?></strong><br>
            <?= $this->Number->format($questionario->id) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Created') ?></strong><br>
            <?= h($questionario->created) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Modified') ?></strong><br>
            <?= h($questionario->modified) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Coracao') ?></strong><br>
            <?= $questionario->coracao ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Dor Peito') ?></strong><br>
            <?= $questionario->dor_peito ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Dor Peito Mes') ?></strong><br>
            <?= $questionario->dor_peito_mes ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Tontura') ?></strong><br>
            <?= $questionario->tontura ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Articular') ?></strong><br>
            <?= $questionario->articular ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Tratamento') ?></strong><br>
            <?= $questionario->tratamento ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Cirurgia') ?></strong><br>
            <?= $questionario->cirurgia ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Outra Razao') ?></strong><br>
            <?= $questionario->outra_razao ? __('Yes') : __('No'); ?>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>