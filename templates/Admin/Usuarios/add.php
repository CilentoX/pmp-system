<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 * @var \Cake\Collection\CollectionInterface|string[] $grupos
 */
?>

<?= $this->Form->create($usuario, ['class' => 'formulario-cadastro-usuario']) ?>
<div class="row">
    <div class="col-md-3 ">
        <?= $this->Form->control('grupos_id', ['label'=>'Grupo','options' => $grupos, 'class' => 'form-control', 'value'=> 2]); ?>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <?= $this->Form->control('nome', ['label' => 'Nome Completo', 'class' => 'form-control']); ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('cpf', ['label' => 'CPF', 'id' => 'cpf', 'class' => 'form-control cpf']); ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('email', ['label' => 'E-mail', 'type' => 'email', 'class' => 'form-control']); ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('telefone', ['label' => 'Celular', 'class' => 'form-control telefone']); ?>
    </div>
    <div class="col-md-6">
    <?= $this->Form->control('senha', ['type' => 'password', 'id' => 'senha', 'class' => 'form-control']); ?>
    </div>
        <div class="col-md-6">
    <?= $this->Form->control('confsenha', ['label' => 'Confirmar Senha', 'type' => 'password', 'id' => 'confSenha', 'class' => 'form-control']); ?>
        </div>
</div>

<div class="form-group text-right">
    <?= $this->Html->link('<i class="fas fa-ban"></i> Cancelar', ['action' => 'index'], ['class' => 'btn btn-default', 'escape'=> false]); ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>