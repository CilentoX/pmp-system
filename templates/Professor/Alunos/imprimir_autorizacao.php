<html>
<head>
    <meta charset="utf-8">
    <title>Agita Petrópolis</title>
    <style>

        * {
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

        .table td {
            padding: 2px;
            border: 1px solid #CCC;
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
<p class="text-center">
    <strong>
        AGITA PETRÓPOLIS <br><br><br>
        AUTORIZAÇÃO DO USO E IMAGEM E VOZ<br><br><br>
    </strong>
</p>
<p style="text-align: justify-all; font-size: 16px; line-height: 38px;">
    <?php if ($aluno->responsavel_legal): ?>
        Neste ato, e para todos os fins em direito admitidos, eu,_________________________________ <br>__________________________________________________________________, portador do documento de identidade nº _________________________ responsável legal do (a) aluno (a)
        <strong><?= $aluno->nome ?></strong>, autorizo expressamente a utilização de sua imagem e voz, em caráter
        definitivo e gratuito, constante em fotos e filmagens decorrentes de sua participação no projeto.
    <?php else: ?>
        Neste ato, e para todos os fins em direito admitidos, eu,
        <strong><?= $aluno->nome ?></strong>, portador do documento de identidade nº
        <strong><?= $aluno->rg ?></strong>, autorizo expressamente a utilização da minha imagem e voz, em caráter definitivo
        e gratuito, constante em fotos e filmagens decorrentes da minha participação no
        projeto.
    <?php endif; ?>
</p>
<br>
<br>
<br>
<table style="width: 100%">
    <tr>
        <td style="width: 40%;">Petrópolis, <?= date('d/m/Y'); ?></td>
        <td>
            <div style="border-top: 1px solid #000; text-align: center; width: 100% ">
                <?php if ($aluno->responsavel_legal): ?>
                    Assinatura do Responsável Legal
                <?php else: ?>
                    Assinatura
                <?php endif; ?>

            </div>
        </td>
    </tr>
</table>
</body>
</html>
