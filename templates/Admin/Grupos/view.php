<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grupo $grupo
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
            <strong><?= __('Nome') ?></strong><br>
            <?= h($grupo->nome) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Id') ?></strong><br>
            <?= $this->Number->format($grupo->id) ?>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>