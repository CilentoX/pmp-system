<html>
<head>
    <meta charset="utf-8">
    <title>Agita Petrópolis</title>
    <style>
        html, body {
            margin: 10px;
        }

        * {
            font-size: 10px;
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
        .text-danger{
            color: #dc3545;
        }
    </style>
</head>
<body>
<table width="100%">
    <tr>
        <td width="20%" style="text-align: center">
            <img style="width: 120px;"
                 src="https://www.petropolis.rj.gov.br/sel/agita/img/logo-agita.png">
        </td>
        <td width="60%" style="text-align: center">
            <h3 class="text-center">
                <?= $curso->modalidade->nome?> <br>
                <?= $curso->nucleo->nome?><br>
                <?= $curso->usuario->nome?>
            </h3>

        </td>
        <td width="20%" style="text-align: center">
            <img style="width: 200px;" src="https://www.petropolis.rj.gov.br/sel/agita/img/logo-secretaria.png">
        </td>
    </tr>
</table>
<br>
<table class="table table-hover table-bordered table-striped">
    <thead>
    <tr>
        <th>&nbsp;</th>
        <th></th>
        <?php $i = 0;?>
        <?php for ($i==0; $i<30; $i++): ?>
            <th></th>
        <?php endfor; ?>
        <th></th>
    </tr>
    <tr>
        <th>N.</th>
        <th>Nome</th>
        <?php $i = 0;?>
        <?php for ($i==0; $i<30; $i++): ?>
            <th></th>
        <?php endfor; ?>
        <th>Atestado</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($curso->alunos as $aluno): ?>
        <tr>
            <td style="width: 1px">
                <?= $aluno->id ?>
            </td>
            <td style="max-width: 120px">
                <?= $aluno->nome ?>
            </td>
            <?php $i = 0;?>
            <?php for ($i==0; $i<30; $i++): ?>
            <td style="width: 10px"></td>
            <?php endfor; ?>
            <td style="width: 43px">
                <?= $aluno->alunos_saudes && $aluno->alunos_saudes->validade_atestado ? $aluno->alunos_saudes->validade_atestado : '<span class="text-danger">Sem data</span>'?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
