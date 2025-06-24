<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CursosAluno[]|\Cake\Collection\CollectionInterface $cursosAlunos
 */
?>

<div class="row">
    <div class="col-md-6 form-group">
        <?php echo $this->Html->link('Novo(a)', ['action' => 'add'], ['class' => 'btn btn-primary']); ?>
    </div>

    <div class="col-md-6 form-group">
        <?= $this->Form->create(null, ['type' => 'GET', 'url' => ['action' => 'index']]); ?>
        <?php $this->Form->setTemplates(['inputContainer' => '{{content}}']); ?>
        <div class="input-group">
            <?= $this->Form->control('nome', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Digite sua busca...']); ?>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="button-addon2">Pesquisar</button>
            </div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('cursos_id', 'Aula') ?></th>
            <th><?= $this->Paginator->sort('alunos_id') ?></th>
            <th><?= $this->Paginator->sort('created', 'Cadastrado em') ?></th>
            <th><?= $this->Paginator->sort('modified', 'Modificado em') ?></th>
            <th class="actions"><?= __('Opções') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cursosAlunos as $cursosAluno): ?>
            <tr>
                <td><?= $this->Number->format($cursosAluno->id) ?></td>
                <td><?= $cursosAluno->has('curso') ? $this->Html->link($cursosAluno->curso->id, ['controller' => 'Cursos', 'action' => 'view', $cursosAluno->curso->id]) : '' ?></td>
                <td><?= $this->Number->format($cursosAluno->alunos_id) ?></td>
                <td><?= h($cursosAluno->created) ?></td>
                <td><?= h($cursosAluno->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $cursosAluno->id], ['escape' => false, 'class' => 'btn btn-default', 'data-tooltip' => 'tooltip', 'title' => 'Visualizar', 'data-toggle' => 'modal', 'data-target' => '.view']) ?>
                    <?= $this->Html->link('<i class="fas fa-pencil-alt"></i>', ['action' => 'edit', $cursosAluno->id], ['escape' => false, 'class' => 'btn btn-default', 'data-tooltip' => 'tooltip', 'title' => 'Editar']) ?>
                    <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $cursosAluno->id], ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Deseja realmente excluir # {0}?', $cursosAluno->id), 'data-tooltip' => 'tooltip', 'title' => 'Excluir']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<<') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->last('>>') ?>
    </ul>
    <p><?= $this->Paginator->counter('Página {{page}} de {{pages}}, mostrando {{current}} linha(s) de um total de {{count}}, começando em {{start}}, terminado {{end}}') ?></p>
</div>

