<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno $aluno
 */
?>
<div class="row">
    <div class="col-md-4">
        <?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-default']); ?>
    </div>
    <div class="col-md-8 text-right">
        <?= $this->Html->link('<i class="fas fa-pencil-alt"></i>', ['action' => 'edit', $aluno->id], ['escape' => false, 'class' => 'btn btn-default', 'data-tooltip' => 'tooltip', 'title' => 'Editar']) ?>
        <?= $this->Html->link('<i class="fas fa-print"></i> Autorização do Uso de Imagem e Voz', ['action' => 'imprimir-autorizacao', $aluno->id], ['class' => 'btn btn-default', 'escape' => false, 'target'=>'_blank']); ?>
        <?= $this->Html->link('<i class="fas fa-print"></i> Ficha de Inscrição', ['action' => 'imprimir', $aluno->id], ['class' => 'btn btn-default', 'escape' => false, 'target'=>'_blank']); ?>
    </div>
</div>
<h5 class="text-center"><strong>FICHA DE INSCRIÇÃO</strong></h5>
<div class="view-detalhes">
    <div class="row">
        <div class="col-md-1">
            <strong><?= __('ID') ?></strong><br>
            <?= $this->Number->format($aluno->id) ?>
        </div>
        <div class="col-md-8">
            <strong><?= __('Nome') ?></strong><br>
            <?= h($aluno->nome) ?>
        </div>
        <div class="col-md-3">
            <strong><?= __('E-mail') ?></strong><br>
            <?= h($aluno->email) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <strong><?= __('RG') ?></strong><br>
            <?= h($aluno->rg) ?> <br>
            <a href="<?= $this->Url->build('/uploads/arquivos/' . $aluno->cpf . '/' . $aluno->arquivo_rg) ?>"
               target=" _blank" class="btn btn-default btn-block">
                <i class="far fa-save"></i> Cópia do R.G.
            </a>
        </div>
        <div class="col-md-3">
            <strong><?= __('CPF') ?></strong><br>
            <?= h($aluno->cpf) ?><br>
            <a href="<?= $this->Url->build('/uploads/arquivos/' . $aluno->cpf . '/' . $aluno->arquivo_cpf) ?>"
               target=" _blank" class="btn btn-default btn-block">
                <i class="far fa-save"></i> Cópia do CPF
            </a>
        </div>
        <div class="col-md-3">
            <strong><?= __('Data Nascimento') ?></strong><br>
            <?= h($aluno->data_nascimento) ?>
        </div>
        <div class="col-md-3">
            <strong><?= __('Telefone') ?></strong><br>
            <?= h($aluno->telefone) ?>
        </div>
    </div>
    <?php if ($aluno->responsavel_legal && $aluno->grau_parentesco): ?>
        <div class="row">
            <div class="col-md-8">
                <strong><?= __('Responsável Legal') ?></strong><br>
                <?= h($aluno->responsavel_legal) ?>
            </div>
            <div class="col-md-4">
                <strong><?= __('Grau de Parentesco') ?></strong><br>
                <?php $graus = [1 => 'Pai', 2 => 'Mãe', 3 => 'Tio(a)', 4 => 'Avô(ó)', 5 => 'Irmão(ã)', 0 => 'Outro']; ?>
                <?= $aluno->grau_parentesco != 0 ? $graus[$aluno->grau_parentesco] : $aluno->grau_parentesco_outro; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-3">
            <strong><?= __('CEP') ?></strong><br>
            <?= h($aluno->cep) ?>
        </div>
        <div class="col-md-9">
            <strong><?= __('Endereço') ?></strong><br>
            <?= h($aluno->endereco) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <strong><?= __('Bairro') ?></strong><br>
            <?= h($aluno->bairro) ?>
        </div>
        <div class="col-md-6">
            <strong><?= __('Município') ?></strong><br>
            <?= h($aluno->municipio) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php if ($aluno->arquivo_comprovante_residencia): ?>
                <a href="<?= $this->Url->build('/uploads/arquivos/' . $aluno->cpf . '/' . $aluno->arquivo_comprovante_residencia) ?>"
                   target=" _blank" class="btn btn-default btn-block">
                    <i class="far fa-save"></i> Cópia do Comprovante de Residência
                </a>
            <?php else: ?>
                <strong><?= __('Cópia do Comprovante de Residência') ?></strong><br>
                Não enviado
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Como ficou sabendo do projeto?') ?></strong><br>
            <?= $aluno->como_soube == 'Outro' ? $aluno->como_soube_outro : $aluno->como_soube ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <strong><?= __('Cadastrado em') ?></strong><br>
            <?= h($aluno->created) ?>
        </div>
        <div class="col-md-6">
            <strong><?= __('Modificado em') ?></strong><br>
            <?= h($aluno->modified) ?>
        </div>
    </div>
</div>
<br>
<h5 class="text-center"><strong>INFORMAÇÕES DE SAÚDE</strong></h5>
<div class="view-detalhes">
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Possui plano Saúde?') ?></strong>
            <?= $aluno->alunos_saude->plano_saude ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->plano_saude_qual) : __('<span class="text-danger">Não</span>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Qual seu tipo Sanguíneo?') ?></strong>
            <?= $aluno->alunos_saude->tipo_sanguineo; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Faz uso de algum remédio regularmente?') ?></strong>
            <?= $aluno->alunos_saude->remedio_regular ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->remedio_regular_qual) : __('<span class="text-danger">Não</span>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Possui alguma deficiência?') ?></strong>
            <?= $aluno->alunos_saude->deficiencia ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->deficiencia_qual) : __('<span class="text-danger">Não</span>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Possui alguma doença respiratória?') ?></strong>
            <?= $aluno->alunos_saude->doenca_respiratoria ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->doenca_respiratoria_qual) : __('<span class="text-danger">Não</span>'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Possui histórico de doença na família?') ?></strong>
            <?= $aluno->alunos_saude->doenca_historico ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->doenca_historico_qual) : __('<span class="text-danger">Não</span>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Fez alguma cirurgia nos últimos 5 anos?') ?></strong>
            <?= $aluno->alunos_saude->cirurgia ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->cirurgia_qual) : __('<span class="text-danger">Não</span>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Tem alergia a algum tipo de medicamento?') ?></strong>
            <?= $aluno->alunos_saude->alergia ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->alergia_qual) : __('<span class="text-danger">Não</span>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Já praticou ou pratica alguma atividade física supervisionada?') ?></strong>
            <?= $aluno->alunos_saude->atividade_fisica ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->atividade_fisica_qual) : __('<span class="text-danger">Não</span>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong><?= __('Tem alguma restrição a atividade física?') ?></strong>
            <?= $aluno->alunos_saude->atividade_fisica_restricao ? __('<span class="text-success">Sim</span>: ' . $aluno->alunos_saude->atividade_fisica_restricao_qual) : __('<span class="text-danger">Não</span>'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 ">
            <strong><?= __('Você fuma?') ?></strong>
            <?= $aluno->alunos_saude->fuma ? __('<span class="text-success">Sim</span>') : __('<span class="text-danger">Não</span>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php if ($aluno->alunos_saude->arquivo_atestado): ?>
                <a href="<?= $this->Url->build('/uploads/arquivos/' . $aluno->cpf . '/' . $aluno->alunos_saude->arquivo_atestado) ?>"
                   target=" _blank" class="btn btn-default btn-block">
                    <i class="far fa-save"></i> Cópia do Atestado Médico.
                </a>
            <?php else: ?>
                <strong><?= __('Cópia do Atestado Médico') ?></strong><br>
                Não anexado
            <?php endif; ?>
        </div>
        <?php if ($aluno->alunos_saude->validade_atestado): ?>
            <div class="col-md-6">
                <strong><?= __('Validade do Atestado') ?></strong><br>
                <?= $aluno->alunos_saude->validade_atestado ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<br>
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
        <h5 class="text-center"><strong>Aulas</strong></h5>
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
<div class="form-group">
    <?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-default']); ?>
</div>
