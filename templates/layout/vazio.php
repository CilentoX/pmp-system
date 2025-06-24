<?php $titulos = $this->Admin->traduzir($this->request->getParam('controller'), $this->request->getParam('action')); ?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Prefeitura de Petrópolis</title>
    <?= $this->Html->meta('icon') ?>

    <!-- =============== INCLUDE CSS =============== -->
    <!-- Bootstrap 3.3.5 -->
    <?= $this->Html->css('/adminLTE.3.1.0/plugins/fontawesome-free/css/all.min.css'); ?>
    <!-- SELECT 2 -->
    <?= $this->Html->css('/adminLTE.3.1.0/plugins/select2/css/select2.min.css'); ?>
    <!-- ICHECK -->
    <?= $this->Html->css('/adminLTE.3.1.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>
    <!-- jQuery UI -->
    <?= $this->Html->css('/adminLTE.3.1.0/plugins/jquery-ui/jquery-ui.min'); ?>
    <!-- Theme style -->
    <?= $this->Html->css('/adminLTE.3.1.0/dist/css/adminlte.min.css'); ?>
    <!-- OverlayScrollbars -->
    <?= $this->Html->css('/adminLTE.3.1.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- STYLE CUSTOM -->
    <?= $this->Html->css('style'); ?>


    <!-- =============== INCLUDE JS =============== -->
    <!-- jQuery  -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/jquery/jquery.min.js'); ?>
    <!-- jQuery UI -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/jquery-ui/jquery-ui.min.js'); ?>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>
    <!-- SELECT 2 -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/select2/js/select2.full.min.js'); ?>
    <!-- overlayScrollbars -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>
    <!-- JQUERY VALIDATE -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/jquery-validation/jquery.validate.min.js'); ?>
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/jquery-validation/localization/messages_pt_BR.min.js'); ?>
    <!-- Bootstrap Switch -->
    <?= $this->Html->script('/adminLTE.3.1.0/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>
    <!-- AdminLTE App -->
    <?= $this->Html->script('/adminLTE.3.1.0/dist/js/adminlte.js'); ?>
    <!-- CUSTOM SISTEMA -->
    <script type="text/javascript">
        const baseDir = '<?=  \Cake\Routing\Router::url('/'); ?>';
        var csrfToken = '<?= $this->request->getCookie('csrfToken') ?>';
    </script>
    <?= $this->Html->script('/js/custom.js'); ?>
    <?= $this->Html->script('/js/script.js'); ?>
</head>
<body>
<!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?= $this->fetch('content') ?>
            </div>
        </section><!-- /.content -->
</body>
</html>
