<html>
<head>
    <meta charset="utf-8">
    <title>Agita Petrópolis</title>
    <style>
        html, body {
            margin: 10px;
        }

        * {
            font-size: 12px;
            font-family: "Helvetica", sans-serif;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr th {
            border: 1px solid #f4f4f4;
            background-color: #fAfAfA;
            text-align: left;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table td {
            padding: 2px;
            border: 1px solid #CCC;
        }

        .text-danger {
            color: #dc3545;
        }

        .text-success {
            color: #28a745;
        }

        .text-center {
            text-align: center;
        }

    </style>
</head>
<body>
<table width="100%">
    <tr>
        <td width="25%" style="text-align: center">
            <img style="width: 120px;" src="https://www.petropolis.rj.gov.br/sel/agita/img/logo-agita.png">
        </td>
        <td width="50%" style="text-align: center">
        </td>
        <td width="25%" style="text-align: center">
            <img style="width: 200px;"
                 src="https://www.petropolis.rj.gov.br/sel/agita/img/logo-secretaria.png">
        </td>
    </tr>
</table>
<br>

<table width="100%">
    <tr>
        <td width="50%"><h1 class="text-center"><strong>FICHA DE INSCRIÇÃO</strong></h1></td>
        <td><h1 class="text-center">Código de Acesso:<strong> <?= $aluno->codigo_acesso ?></strong></h1></td>
    </tr>
</table>
<table class="table">
    <tbody>
    <tr>
        <td><strong><?= __('ID') ?></strong></td>
        <td><?= $this->Number->format($aluno->id) ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Nome') ?></strong></td>
        <td><?= h($aluno->nome) ?></td>
    </tr>
    <tr>
        <td><strong><?= __('E-mail') ?></strong></td>
        <td><?= h($aluno->email) ?></td>
    </tr>
    <tr>
        <td><strong><?= __('RG') ?></strong></td>
        <td><?= h($aluno->rg) ?></td>
    </tr>
    <tr>
        <td><strong><?= __('CPF') ?></strong></td>
        <td><?= h($aluno->cpf) ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Data Nascimento') ?></strong></td>
        <td><?= h($aluno->data_nascimento) ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Telefone') ?></strong></td>
        <td><?= h($aluno->telefone) ?></td>
    </tr>
    <?php if ($aluno->responsavel_legal && $aluno->grau_parentesco): ?>
        <tr>
            <td><strong><?= __('Responsável Legal') ?></strong></td>
            <td><?= h($aluno->responsavel_legal) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Grau de Parentesco') ?></strong></td>
            <td>
                <?php
                $graus = [
                    1 => 'Pai',
                    2 => 'Mãe',
                    3 => 'Tio(a)',
                    4 => 'Avô(ó)',
                    5 => 'Irmão(ã)',
                    0 => 'Outro'
                ];
                ?>
                <?= $aluno->grau_parentesco != 0 ? $graus[$aluno->grau_parentesco] : $aluno->grau_parentesco_outro; ?>
            </td>
        </tr>
    <?php endif; ?>
    <tr>
        <td><strong><?= __('CEP') ?></strong></td>
        <td><?= h($aluno->cep) ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Endereço') ?></strong></td>
        <td><?= h($aluno->endereco) ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Bairro') ?></strong></td>
        <td><?= h($aluno->bairro) ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Município') ?></strong></td>
        <td><?= h($aluno->municipio) ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Como ficou sabendo do projeto?') ?></strong></td>
        <td><?= $aluno->como_soube == 'Outro' ? $aluno->como_soube_outro : $aluno->como_soube ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Cadastrado em') ?></strong></td>
        <td><?= h($aluno->created) ?></td>
    </tr>
    </tbody>
</table>
<h5 class="text-center"><strong>INFORMAÇÕES DE SAÚDE</strong></h5>
<table class="table table-striped">
    <tbody>
    <tr>
        <td><strong><?= __('Possui plano Saúde?') ?></strong></td>
        <td><?= $aluno->alunos_saude->plano_saude ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->plano_saude_qual) : __('<span class="text-danger">Não</span>'); ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Qual seu tipo Sanguíneo?') ?></strong></td>
        <td><?= $aluno->alunos_saude->tipo_sanguineo; ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Faz uso de algum remédio regularmente?') ?></strong></td>
        <td><?= $aluno->alunos_saude->remedio_regular ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->remedio_regular_qual) : __('<span class="text-danger">Não</span>'); ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Possui alguma deficiência?') ?></strong></td>
        <td><?= $aluno->alunos_saude->deficiencia ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->deficiencia_qual) : __('<span class="text-danger">Não</span>'); ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Possui alguma doença respiratória?') ?></strong></td>
        <td><?= $aluno->alunos_saude->doenca_respiratoria ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->doenca_respiratoria_qual) : __('<span class="text-danger">Não</span>'); ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Possui histórico de doença na família?') ?></strong></td>
        <td><?= $aluno->alunos_saude->doenca_historico ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->doenca_historico_qual) : __('<span class="text-danger">Não</span>'); ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Fez alguma cirurgia nos últimos 5 anos?') ?></strong></td>
        <td><?= $aluno->alunos_saude->cirurgia ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->cirurgia_qual) : __('<span class="text-danger">Não</span>'); ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Tem alergia a algum tipo de medicamento?') ?></strong></td>
        <td><?= $aluno->alunos_saude->alergia ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->alergia_qual) : __('<span class="text-danger">Não</span>'); ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Já praticou ou pratica alguma atividade física supervisionada?') ?></strong></td>
        <td><?= $aluno->alunos_saude->atividade_fisica ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->atividade_fisica_qual) : __('<span class="text-danger">Não</span>'); ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Tem alguma restrição a atividade física?') ?></strong></td>
        <td><?= $aluno->alunos_saude->atividade_fisica_restricao ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->atividade_fisica_restricao_qual) : __('<span class="text-danger">Não</span>'); ?></td>
    </tr>
    <tr>
        <td><strong><?= __('Você fuma?') ?></strong></td>
        <td><?= $aluno->alunos_saude->fuma ? __('<span class="text-success">Sim</span>') : __('<span class="text-danger">Não</span>'); ?></td>
    </tr>
    </tbody>
</table>
<h5 class="text-center"><strong>QUESTIONÁRIO DE PRONTIDÃO PARA ATIVIDADE FÍSICA</strong></h5>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <td>
                1 - Algum médico disse que você possui algum problema de coração ou pressão arterial, e que somente
                deveria realizar atividade física supervisionado por Profissionais de Saúde?
            </td>
            <td>
                <?= $aluno->questionario->coracao ? __('<span class="text-success">Sim</span>') : __('<span class="text-danger">Não</span>'); ?>
            </td>
        </tr>
        <tr>
            <td>
                2 - Você sente dores no peito quando pratica uma atividade física?
            </td>
            <td>
                <?= $aluno->questionario->dor_peito ? __('<span class="text-success">Sim</span>') : __('<span class="text-danger">Não</span>'); ?>
            </td>
        </tr>
        <tr>
            <td>
                3 - No último mês você sentiu dores no peito ao praticar atividade física ou quando não estava
                praticando atividade física?
            </td>
            <td>
                <?= $aluno->questionario->dor_peito_mes ? __('<span class="text-success">Sim</span>') : __('<span class="text-danger">Não</span>'); ?>

            </td>
        </tr>
        <tr>
            <td>
                4 - Você apresenta algum desequilíbrio devido à tontura e/ou perda momentânea da conciência?
            </td>
            <td>
                <?= $aluno->questionario->tontura ? __('<span class="text-success">Sim</span>') : __('<span class="text-danger">Não</span>'); ?>
            </td>
        </tr>
        <tr>
            <td>
                5 -Você possui algum problema ósseo ou articular, que pode ser afetado ou agravado pela atividade
                física?
            </td>
            <td>
                <?= $aluno->questionario->articular ? __('<span class="text-success">Sim</span>') : __('<span class="text-danger">Não</span>'); ?>
            </td>
        </tr>
        <tr>
            <td>
                6 -Você realiza algum tipo de tratamento médico para diabetes, fibromialgia, doenças
                degenerativas(câncer, lúpus), para pressão arterial ou problemas cardíacos?
            </td>
            <td>
                <?= $aluno->questionario->tratamento ? __('<span class="text-success">Sim</span>') : __('<span class="text-danger">Não</span>'); ?>
            </td>
        </tr>
        <tr>
            <td>
                7 - Você já se submeteu a algum tipo de cirurgia, que comprometa de alguma forma a atividade física?
            </td>
            <td>
                <?= $aluno->questionario->cirurgia ? __('<span class="text-success">Sim</span>') : __('<span class="text-danger">Não</span>'); ?>
            </td>
        </tr>
        <tr>
            <td>
                8 - Sabe de alguma outra razão pela qual a atividade física possa eventualmente comprometer sua saúde?
            </td>
            <td>
                <?= $aluno->questionario->outra_razao ? __('<span class="text-success">Sim</span>') : __('<span class="text-danger">Não</span>'); ?>
            </td>
        </tr>
    </table>
</div>

<?php if (!empty($aluno->cursos)) : ?>
    <div class="related">
        <h5 class="text-center"><strong>Modalidade(s) Inscrita(s)</strong></h5>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th><?= 'ID' ?></th>
                    <th><?= 'Modalidade' ?></th>
                    <th><?= 'Núcleo' ?></th>
                    <th><?= 'Professor' ?></th>
                    <th><?= 'Cadastrado em' ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($aluno->cursos as $curso): ?>
                    <tr>
                        <td><?= $this->Number->format($curso->id) ?></td>
                        <td><?= $curso->has('modalidade') ? $curso->modalidade->nome : '' ?></td>
                        <td><?= $curso->has('nucleo') ? $curso->nucleo->nome : '' ?></td>
                        <td><?= $curso->has('usuario') ? $this->Html->link($curso->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $curso->usuario->id], ['data-toggle' => 'modal', 'data-target' => '.view']) : '' ?></td>
                        <td><?= h($curso->created) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>


</body>
</html>
