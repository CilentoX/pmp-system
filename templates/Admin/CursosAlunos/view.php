<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CursosAluno $cursosAluno
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
            <strong><?= __('Aula') ?></strong><br>
            <?= $cursosAluno->has('curso') ? $this->Html->link($cursosAluno->curso->id, ['controller' => 'Cursos', 'action' => 'view', $cursosAluno->curso->id]) : '' ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Id') ?></strong><br>
            <?= $this->Number->format($cursosAluno->id) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Alunos Id') ?></strong><br>
            <?= $this->Number->format($cursosAluno->alunos_id) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <strong>Cadastrado em</strong><br>
            <?= h($cursosAluno->created) ?>
        </div>
        <div class="col-md-6">
            <strong>Modificado em</strong><br>
            <?= h($cursosAluno->modified) ?>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>