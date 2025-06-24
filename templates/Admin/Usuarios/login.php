<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 * @var \Cake\Collection\CollectionInterface|string[] $grupos
 */
?>
<div class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <?= $this->Html->link('Agita Petrópolis', ['prefix' => false, 'controller' => 'Usuarios', 'action' => 'index'], ['escape' => false]) ?>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><small>Informe os dados abaixo para iniciar sua sessão</small></p>
                <?= $this->Flash->render() ?>

                <?= $this->Form->create(); ?>
                <?= $this->Form->control('email', ['class' => 'form-control']); ?>
                <?= $this->Form->control('senha', ['type' => 'password', 'class' => 'form-control']); ?>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Lembrar Login
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </div>

                </div>
                <?= $this->Form->end(); ?>

                <p class="mb-1">
                    <?= $this->Html->link('Esqueci minha senha', ['prefix'=>false,'controller' => 'Usuarios', 'action' => 'recuperarSenha']) ?>
                </p>
            </div>

        </div>
    </div>
</div>
