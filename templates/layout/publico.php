<?php $titulos = $this->Admin->traduzir($this->request->getParam('controller'), $this->request->getParam('action'));
$usuario = $this->request->getSession()->read('Auth.User');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="description" content="Agita Petrópolis"/>
    <meta itemprop="name" content="Agita Petrópolis">
    <meta itemprop="description" content="Agita Petrópolis">
    <meta property="og:title" content="Agita Petrópolis"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://www.petropolis.rj.gov.br/sel/agita/"/>
    <meta property="og:image" content="https://www.petropolis.rj.gov.br/sel/agita/img/logo-og.jpg"/>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="600">
    <meta property="og:site_name" content="Agita Petrópolis"/>
    <meta property="og:description" content="Agita Petrópolis"/>

    <title>Prefeitura de Petrópolis</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>

    <!-- =============== INCLUDE CSS =============== -->
    <!-- Bootstrap 3.3.5 -->
    <?= $this->Html->css('/adminLTE.3.1.0/plugins/fontawesome-free/css/all.min.css'); ?>
    <?= $this->Html->css('/adminLTE.3.1.0/plugins/jquery-ui/jquery-ui.min'); ?>
    <!-- Theme style -->
    <?= $this->Html->css('/adminLTE.3.1.0/dist/css/adminlte.min.css'); ?>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- STYLE CUSTOM -->
    <?= $this->Html->css('style'); ?>

    <!-- =============== INCLUDE JS =============== -->
    <!-- jQuery  -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/jquery/jquery.min.js'); ?>
    <!-- jQuery UI -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/jquery-ui/jquery-ui.min.js'); ?>
    <!-- JQUERY VALIDATE -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/jquery-validation/jquery.validate.min.js'); ?>
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/jquery-validation/localization/messages_pt_BR.min.js'); ?>
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/jquery-validation/additional-methods.js'); ?>
    <!-- INPUTMASK-->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/inputmask/jquery.inputmask.js'); ?>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>

    <!-- Bootstrap Switch -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>
    <script type="text/javascript">
        let baseDir = '<?=  \Cake\Routing\Router::url('/'); ?>';
        var csrfToken = '<?= $this->request->getCookie('csrfToken') ?>';
    </script>
    <!-- AdminLTE App -->
    <?= $this->Html->script('/adminLTE.3.1.0/dist/js/adminlte.js'); ?>
    <?= $this->Html->script('/js/script.js'); ?>
</head>
<body>
<header class="header-publico">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <a href="<?= $this->Url->build('/') ?>">
                    <?= $this->Html->image('/img/logo-agita.png', ['class' => 'img-fluid', 'style' => 'max-width: 180px']) ?>
                </a>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <a href="https://www.petropolis.rj.gov.br/">
                    <?= $this->Html->image('/img/logo-secretaria.png', ['class' => 'img-fluid', 'style' => 'margin-top: 20px']) ?>
                </a>
            </div>
        </div>
    </div>
</header>
<br>
<br>
<section class="content">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</section>
<footer class="clearfix">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-3">
                <?= $this->Html->image('/img/logo-agita.png', ['class' => 'img-fluid', 'style' => 'max-width: 180px']) ?>
            </div>
            <div class="col-sm-6">
                <p class="text-center">
                    <strong>Secretaria de Esportes, Promoção da Saúde, Juventude, Idoso e Lazer</strong><br>
                    Rua Dezesseis de Março, 183 - Centro<br>
                    <strong>CEP:</strong> 25620-040 - Petrópolis - RJ<br>
                    <strong>TELEFONE:</strong> (24) 2249-6803<br>

                </p>
            </div>
            <div class="col-sm-3">
                <?= $this->Html->image('/img/logo-secretaria.png', ['class' => 'img-fluid', 'style' => 'margin-top: 20px']) ?>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
