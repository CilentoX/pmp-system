<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso $curso
 */
?>

<h5 class="text-center"><strong>Aulas</strong></h5>
<div class="view-detalhes">
    <div class="row">
        <div class="col-md-4">
            <strong><?= __('Modalidade') ?></strong><br>
            <?= $curso->has('modalidade') ? $this->Html->link($curso->modalidade->nome, ['controller' => 'Modalidades', 'action' => 'view', $curso->modalidade->id]) : '' ?>
        </div>
        <div class="col-md-3">
            <strong><?= __('Núcleo') ?></strong><br>
            <?= $curso->has('nucleo') ? $this->Html->link($curso->nucleo->nome, ['controller' => 'Nucleos', 'action' => 'view', $curso->nucleo->id]) : '' ?>
        </div>
        <div class="col-md-4">
            <strong><?= __('Professor') ?></strong><br>
            <?= $curso->has('usuario') ? $this->Html->link($curso->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $curso->usuario->id]) : '' ?>
        </div>

        <div class="col-md-1">
            <strong><?= __('Idade Mínima') ?></strong><br>
            <?= $curso->idade_minima ?>
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
    <br> <?php if (!empty($curso->alunos)) : ?>
        <div class="related">
            <h5 class="text-center">Alunos Matriculados</h5>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Nome</th>
                        <th>Situação</th>
                        <th>Matriculado em</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach ($curso->alunos as $alunos) : ?>
                        <tr>
                            <td><?= h($alunos->nome) ?></td>
                            <td><strong>
                                    <?php
                                    if ($alunos->_joinData->status == 0) {
                                        echo '<span class="text-danger">Inativo</span>';
                                    } elseif ($alunos->_joinData->status == 1) {
                                        echo '<span class="text-success">Ativo</span>';
                                    } else {
                                        echo '<span class="text-info">Na fila</span>';
                                    }
                                    ?>
                                </strong>
                            </td>
                            <td><?= h($alunos->created->format('d/m/Y')) ?></td>
                            <td>
                                <?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'Alunos', 'action' => 'view', $alunos->id], ['escape' => false, 'class' => 'btn btn-default', 'data-tooltip' => 'tooltip', 'title' => 'Visualizar']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            Nenhum aluno matriculado!
        </div>
    <?php endif; ?>
</div>