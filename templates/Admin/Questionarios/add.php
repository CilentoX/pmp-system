<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionario $questionario
 * @var \Cake\Collection\CollectionInterface|string[] $alunos
 */
?>

<?= $this->Form->create($questionario, ['class' => 'formulario-cadastro']) ?>
<h5 class="text-center">QUESTIONÁRIO DE PRONTIDÃO PARA ATIVIDADE FÍSICA </h5>
<p class="text-center">Este questionário tem o objetivo de identificar a necessidade de avaliação por um médico antes do
    início ou aumento de nível da atividade física. Por favor, assinale ‘‘sim’’ ou ‘‘não’’ às seguintes perguntas: </p>
<?= $this->Form->control('alunos_id', ['options' => $alunos, 'class' => 'form-control']); ?>
<?= $this->Form->control('coracao', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => '1 - Algum médico disse que você possui algum problema de coração ou pressão arterial, e que somente deveria realizar atividade física supervisionado por Profissionais de Saúde?', 'required']); ?>
<?= $this->Form->control('dor_peito', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => '2 - Você sente dores no peito quando pratica uma  atividade física?', 'required']); ?>
<?= $this->Form->control('dor_peito_mes', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => '3 - No último mês você sentiu dores no peito ao praticar atividade física  ou quando não estava praticando atividade física?', 'required']); ?>
<?= $this->Form->control('tontura', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => '4 - Você apresenta algum desequilíbrio devido à tontura e/ou perda momentânea da conciência?', 'required']); ?>
<?= $this->Form->control('articular', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => '5 -Você possui algum problema ósseo ou articular, que pode ser afetado ou agravado pela atividade física?', 'required']); ?>
<?= $this->Form->control('tratamento', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => '6 -Você realiza algum tipo de tratamento médico para diabetes, fibromialgia, doenças degenerativas(câncer, lúpus), para pressão arterial ou  problemas cardíacos?', 'required']); ?>
<?= $this->Form->control('cirurgia', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => '7 - Você já se submeteu a algum tipo de cirurgia, que comprometa de alguma forma a atividade física?', 'required']); ?>
<?= $this->Form->control('outra_razao', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => '8 - Sabe de alguma outra razão pela qual a atividade física possa eventualmente comprometer sua saúde?', 'required']); ?>
<div class="form-check">
    <?= $this->Form->control('declaro', ['type' => 'checkbox', 'class' => 'form-check-input', 'label' => 'Declaro que estou ciente de que é obrigatória a entrega do atestado médico no prazo de 30 dias para a prática de atividade física, assumindo plena responsabilidade pela veracidade das informações acima.', 'required']); ?>
</div>

<div class="form-group text-right">
    <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>










