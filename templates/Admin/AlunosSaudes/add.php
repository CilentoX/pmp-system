<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AlunosSaude $alunosSaude
 * @var \Cake\Collection\CollectionInterface|string[] $alunos
 */

$optionsTiposSanguineos = [
    'A+' => 'A+',
    'B+' => 'B+',
    'AB+' => 'AB+',
    'O+' => 'O+',
    'A-' => 'A-',
    'B-' => 'B-',
    'AB-' => 'AB-',
    'O-' => 'O-'
];
?>
<?= $this->Form->create($alunosSaude, ['type' => 'file', 'class' => 'formulario-cadastro']) ?>

<?= $this->Form->control('alunos_id', ['options' => $alunos, 'class' => 'form-control']); ?>

<?= $this->Form->control('plano_saude', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Possui plano de Saúde?', 'required']); ?>
<?= $this->Form->control('plano_saude_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
<?= $this->Form->control('tipo_sanguineo', ['type' => 'radio', 'options' => $optionsTiposSanguineos, 'class' => 'radio-large', 'label' => 'Qual seu tipo Sanguíneo? ']); ?>
<?= $this->Form->control('remedio_regular', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Faz uso de algum remédio regularmente?', 'required']); ?>
<?= $this->Form->control('remedio_regular_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
<?= $this->Form->control('deficiencia', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Possui alguma deficiência?', 'required']); ?>
<?= $this->Form->control('deficiencia_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
<?= $this->Form->control('doenca_respiratoria', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Possui alguma doença respiratória?', 'required']); ?>
<?= $this->Form->control('doenca_respiratoria_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
<?= $this->Form->control('doenca_historico', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Possui histórico de doença na família?', 'required']); ?>
<?= $this->Form->control('doenca_historico_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
<?= $this->Form->control('cirurgia', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Fez alguma cirurgia nos últimos 5 anos?', 'required']); ?>
<?= $this->Form->control('cirurgia_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
<?= $this->Form->control('alergia', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Tem alergia a algum tipo de medicamento?', 'required']); ?>
<?= $this->Form->control('alergia_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
<?= $this->Form->control('atividade_fisica', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Já praticou ou pratica alguma atividade física supervisionada?', 'required']); ?>
<?= $this->Form->control('atividade_fisica_qual', ['label' => 'Qual? Quantas vezes na semana?', 'class' => 'form-control']); ?>
<?= $this->Form->control('atividade_fisica_restricao', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Tem alguma restrição a atividade física?', 'required']); ?>
<?= $this->Form->control('atividade_fisica_restricao_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
<?= $this->Form->control('fuma', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large', 'label' => 'Você fuma?', 'required']); ?>
<div class="row">
    <div class="col-md-8">
        <label for="arquivo_atestado">Anexar o atestado Médico</label>
        <?= $this->Form->file('arquivo_atestado', ['class' => 'form-control-file', 'required' => 'required']); ?>
    </div>
    <div class="col-md-4">
        <?= $this->Form->control('validade_atestado', ['class' => 'form-control']); ?>
    </div>
</div>
<div class="form-group text-right">
    <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>

<script>
    $(document).ready(function () {
        $('[id$="qual"]').parent().hide();
        $('.verifica_sim').on('change', function () {
            let valor = $(this).val();
            let proxQual = $(this).parent().parent().next('.form-group');
            if (valor == 1) {
                proxQual.find('input').prop('required', true);
                proxQual.show();
            } else {
                proxQual.find('input').prop('required', false);
                proxQual.hide();
            }

        });
    });

</script>
