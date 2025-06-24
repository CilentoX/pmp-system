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
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->create($cursosAluno) ?>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('cpf', ['label' => 'CPF', 'class' => 'form-control cpf', 'required']); ?>
        <p class="text-info"><i class="fas fa-info-circle"></i> Informe seu CPF</p>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('codigo_acesso', ['label' => 'Código de Acesso', 'class' => 'form-control', 'required']); ?>
        <p class="text-info"><i class="fas fa-info-circle"></i> Informe o código de Acesso informado no comprovante de
            Inscrição</p>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="btn btn-default reenviar"><i class="fas fa-envelope"></i> Reenviar Código por email</div>
    </div>
    <div class="col-md-4">
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Matricular</button>
        </div>
    </div>
</div>

<?= $this->Form->end() ?>
<script>
    $('.reenviar').on('click', function () {
        let cpf = $('.cpf').val()
        if (cpf == '') {
            alert('Prencha o CPF!');
            $('.cpf').focus();
        }else{
            window.location.href = baseDir + 'alunos/reenviar-codigo/' + cpf;
        }
    });
</script>
