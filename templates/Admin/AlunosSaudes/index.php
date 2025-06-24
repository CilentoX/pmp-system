<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AlunosSaude[]|\Cake\Collection\CollectionInterface $alunosSaudes
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
                            <th><?= $this->Paginator->sort('plano_saude') ?></th>
                            <th><?= $this->Paginator->sort('tipo_sanguineo') ?></th>
                            <th><?= $this->Paginator->sort('remedio_regular') ?></th>
                            <th><?= $this->Paginator->sort('remedio_regular_qual') ?></th>
                            <th><?= $this->Paginator->sort('arquivo_atestado') ?></th>
                            <th><?= $this->Paginator->sort('validade_atestado') ?></th>
                            <th><?= $this->Paginator->sort('modified') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th><?= $this->Paginator->sort('deficiencia') ?></th>
                            <th><?= $this->Paginator->sort('deficiencia_qual') ?></th>
                            <th><?= $this->Paginator->sort('doenca_respiratoria') ?></th>
                            <th><?= $this->Paginator->sort('doenca_respiratoria_qual') ?></th>
                            <th><?= $this->Paginator->sort('doenca_historico') ?></th>
                            <th><?= $this->Paginator->sort('doenca_historico_qual') ?></th>
                            <th><?= $this->Paginator->sort('cirurgia') ?></th>
                            <th><?= $this->Paginator->sort('cirurgia_qual') ?></th>
                            <th><?= $this->Paginator->sort('alergia') ?></th>
                            <th><?= $this->Paginator->sort('alergia_qual') ?></th>
                            <th><?= $this->Paginator->sort('atividade_fisica') ?></th>
                            <th><?= $this->Paginator->sort('atividade_fisica_qual') ?></th>
                            <th><?= $this->Paginator->sort('atividade_fisica_restricao') ?></th>
                            <th><?= $this->Paginator->sort('atividade_fisica_restricao_qual') ?></th>
                            <th><?= $this->Paginator->sort('fuma') ?></th>
                        <th class="actions"><?= __('Opções') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($alunosSaudes as $alunosSaude): ?>
        <tr>
                                                                                                                                                                                                            <td><?= $this->Number->format($alunosSaude->id) ?></td>
                                                                                                                                                                                    <td><?= $alunosSaude->has('aluno') ? $this->Html->link($alunosSaude->aluno->id, ['controller' => 'Alunos', 'action' => 'view', $alunosSaude->aluno->id]) : '' ?></td>
                                                                                                                                                                                                                                                                                        <td><?= h($alunosSaude->plano_saude) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->tipo_sanguineo) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->remedio_regular) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->remedio_regular_qual) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->arquivo_atestado) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->validade_atestado) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->modified) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->created) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->deficiencia) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->deficiencia_qual) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->doenca_respiratoria) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->doenca_respiratoria_qual) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->doenca_historico) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->doenca_historico_qual) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->cirurgia) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->cirurgia_qual) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->alergia) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->alergia_qual) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->atividade_fisica) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->atividade_fisica_qual) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->atividade_fisica_restricao) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->atividade_fisica_restricao_qual) ?></td>
                                                                                                                                                                                                                                                <td><?= h($alunosSaude->fuma) ?></td>
                                                                        <td class="actions">
                <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $alunosSaude->id], ['escape'=>false, 'class'=>'btn btn-default', 'data-tooltip'=>'tooltip', 'title'=>'Visualizar', 'data-toggle'=>'modal', 'data-target'=>'.view']) ?>
                <?= $this->Html->link('<i class="fas fa-pencil-alt"></i>', ['action' => 'edit', $alunosSaude->id], ['escape'=>false, 'class'=>'btn btn-default', 'data-tooltip'=>'tooltip', 'title'=>'Editar']) ?>
                <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $alunosSaude->id], ['escape'=>false, 'class'=>'btn btn-default', 'confirm' => __('Deseja realmente excluir # {0}?', $alunosSaude->id), 'data-tooltip'=>'tooltip', 'title'=>'Excluir']) ?>
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

