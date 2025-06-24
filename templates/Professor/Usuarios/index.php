<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuarios
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
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th><?= $this->Paginator->sort('email', 'E-mail') ?></th>
            <th><?= $this->Paginator->sort('cpf', 'CPF') ?></th>
            <th><?= $this->Paginator->sort('telefone') ?></th>
            <th><?= $this->Paginator->sort('grupos_id') ?></th>
            <th class="actions"><?= __('Opções') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= h($usuario->nome) ?></td>
                <td><?= h($usuario->email) ?></td>
                <td><?= h($usuario->cpf) ?></td>
                <td><?= h($usuario->telefone) ?></td>
                <td><?= $usuario->has('grupo') ? $usuario->grupo->nome : '' ?></td>
                <td class="actions" style="min-width: 300px">
                    <a href="<?= $this->Url->build(['controller' => 'usuarios', 'action' => 'alterar-senha', $usuario->id]); ?>"
                       data-toggle="modal" data-target=".view" class="btn btn-default">
                        <i class="fas fa-lock"></i> Alterar Senha
                    </a>
                    <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $usuario->id], ['escape' => false, 'class' => 'btn btn-default', 'data-tooltip' => 'tooltip', 'title' => 'Visualizar', 'data-toggle' => 'modal', 'data-target' => '.view']) ?>
                    <?= $this->Html->link('<i class="fas fa-pencil-alt"></i>', ['action' => 'edit', $usuario->id], ['escape' => false, 'class' => 'btn btn-default', 'data-tooltip' => 'tooltip', 'title' => 'Editar']) ?>
                    <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $usuario->id], ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Deseja realmente excluir # {0}?', $usuario->id), 'data-tooltip' => 'tooltip', 'title' => 'Excluir']) ?>
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

