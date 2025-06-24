<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso $curso
 * @var \Cake\Collection\CollectionInterface|string[] $modalidades
 * @var \Cake\Collection\CollectionInterface|string[] $usuarios
 * @var \Cake\Collection\CollectionInterface|string[] $alunos
 */
?>

<?= $this->Form->create($curso, ['class' => 'formulario-cadastro']) ?>

<?= $this->Form->control('modalidades_id', ['label' => 'Modalidade', 'options' => $modalidades, 'class' => 'form-control', 'empty' => 'Selecione >>>']); ?>
<?= $this->Form->control('nucleos_id', ['label' => 'Núcleo', 'options' => $nucleos, 'class' => 'form-control', 'empty' => 'Selecione >>>']); ?>
<?= $this->Form->control('usuarios_id', ['label' => 'Professor', 'options' => $usuarios, 'class' => 'form-control', 'empty' => 'Selecione >>>']); ?>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('idade_minima', ['label' => 'Idade Mínima', 'class' => 'form-control']); ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('vagas', ['class' => 'form-control']); ?>
    </div>
</div>


<div class="dias_horarios">
    <h5 class="text-center"><strong>Dias e horários:</strong></h5>
    <div class="form-group pull-right">
        <button type="button" class="btn btn-primary adicionar_dia">
            <i class="fa fa-plus" aria-hidden="true"></i> Adicionar mais
        </button>
    </div>
    <div class="clearfix"></div>
    <ol style="list-style: none; padding: 0">
        <li>
            <div class="row">
                <div class="form-group col-md-4">
                    <?php echo $this->Form->control("dias_horarios.0.dia_semana", ['label' => 'Dia da Semana', 'class' => 'form-control', 'options' => [0 => 'Domingo', 1 => 'Segunda', 2 => 'Terça', 3 => 'Quarta', 4 => 'Quinta', 5 => 'Sexta', 6 => 'Sábado'], 'empty' => 'Selecione >>>', 'required' => true]); ?>
                </div>
                <div class="form-group col-md-4">
                    <?php echo $this->Form->control("dias_horarios.0.horario_inicio", ['type' => 'text', 'label' => 'Horário de Início', 'class' => 'form-control hora', 'required' => true]); ?>
                </div>
                <div class="form-group col-md-4">
                    <?php echo $this->Form->control("dias_horarios.0.horario_fim", ['type' => 'text', 'label' => 'Horário de Término', 'class' => 'form-control hora', 'required' => true]); ?>
                </div>
            </div>
        </li>
    </ol>
</div>

<div class="form-group text-right">
    <?= $this->Html->link('<i class="fas fa-ban"></i> Cancelar', ['action' => 'index'], ['class' => 'btn btn-default', 'escape' => false]); ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>
<script>
    /* ADICIONAR DIAS E HORARIOS */
    $('.adicionar_dia').click(function () {
        var li = $(this).parent('div').parent('div').find('ol').find('li');
        var options = $(li[0]).find('select').html();
        var html = '<li>';
        html += '<div class="row">';
        html += '<div class="form-group col-md-4">';
        html += '<div class="input select">';
        html += '<label>Dia da Semana</label>';
        html += '<select class="form-control" id="dias-horarios-' + li.length + '-dia-semana" name="dias_horarios[' + li.length + '][dia_semana]">';
        html += '<option value="">Selecione &gt;&gt;&gt;</option>';
        html += '<option value="0">Domingo</option>';
        html += '<option value="1">Segunda</option>';
        html += '<option value="2">Terça</option>';
        html += '<option value="3">Quarta</option>';
        html += '<option value="4">Quinta</option>';
        html += '<option value="5">Sexta</option>';
        html += '<option value="6">Sábado</option>';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '<div class="form-group col-md-4">';
        html += '<label>Horário de Abertura</label>';
        html += '<input class="form-control hora" id="dias-horarios-' + li.length + '-horario-inicio" maxlength="5" name="dias_horarios[' + li.length + '][horario_inicio]" type="text" value="' + $('#dias-horarios-0-horario-inicio').val() + '">';
        html += '</div>';
        html += '<div class="form-group col-md-3">';
        html += '<label>Horário de Término</label>';
        html += '<input class="form-control hora" id="dias-horarios-' + li.length + '-horario-fim" maxlength="5" name="dias_horarios[' + li.length + '][horario_fim]" type="text" value="' + $('#dias-horarios-0-horario-fim').val() + '">';
        html += '</div>';
        html += '   <div class="col-md-1">';
        html += '       <button class="pull-right btn btn-link btn-exc-dia" style="margin-top: 18px;"><i class="fa fa-times" aria-hidden="true"></i></button>';
        html += '   </div>';
        html += '</div>';
        html += '</li>';
        $(this).parent('div').parent('div').find('ol').append(html);
    });
    /* EXCLUI DIAS E HORARIOS */
    $('body').on('click', '.btn-exc-dia', function () {
        $(this).parent('div').parent('div').parent('li').remove();
    });
</script>

