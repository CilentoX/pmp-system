<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $relatorio['total_alunos'] ?></h3>
                <p>Total de Alunos Cadastrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-child"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $relatorio['total_matriculados'] ?></h3>
                <p>Matriculados</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-signature"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $relatorio['total_espera'] ?></h3>
                <p>Na fila de espera</p>
            </div>
            <div class="icon">
                <i class="fas fa-hourglass"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $relatorio['total_cancelados'] ?></h3>
                <p>Com matrícula cancelada</p>
            </div>
            <div class="icon">
                <i class="fas fa-ban"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title"><i class="fa fa-user-md"></i> Alunos por Faixa Etária</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            // Animação da barra de progresso
                            document.querySelectorAll(".progress-bar").forEach(function (bar) {
                                let width = bar.getAttribute("data-value");
                                bar.style.width = width + "%";
                            });
                        });
                    </script>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Faixa Etária</th>
                            <th>Gráfico</th>
                            <th class="text-center">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $faixas = [
                            'Criança' => 'crianca',
                            'Adolescente' => 'adolescente',
                            'Jovem' => 'jovem',
                            'Adulto' => 'adulto',
                            'Idoso' => 'idoso'
                        ];

                        foreach ($faixas as $label => $key):
                            $percentual = ($relatorio['total_alunos'] > 0)
                                ? ($faixa_etaria[$key] / $relatorio['total_alunos'] * 100)
                                : 0;
                            ?>
                            <tr>
                                <td><?= $label ?></td>
                                <td>
                                    <div class="progress-container">
                                        <div class="progress-bar" data-value="<?= $percentual ?>">
                                            <?= number_format($percentual, 1, ',', '.') ?>%
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center"><?= $faixa_etaria[$key] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
                <table class="table table-hover">
                    <tr>
                        <td><strong>Total</strong></td>
                        <td class="text-right"><?= $relatorio['total_alunos'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div id="grafico_alunos_faixa_etaria"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(grafico_alunos_faixa_etaria);

    function grafico_alunos_faixa_etaria() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            <?php foreach ($relatorio['por_modalidade'] as $total): ?>
            ['<?= h($total['modalidade']['nome']); ?>', <?= $total['count'] ?>],
            <?php endforeach; ?>
        ]);
        var options = {
            'title': 'Alunos por Faixa Etária',
            'width': 650,
            'height': 300,
            'pieSliceText': 'value'
        };
        var chart = new google.visualization.PieChart(document.getElementById('grafico_alunos_faixa_etaria'));
        chart.draw(data, options);
    }
</script>
