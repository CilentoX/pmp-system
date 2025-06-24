<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiasHorario $diasHorario
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
                        <?= $diasHorario->has('curso') ? $this->Html->link($diasHorario->curso->id, ['controller' => 'Cursos', 'action' => 'view', $diasHorario->curso->id]) : '' ?>
                    </div>
                </div>
                                                <div class="row">
                    <div class="col-md-12">
                        <strong><?= __('Dia Semana') ?></strong><br>
                        <?= h($diasHorario->dia_semana) ?>
                    </div>
                </div>
                                                    <div class="row">
                <div class="col-md-12">
                    <strong><?= __('Id') ?></strong><br>
                    <?= $this->Number->format($diasHorario->id) ?>
                </div>
            </div>
                                    <div class="row">
                <div class="col-md-12 ">
                    <strong><?= __('Horario Inicio') ?></strong><br>
                    <?= h($diasHorario->horario_inicio) ?>
                </div>
            </div>
                    <div class="row">
                <div class="col-md-12 ">
                    <strong><?= __('Horario Fim') ?></strong><br>
                    <?= h($diasHorario->horario_fim) ?>
                </div>
            </div>
                    <div class="row">
                <div class="col-md-12 ">
                    <strong><?= __('Created') ?></strong><br>
                    <?= h($diasHorario->created) ?>
                </div>
            </div>
                    <div class="row">
                <div class="col-md-12 ">
                    <strong><?= __('Modified') ?></strong><br>
                    <?= h($diasHorario->modified) ?>
                </div>
            </div>
                
            </div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>