<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AlunosSaude $alunosSaude
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
            <?= $alunosSaude->has('aluno') ? $this->Html->link($alunosSaude->aluno->id, ['controller' => 'Alunos', 'action' => 'view', $alunosSaude->aluno->id]) : '' ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Tipo Sanguineo') ?></strong><br>
            <?= h($alunosSaude->tipo_sanguineo) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Arquivo Atestado') ?></strong><br>
            <?= h($alunosSaude->arquivo_atestado) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Deficiencia Qual') ?></strong><br>
            <?= h($alunosSaude->deficiencia_qual) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Doenca Respiratoria Qual') ?></strong><br>
            <?= h($alunosSaude->doenca_respiratoria_qual) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Doenca Historico Qual') ?></strong><br>
            <?= h($alunosSaude->doenca_historico_qual) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Cirurgia Qual') ?></strong><br>
            <?= h($alunosSaude->cirurgia_qual) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Alergia Qual') ?></strong><br>
            <?= h($alunosSaude->alergia_qual) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Atividade Fisica Qual') ?></strong><br>
            <?= h($alunosSaude->atividade_fisica_qual) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Atividade Fisica Restricao Qual') ?></strong><br>
            <?= h($alunosSaude->atividade_fisica_restricao_qual) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Id') ?></strong><br>
            <?= $this->Number->format($alunosSaude->id) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Validade Atestado') ?></strong><br>
            <?= h($alunosSaude->validade_atestado) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Modified') ?></strong><br>
            <?= h($alunosSaude->modified) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Created') ?></strong><br>
            <?= h($alunosSaude->created) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Plano Saude') ?></strong><br>
            <?= $alunosSaude->plano_saude ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Remedio Regular') ?></strong><br>
            <?= $alunosSaude->remedio_regular ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Deficiencia') ?></strong><br>
            <?= $alunosSaude->deficiencia ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Doenca Respiratoria') ?></strong><br>
            <?= $alunosSaude->doenca_respiratoria ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Doenca Historico') ?></strong><br>
            <?= $alunosSaude->doenca_historico ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Cirurgia') ?></strong><br>
            <?= $alunosSaude->cirurgia ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Alergia') ?></strong><br>
            <?= $alunosSaude->alergia ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Atividade Fisica') ?></strong><br>
            <?= $alunosSaude->atividade_fisica ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Atividade Fisica Restricao') ?></strong><br>
            <?= $alunosSaude->atividade_fisica_restricao ? __('Yes') : __('No'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Fuma') ?></strong><br>
            <?= $alunosSaude->fuma ? __('Yes') : __('No'); ?>
        </div>
    </div>

    <div class="text">
        <strong><?= __('Remedio Regular Qual') ?></strong>
        <blockquote>
            <?= $this->Text->autoParagraph(h($alunosSaude->remedio_regular_qual)); ?>
        </blockquote>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>