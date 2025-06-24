<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
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

        <div class="col-md-1">
            <strong><?= __('Id') ?></strong><br>
            <?= $this->Number->format($usuario->id) ?>
        </div>
        <div class="col-md-11">
            <strong><?= __('Nome') ?></strong><br>
            <?= h($usuario->nome) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('E-mail') ?></strong><br>
            <?= h($usuario->email) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('CPF') ?></strong><br>
            <?= h($usuario->cpf) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Telefone') ?></strong><br>
            <?= h($usuario->telefone) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Grupo') ?></strong><br>
            <?= $usuario->has('grupo') ? $this->Html->link($usuario->grupo->nome, ['controller' => 'Grupos', 'action' => 'view', $usuario->grupo->id]) : '' ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <strong>Cadastrado em</strong><br>
            <?= h($usuario->created) ?>
        </div>
        <div class="col-md-6">
            <strong>Modificado em</strong><br>
            <?= h($usuario->modified) ?>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>
