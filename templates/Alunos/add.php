<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno $aluno
 * @var \Cake\Collection\CollectionInterface|string[] $cursos
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

<?= $this->Form->create($aluno, ['type' => 'file', 'class' => 'formulario-cadastro']) ?>
<h5 class="text-center"><strong>FICHA DE INSCRIÇÃO</strong></h5>
<div class="card">
    <div class="card-body">
        <div class="view-detalhes bg-gray-light">
            <div class="row m-0">
                <div class="col-md-6">
                    <strong><?= __('Modalidade') ?></strong><br>
                    <?= $curso->has('modalidade') ? $curso->modalidade->nome : '' ?>
                </div>
                <div class="col-md-6">
                    <strong><?= __('Núcleo') ?></strong><br>
                    <?= $curso->has('nucleo') ? $curso->nucleo->nome : '' ?>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <?php if (!empty($curso->dias_horarios)): ?>
                            <table class="table table-hover table-striped table-sm">
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
        <br>
        <div class="row">
            <div class="col-md-8">
                <?= $this->Form->control('nome', ['class' => 'form-control']); ?>
            </div>
            <div class="col-md-4">
                <?= $this->Form->control('email', ['label' => 'E-mail', 'class' => 'form-control email']); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $this->Form->control('rg', ['label' => 'RG', 'class' => 'form-control']); ?>
                <label for="arquivo_rg">Anexar cópia do R.G.</label>
                <?= $this->Form->file('arquivo_rg', ['label' => false, 'class' => 'form-control-file']); ?>
            </div>
            <div class="col-md-3">
                <?= $this->Form->control('cpf', ['label' => 'CPF', 'class' => 'form-control cpf']); ?>
                <label for="arquivo_cpf">Anexar cópia do CPF</label>
                <?= $this->Form->file('arquivo_cpf', ['label' => false, 'class' => 'form-control-file']); ?>
            </div>
            <div class="col-md-3">
                <?= $this->Form->control('data_nascimento', ['label' => 'Data de Nascimento', 'class' => 'form-control data_nascimento']); ?>
            </div>
            <div class="col-md-3">
                <?= $this->Form->control('telefone', ['class' => 'form-control telefone']); ?>
            </div>
        </div>

        <div class="respLegal">
            <hr>
            <p class="text-info text-center"><strong>Menor de 18 anos, somente com a autorização do Responsável
                    Legal</strong></p>
            <div class="row">
                <div class="col-md-8">
                    <?= $this->Form->control('responsavel_legal', ['label' => 'Responsável Legal', 'class' => 'form-control']); ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Form->control('grau_parentesco', ['class' => 'form-control grau_parentesco', 'options' => [1 => 'Pai', 2 => 'Mãe', 3 => 'Tio(a)', 4 => 'Avô(ó)', 5 => 'Irmão(ã)', 0 => 'Outro'], 'empty' => 'Selecione >>>', 'style' => 'width: 100%']); ?>
                    <?= $this->Form->control('grau_parentesco_outro', ['label' => false, 'class' => 'form-control grau_parentesco_outro', 'placeholder' => 'Descreva...']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $this->Form->control('cep', ['label' => 'CEP', 'class' => 'form-control cep']); ?>
            </div>
            <div class="col-md-9">
                <?= $this->Form->control('endereco', ['label' => 'Endereço', 'class' => 'form-control']); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->control('bairro', ['class' => 'form-control']); ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('municipio', ['label' => 'Município', 'class' => 'form-control']); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="arquivo_atestado">Anexar um Comprovante de Residência</label>
                <?= $this->Form->file('alunos_saude.arquivo_comprovante_residencia', ['class' => 'form-control-file']); ?>
                <div class="text-info">
                    Anexar um comprovante de residência ou providenciar e entregar na Secretaria de Esportes
                </div>
            </div>
        </div>
        <?php $como_soube = ['Banner/Cartaz' => 'Banner/Cartaz', 'Boca a boca' => 'Boca a boca', 'Internet' => 'Internet', 'TV' => 'TV', 'Na escola' => 'Na escola', 'Associação de moradores' => 'Associação de moradores', 'Outro' => 'Outro'] ?>
        <?= $this->Form->control('como_soube', ['label' => 'Como ficou sabendo do projeto?', 'class' => 'form-control como_soube', 'options' => $como_soube, 'empty' => 'Selecione >>>']); ?>
        <?= $this->Form->control('como_soube_outro', ['label' => false, 'class' => 'form-control como_soube_outro', 'placeholder' => 'Descreva...']); ?>
    </div>
</div>
<h5 class="text-center"><strong>INFORMAÇÕES DE SAÚDE</strong></h5>
<div class="card">
    <div class="card-body">
        <?= $this->Form->control('alunos_saude.plano_saude', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Possui plano de Saúde?', 'required']); ?>
        <?= $this->Form->control('alunos_saude.plano_saude_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
        <?= $this->Form->control('alunos_saude.tipo_sanguineo', ['type' => 'radio', 'options' => $optionsTiposSanguineos, 'class' => 'radio-large', 'label' => 'Qual seu tipo Sanguíneo? ']); ?>
        <?= $this->Form->control('alunos_saude.remedio_regular', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Faz uso de algum remédio regularmente?', 'required']); ?>
        <?= $this->Form->control('alunos_saude.remedio_regular_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
        <?= $this->Form->control('alunos_saude.deficiencia', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Possui alguma deficiência?', 'required']); ?>
        <?= $this->Form->control('alunos_saude.deficiencia_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
        <?= $this->Form->control('alunos_saude.doenca_respiratoria', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Possui alguma doença respiratória?', 'required']); ?>
        <?= $this->Form->control('alunos_saude.doenca_respiratoria_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
        <?= $this->Form->control('alunos_saude.doenca_historico', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Possui histórico de doença na família?', 'required']); ?>
        <?= $this->Form->control('alunos_saude.doenca_historico_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
        <?= $this->Form->control('alunos_saude.cirurgia', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Fez alguma cirurgia nos últimos 5 anos?', 'required']); ?>
        <?= $this->Form->control('alunos_saude.cirurgia_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
        <?= $this->Form->control('alunos_saude.alergia', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Tem alergia a algum tipo de medicamento?', 'required']); ?>
        <?= $this->Form->control('alunos_saude.alergia_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
        <?= $this->Form->control('alunos_saude.atividade_fisica', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Já praticou ou pratica alguma atividade física supervisionada?', 'required']); ?>
        <?= $this->Form->control('alunos_saude.atividade_fisica_qual', ['label' => 'Qual? Quantas vezes na semana?', 'class' => 'form-control']); ?>
        <?= $this->Form->control('alunos_saude.atividade_fisica_restricao', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large verifica_sim', 'label' => 'Tem alguma restrição a atividade física?', 'required']); ?>
        <?= $this->Form->control('alunos_saude.atividade_fisica_restricao_qual', ['label' => 'Qual?', 'class' => 'form-control']); ?>
        <?= $this->Form->control('alunos_saude.fuma', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large', 'label' => 'Você fuma?', 'required']); ?>
        <div class="row">
            <div class="col-md-12">
                <label for="arquivo_atestado">Anexar o atestado Médico</label>
                <?= $this->Form->file('alunos_saude.arquivo_atestado', ['class' => 'form-control-file']); ?>
                <div class="text-info">
                    Anexar o atestado ou providenciar o atestado e entregar na Secretaria de Esportes
                </div>
            </div>
        </div>
    </div>
</div>
<h5 class="text-center"><strong>QUESTIONÁRIO DE PRONTIDÃO PARA ATIVIDADE FÍSICA</strong></h5>
<div class="card">
    <div class="card-body">
        <p class="text-center">Este questionário tem o objetivo de identificar a necessidade de avaliação por um médico
            antes do
            início ou aumento de nível da atividade física. Por favor, assinale ‘‘sim’’ ou ‘‘não’’ às seguintes
            perguntas: </p>
        <?= $this->Form->control('questionario.coracao', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large', 'label' => '1 - Algum médico disse que você possui algum problema de coração ou pressão arterial, e que somente deveria realizar atividade física supervisionado por Profissionais de Saúde?', 'required']); ?>
        <?= $this->Form->control('questionario.dor_peito', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large', 'label' => '2 - Você sente dores no peito quando pratica uma  atividade física?', 'required']); ?>
        <?= $this->Form->control('questionario.dor_peito_mes', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large', 'label' => '3 - No último mês você sentiu dores no peito ao praticar atividade física  ou quando não estava praticando atividade física?', 'required']); ?>
        <?= $this->Form->control('questionario.tontura', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large', 'label' => '4 - Você apresenta algum desequilíbrio devido à tontura e/ou perda momentânea da conciência?', 'required']); ?>
        <?= $this->Form->control('questionario.articular', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large', 'label' => '5 -Você possui algum problema ósseo ou articular, que pode ser afetado ou agravado pela atividade física?', 'required']); ?>
        <?= $this->Form->control('questionario.tratamento', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large', 'label' => '6 -Você realiza algum tipo de tratamento médico para diabetes, fibromialgia, doenças degenerativas(câncer, lúpus), para pressão arterial ou  problemas cardíacos?', 'required']); ?>
        <?= $this->Form->control('questionario.cirurgia', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large', 'label' => '7 - Você já se submeteu a algum tipo de cirurgia, que comprometa de alguma forma a atividade física?', 'required']); ?>
        <?= $this->Form->control('questionario.outra_razao', ['type' => 'radio', 'options' => ['0' => 'Não', '1' => 'Sim'], 'class' => 'radio-large', 'label' => '8 - Sabe de alguma outra razão pela qual a atividade física possa eventualmente comprometer sua saúde?', 'required']); ?>
        <div class="form-check">
            <?= $this->Form->control('declaro', ['type' => 'checkbox', 'class' => 'form-check-input checkbox-large', 'label' => 'Declaro que estou ciente de que é obrigatória a entrega do atestado médico no prazo de 30 dias para a prática de atividade física, assumindo plena responsabilidade pela veracidade das informações acima.', 'required']); ?>
        </div>
    </div>
</div>
<div class="form-check">
    <?= $this->Form->control('autorizo', ['type' => 'checkbox', 'class' => 'form-check-input checkbox-large', 'label' => '<span class="autorizo_mensagem">Autorizo expressamente a utilização da minha imagem e voz, em caráter definitivo e gratuito, constante em fotos e filmagens decorrentes da participação no projeto.</span>', 'required', 'escape' => false]); ?>
</div>
<div class="form-check">
    <?= $this->Form->control('atesto', ['type' => 'checkbox', 'class' => 'form-check-input checkbox-large', 'label' => 'Atesto que todas as informações fornecidas são verdadeiras.', 'required']); ?>
</div>
<div class="form-group text-right">
    <?= $this->Html->link('Voltar', ['controller' => 'Cursos', 'action' => 'index'], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>
<script>
    $('.grau_parentesco_outro').hide();
    $('.grau_parentesco').on('change', function () {
        if ($(this).val() == 0) {
            $('.grau_parentesco_outro').show();
        } else {
            $('.grau_parentesco_outro').hide();
        }
    });

    $('.como_soube_outro').hide();
    $('.como_soube').on('change', function () {
        if ($(this).val() == 'Outro') {
            $('.como_soube_outro').show();
        } else {
            $('.como_soube_outro').hide();
        }
    });
    $('.respLegal').hide();
    $('.data_nascimento').on('change', function () {
        const dateInput = $(this).val();
        const dataNasc = new Date(`${dateInput}T00:00:00`);
        const hoje = new Date();

        let idade = hoje.getFullYear() - dataNasc.getFullYear();
        const diferencaMes = hoje.getMonth() - dataNasc.getMonth();

        if (diferencaMes < 0 || (diferencaMes === 0 && hoje.getDate() < dataNasc.getDate())) {
            idade--;
        }

        if (idade <= 18) {
            $('.respLegal').show();
            $('#responsavel-legal').prop('required', true);
            $('#grau-parentesco').prop('required', true);
            $('.autorizo_mensagem').text('Autorizo expressamente a utilização de sua imagem e voz, em caráter definitivo e gratuito, constante em fotos e filmagens decorrentes de sua participação no projeto.');
        } else {
            $('.respLegal').hide();
            $('#responsavel-legal').prop('required', false);
            $('#responsavel-legal').val('');
            $('#grau-parentesco').prop('required', false);
            $('.autorizo_mensagem').text('Autorizo expressamente a utilização da minha imagem e voz, em caráter definitivo e gratuito, constante em fotos e filmagens decorrentes da participação no projeto.');
        }
    });

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

    $(".cep").on('focusout', function () {
        let cep = $(this).val().replace(/\D/g, ''); // Remove caracteres não numéricos
        let url = `https://viacep.com.br/ws/${cep}/json/`;
        $.getJSON(url, function (dados) {
            if ("erro" in dados) {
                console.log("CEP não encontrado!");
            } else {
                $("#endereco").val(dados.logradouro);
                $("#bairro").val(dados.bairro);
                $("#municipio").val(dados.localidade);
            }
        }).fail(function () {
            console.log("Erro ao buscar o CEP!");
        });
    });
    let curso_id = <?= $curso->id?>;
    $(".cpf, .email").on('focusout', function () {
        let url = baseDir + '/alunos/verifica/' + $(this).val();
        $.getJSON(url, function (dados) {
            if (dados == 1) {
                $(".formulario-cadastro :input").prop("disabled", true);
                alert('Este e-mail ou CPF já está cadastrado em nossa base de dados. Você será redirecionado para outra página para realizar a Inscrição!')
                window.location.href = baseDir + 'cursos-alunos/add/' + curso_id;
            }
        }).fail(function () {
            console.log("Erro ao buscar Dados!");
        });
    });
</script>