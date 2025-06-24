<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso[]|\Cake\Collection\CollectionInterface $cursos
 */
?>

<div class="row">
    <div class="col-md-2 form-group">
        <?php echo $this->Html->link('Novo(a)', ['action' => 'add'], ['class' => 'btn btn-primary']); ?>
    </div>

    <div class="col-md-10 form-group">
        <?= $this->Form->create(null, ['type' => 'GET', 'url' => ['action' => 'index']]); ?>
        <?php $this->Form->setTemplates(['inputContainer' => '{{content}}']); ?>
        <div class="input-group">
            <?= $this->Form->control('modalidades_id', ['label' => false, 'options' => $modalidades, 'class' => 'form-control', 'empty' => 'Modalidade >>>', 'value'=> $this->request->getQuery('modalidades_id')]); ?>
            <?= $this->Form->control('nucleos_id', ['label' => false, 'options' => $nucleos, 'class' => 'form-control', 'empty' => 'Núcleo >>>', 'value'=> $this->request->getQuery('nucleos_id')]); ?>
            <?= $this->Form->control('usuarios_id', ['label' => false, 'options' => $usuarios, 'class' => 'form-control', 'empty' => 'Professor >>>', 'value'=> $this->request->getQuery('usuarios_id')]); ?>
            <?= $this->Form->control('idade_minima', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Idade Mínima', 'value'=> $this->request->getQuery('idade_minima')]); ?>
            <div class="input-group-append">
                <?php echo $this->Html->link('Limpar', ['action' => 'index'], ['class' => 'btn btn-default']); ?>
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
            <th><?= $this->Paginator->sort('modalidades_id', 'Modalidade') ?></th>
            <th><?= $this->Paginator->sort('nucleos_id', 'Núcleo') ?></th>
            <th><?= $this->Paginator->sort('usuarios_id', 'Professor') ?></th>
            <th><?= $this->Paginator->sort('idade_minima', 'Idade Mínima') ?></th>
            <th><?= $this->Paginator->sort('vagas', 'Vagas') ?></th>
            <th><span class="text-info">Ocupadas</span></th>
            <th><span class="text-success">Livres</span></th>
            <th><?= $this->Paginator->sort('created', 'Cadastrado em') ?></th>
            <th class="actions"><?= __('Opções') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cursos as $curso): ?>
            <tr>
                <td><?= $this->Number->format($curso->id) ?></td>
                <td><?= $curso->has('modalidade') ? $this->Html->link($curso->modalidade->nome, ['controller' => 'Modalidades', 'action' => 'view', $curso->modalidade->id]) : '' ?></td>
                <td><?= $curso->has('nucleo') ? $this->Html->link($curso->nucleo->nome, ['controller' => 'Nucleos', 'action' => 'view', $curso->nucleo->id]) : '' ?></td>
                <td><?= $curso->has('usuario') ? $this->Html->link($curso->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $curso->usuario->id]) : '' ?></td>
                <td><?= $curso->idade_minima ?></td>
                <td><?= $curso->vagas ?></td>
                <td><span class="text-info"><?= $total_ocupadas = count($curso->cursos_alunos) ?></span></td>
                <td><span class="text-success"><?= $curso->vagas - $total_ocupadas; ?></span></td>
                <td><?= h($curso->created->format('d/m/Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="far fa-file-pdf"></i> Pauta', ['action' => 'pauta', $curso->id], ['target' => '_blank', 'escape' => false, 'class' => 'btn btn-default', 'data-tooltip' => 'tooltip', 'title' => 'Pauta']) ?>
                    <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $curso->id], ['escape' => false, 'class' => 'btn btn-default', 'data-tooltip' => 'tooltip', 'title' => 'Visualizar']) ?>
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

