<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso[]|\Cake\Collection\CollectionInterface $cursos
 */
?>
<h1 class="text-center">Pré-inscrição</h1>
<br>
<p class="text-center text-secondary">Escolha uma modalidade pra começar</p>
<?= $this->Form->create(null, ['type' => 'GET', 'url' => ['action' => 'index']]); ?>
<?php $this->Form->setTemplates(['inputContainer' => '{{content}}']); ?>
<div class="row">
    <div class="col-md-4">
        <?= $this->Form->control('modalidades_id', ['label' => false, 'options' => $modalidades, 'class' => 'form-control', 'empty' => 'Modalidade >>>', 'value' => $this->request->getQuery('modalidades_id')]); ?>
    </div>
    <div class="col-md-4">
        <?= $this->Form->control('nucleos_id', ['label' => false, 'options' => $nucleos, 'class' => 'form-control', 'empty' => 'Núcleo >>>', 'value' => $this->request->getQuery('nucleos_id')]); ?>
    </div>
    <div class="col-md-4">
        <div class="input-group">
            <?= $this->Form->control('idade_minima', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Idade Mínima', 'value' => $this->request->getQuery('idade_minima')]); ?>
            <div class="input-group-append">
                <?php echo $this->Html->link('<i class="fas fa-eraser"></i> Limpar', ['action' => 'index'], ['class' => 'btn btn-default', 'escape' => false]); ?>
                <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i> Filtrar</button>
            </div>
        </div>
    </div>
</div>

<?= $this->Form->end(); ?>
<br>
<div class="row">
    <?php foreach ($cursos as $curso): ?>
        <?php $total_ocupadas = count($curso->cursos_alunos) ?>
        <div class="col-md-4">
            <div class="card card-outline">
                <div class="card-header">
                    <h4 class="m-0"><?= $curso->modalidade->nome ?></h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($curso->dias_horarios)): ?>
                        <i class="far fa-calendar-alt"
                           style="color: #0A7B4F; font-size: 1.4rem; float: left; margin-right: 3px; display: block;min-height: 26px;"></i>
                        <div class="card-detalhes text-secondary">
                            <?php foreach ($curso->dias_horarios as $diasHorarios): ?>
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
                                das <?= $diasHorarios->horario_inicio ? $this->Time->format($diasHorarios->horario_inicio, 'HH:mm') : ''; ?> às <?= $diasHorarios->horario_fim ? $this->Time->format($diasHorarios->horario_fim, 'HH:mm') : '' ?>
                                <br/>
                            <?php endforeach; ?>
                        </div>
                        <div class="clearfix"></div>
                    <?php endif; ?>
                    <div class="text-secondary">
                        <i class="far fa-user"
                           style="color: #0A7B4F;font-size: 1.4rem"></i> <?= $curso->usuario->nome ?>
                    </div>
                    <div class="text-secondary">
                        <i class="far fa-calendar-times"
                           style="color: #0A7B4F;font-size: 1.4rem"></i> Idade Mínima:
                        <strong><?= $curso->idade_minima ?> anos</strong>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-secondary" style="font-size: 0.9rem">
                        <i class="fas fa-map-marker-alt"></i> <?= $curso->nucleo->nome ?>
                    </div>
                    <small style="color: #009F59"><?= $curso->nucleo->endereco ?> - <?= $curso->nucleo->bairro ?>
                        - <?= $curso->nucleo->telefone ?></small>
                    <?php if ($curso->vagas - $total_ocupadas == 0): ?>
                        <a href="<?= $this->Url->build(['controller' => 'Alunos', 'action' => 'add', $curso->id]) ?>"
                           class="btn btn-secondary btn-sm btn-block">Cadastro de Reserva</a>

                    <?php else: ?>
                        <a href="<?= $this->Url->build(['controller' => 'Alunos', 'action' => 'add', $curso->id]) ?>"
                           class="btn btn-verde-site btn-sm btn-block">Inscreva-se</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>