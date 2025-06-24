<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionario[]|\Cake\Collection\CollectionInterface $questionarios
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
                            <th><?= $this->Paginator->sort('alunos_id') ?></th>
                            <th><?= $this->Paginator->sort('coracao') ?></th>
                            <th><?= $this->Paginator->sort('dor_peito') ?></th>
                            <th><?= $this->Paginator->sort('dor_peito_mes') ?></th>
                            <th><?= $this->Paginator->sort('tontura') ?></th>
                            <th><?= $this->Paginator->sort('articular') ?></th>
                            <th><?= $this->Paginator->sort('tratamento') ?></th>
                            <th><?= $this->Paginator->sort('cirurgia') ?></th>
                            <th><?= $this->Paginator->sort('outra_razao') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th><?= $this->Paginator->sort('modified') ?></th>
                        <th class="actions"><?= __('Opções') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($questionarios as $questionario): ?>
        <tr>
                                                                                                                                                                                                            <td><?= $this->Number->format($questionario->id) ?></td>
                                                                                                                                                                                    <td><?= $questionario->has('aluno') ? $this->Html->link($questionario->aluno->id, ['controller' => 'Alunos', 'action' => 'view', $questionario->aluno->id]) : '' ?></td>
                                                                                                                                                                                                                                                                                        <td><?= h($questionario->coracao) ?></td>
                                                                                                                                                                                                                                                <td><?= h($questionario->dor_peito) ?></td>
                                                                                                                                                                                                                                                <td><?= h($questionario->dor_peito_mes) ?></td>
                                                                                                                                                                                                                                                <td><?= h($questionario->tontura) ?></td>
                                                                                                                                                                                                                                                <td><?= h($questionario->articular) ?></td>
                                                                                                                                                                                                                                                <td><?= h($questionario->tratamento) ?></td>
                                                                                                                                                                                                                                                <td><?= h($questionario->cirurgia) ?></td>
                                                                                                                                                                                                                                                <td><?= h($questionario->outra_razao) ?></td>
                                                                                                                                                                                                                                                <td><?= h($questionario->created) ?></td>
                                                                                                                                                                                                                                                <td><?= h($questionario->modified) ?></td>
                                                                        <td class="actions">
                <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $questionario->id], ['escape'=>false, 'class'=>'btn btn-default', 'data-tooltip'=>'tooltip', 'title'=>'Visualizar', 'data-toggle'=>'modal', 'data-target'=>'.view']) ?>
                <?= $this->Html->link('<i class="fas fa-pencil-alt"></i>', ['action' => 'edit', $questionario->id], ['escape'=>false, 'class'=>'btn btn-default', 'data-tooltip'=>'tooltip', 'title'=>'Editar']) ?>
                <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $questionario->id], ['escape'=>false, 'class'=>'btn btn-default', 'confirm' => __('Deseja realmente excluir # {0}?', $questionario->id), 'data-tooltip'=>'tooltip', 'title'=>'Excluir']) ?>
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

