<?= $this->Form->create($usuario, ['type' => 'POST', 'class' => 'form-dependentes-edit']); ?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Alterar Senha</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <div class="row">                    
        <div class="col-md-6 form-group">
            <?= $this->Form->input('senha', ['label' => 'Nova senha', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'A senha deve conter 8 dígitos', 'required' => 'required']); ?>
        </div>

        <div class="col-md-6 form-group">                            
            <?= $this->Form->input('conf_senha', ['label' => 'Confirme a nova senha', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'As senhas devem ser idênticas', 'required' => 'required']); ?>
        </div>
    </div>
</div>

<div class="modal-footer">
    <div class="form-group pull-right">            
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="far fa-times-circle"></i> Fechar</button>
        <button name="" class="btn btn-primary" type="submit"><i class="far fa-save"></i> Salvar</button>
    </div>
</div>
<?= $this->Form->end(); ?>