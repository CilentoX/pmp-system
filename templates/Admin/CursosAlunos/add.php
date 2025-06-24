<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CursosAluno $cursosAluno
 * @var \Cake\Collection\CollectionInterface|string[] $cursos
 */
?>
<h5 class="text-center"><strong>Matricular</strong></h5>
<div class="view-detalhes">
    <div class="row">
        <div class="col-md-4">
            <strong><?= __('Modalidade') ?></strong><br>
            <?= $curso->has('modalidade') ? $this->Html->link($curso->modalidade->nome, ['controller' => 'Modalidades', 'action' => 'view', $curso->modalidade->id]) : '' ?>
        </div>
        <div class="col-md-4">
            <strong><?= __('Núcleo') ?></strong><br>
            <?= $curso->has('nucleo') ? $this->Html->link($curso->nucleo->nome, ['controller' => 'Nucleos', 'action' => 'view', $curso->nucleo->id]) : '' ?>
        </div>
        <div class="col-md-4">
            <strong><?= __('Professor') ?></strong><br>
            <?= $curso->has('usuario') ? $this->Html->link($curso->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $curso->usuario->id]) : '' ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <strong>Cadastrado em</strong><br>
            <?= h($curso->created) ?>
        </div>
        <div class="col-md-3">
            <strong>Total de Vagas</strong><br>
            <?= h($curso->vagas) ?>
        </div>
        <div class="col-md-3">
            <strong class="text-info">Ocupadas</strong><br>
            <?= $total_ocupadas = count($curso->cursos_alunos) ?>
        </div>
        <div class="col-md-3">
            <strong class="text-success">Livres</strong><br>
            <?= $curso->vagas - $total_ocupadas; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <?php if (!empty($curso->dias_horarios)): ?>
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>Dia da Semana</th>
                            <th class="text-center">Horário de Início</th>
                            <th class="text-center">Horário de Término</th>
                        </tr>
                        <?php foreach ($curso->dias_horarios as $diasHorarios): ?>
                            <tr>
                                <td>
                                    <?php
                                    switch ($diasHorarios->dia_semana) {
                                        case 0:
                                            echo "Domingo";
                                            break;
                                        case 1:
                                            echo "Segunda-feira";
                                            break;
                                        case 2:
                                            echo "Terça-feira";
                                            break;
                                        case 3:
                                            echo "Quarta-feira";
                                            break;
                                        case 4:
                                            echo "Quinta-feira";
                                            break;
                                        case 5:
                                            echo "Sexta-feira";
                                            break;
                                        case 6:
                                            echo "Sábado";
                                            break;
                                    }
                                    ?>
                                </td>
                                <td class="text-center"><?= $diasHorarios->horario_inicio ? $this->Time->format($diasHorarios->horario_inicio, 'HH:mm') : ''; ?></td>
                                <td class="text-center"><?= $diasHorarios->horario_fim ? $this->Time->format($diasHorarios->horario_fim, 'HH:mm') : '' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p class="text-info text-center">Nenhuma agenda cadastrada!</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->create($cursosAluno) ?>
<?= $this->Form->control('alunos_id', ['class' => 'form-control']); ?>

<div class="form-group text-right">
    <?= $this->Html->link('<i class="fas fa-ban"></i> Cancelar', ['controller' => 'cursos', 'action' => 'index'], ['class' => 'btn btn-default', 'escape' => false]); ?>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Incluir Aluno</button>
</div>
<?= $this->Form->end() ?>
<h5 class="text-center">Alunos Matriculados</h5>
<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th>Situação</th>
            <th><?= $this->Paginator->sort('created', 'Cadastrado em') ?></th>
            <th class="actions"><?= __('Opções') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($curso->alunos as $aluno): ?>
            <tr>
                <td><?= h($aluno->nome) ?></td>
                <td><strong>
                        <?php
                        if ($aluno->_joinData->status == 0) {
                            echo '<span class="text-danger">Inativo</span>';
                        } elseif ($aluno->_joinData->status == 1) {
                            echo '<span class="text-success">Ativo</span>';
                        } else {
                            echo '<span class="text-info">Na fila</span>';
                        }
                        ?>
                    </strong>
                </td>
                <td><?= h($aluno->created) ?></td>
                <td class="actions">
                    <?php if ($aluno->_joinData->status == 0): ?>
                        <?= $this->Form->postLink('<i class="fas fa-user-edit"></i> Matricular', ['controller' => 'cursos-alunos', 'action' => 'status', $aluno->_joinData->id, 1], ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Deseja realmente matricular no curso # {0}?', $aluno->nome), 'data-tooltip' => 'tooltip', 'title' => 'Matricular']) ?>
                        <?= $this->Form->postLink('<i class="fas fa-list"></i> Na fila', ['controller' => 'cursos-alunos', 'action' => 'status', $aluno->_joinData->id, 2], ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Deseja realmente colocar na fila # {0}?', $aluno->nome), 'data-tooltip' => 'tooltip', 'title' => 'Na fila']) ?>
                    <?php elseif ($aluno->_joinData->status == 1): ?>
                        <?= $this->Form->postLink('<i class="fas fa-list"></i> Na fila', ['controller' => 'cursos-alunos', 'action' => 'status', $aluno->_joinData->id, 2], ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Deseja realmente colocar na fila # {0}?', $aluno->nome), 'data-tooltip' => 'tooltip', 'title' => 'Na fila']) ?>
                        <?= $this->Form->postLink('<i class="fas fa-ban"></i> Remover', ['controller' => 'cursos-alunos', 'action' => 'status', $aluno->_joinData->id, 0], ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Deseja realmente remover do curso # {0}?', $aluno->nome), 'data-tooltip' => 'tooltip', 'title' => 'Remover da Aula']) ?>
                    <?php else: ?>
                        <?= $this->Form->postLink('<i class="fas fa-user-edit"></i> Matricular', ['controller' => 'cursos-alunos', 'action' => 'status', $aluno->_joinData->id, 1], ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Deseja realmente matricular no curso # {0}?', $aluno->nome), 'data-tooltip' => 'tooltip', 'title' => 'Matricular']) ?>
                        <?= $this->Form->postLink('<i class="fas fa-ban"></i> Remover', ['controller' => 'cursos-alunos', 'action' => 'status', $aluno->_joinData->id, 0], ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Deseja realmente remover do curso # {0}?', $aluno->nome), 'data-tooltip' => 'tooltip', 'title' => 'Remover da Aula']) ?>
                    <?php endif; ?>
                    <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['controller' => 'cursos-alunos', 'action' => 'delete', $aluno->_joinData->id], ['escape' => false, 'class' => 'btn btn-danger', 'confirm' => __('Deseja realmente excluir do curso # {0}?', $aluno->nome), 'data-tooltip' => 'tooltip', 'title' => 'Excluir da Aula']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


