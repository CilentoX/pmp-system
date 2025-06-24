<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ModalidadesNucleo $modalidadesNucleo
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
            <strong><?= __('Modalidade') ?></strong><br>
            <?= $modalidadesNucleo->has('modalidade') ? $this->Html->link($modalidadesNucleo->modalidade->id, ['controller' => 'Modalidades', 'action' => 'view', $modalidadesNucleo->modalidade->id]) : '' ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Nucleo') ?></strong><br>
            <?= $modalidadesNucleo->has('nucleo') ? $this->Html->link($modalidadesNucleo->nucleo->id, ['controller' => 'Nucleos', 'action' => 'view', $modalidadesNucleo->nucleo->id]) : '' ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Id') ?></strong><br>
            <?= $this->Number->format($modalidadesNucleo->id) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <strong>Modificado em</strong><br>
            <?= h($modalidadesNucleo->modified) ?>
        </div>
        <div class="col-md-6">
            <strong>Cadastrado em</strong><br>
            <?= h($modalidadesNucleo->created) ?>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>