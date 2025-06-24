<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno[]|\Cake\Collection\CollectionInterface $alunos
 */
?>

<div class="row">
    <div class="col-md-6 form-group">
        <?php echo $this->Html->link('Novo(a)', ['action' => 'add'], ['class' => 'btn btn-primary']); ?>
    </div>
    <div class="col-md-6 form-group">
        <?= $this->Form->create(null, ['type' => 'GET']); ?>
        <?php $this->Form->setTemplates(['inputContainer' => '{{content}}']); ?>
        <div class="input-group">
            <?= $this->Form->control('nome', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Digite sua busca...', 'value' => $this->request->getQuery('nome')]); ?>
            <div class="input-group-append">
                <?php if ($this->request->getQuery()): ?>
                    <?php echo $this->Html->link('<i class="fas fa-times"></i>', ['action' => 'index'], ['class' => 'btn btn-default', 'escape' => false]); ?>
                <?php endif; ?>
                <button class="btn btn-primary" type="submit" id="button-addon2">Pesquisar <i
                            class="fas fa-search"></i>
                </button>
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
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th><?= $this->Paginator->sort('cpf', 'CPF') ?></th>
            <th><?= $this->Paginator->sort('data_nascimento', 'Data de Nasc.') ?></th>
            <th><?= $this->Paginator->sort('telefone') ?></th>
            <th><?= $this->Paginator->sort('created', 'Cadastrado em') ?></th>
            <th class="actions"><?= __('Opções') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($alunos as $aluno): ?>
            <tr>
                <td><?= $this->Number->format($aluno->id) ?></td>
                <td><?= h($aluno->nome) ?></td>
                <td><?= $aluno->cpf ?></td>
                <td><?= h($aluno->data_nascimento) ?></td>
                <td><?= h($aluno->telefone) ?></td>
                <td><?= h($aluno->created->format('d/m/Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $aluno->id], ['escape' => false, 'class' => 'btn btn-default', 'data-tooltip' => 'tooltip', 'title' => 'Visualizar']) ?>
                    <?= $this->Html->link('<i class="fas fa-pencil-alt"></i>', ['action' => 'edit', $aluno->id], ['escape' => false, 'class' => 'btn btn-default', 'data-tooltip' => 'tooltip', 'title' => 'Editar']) ?>
                    <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $aluno->id], ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Deseja realmente excluir # {0}?', $aluno->id), 'data-tooltip' => 'tooltip', 'title' => 'Excluir']) ?>
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

