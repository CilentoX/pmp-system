<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $relatorio['total_cursos'] ?></h3>
                <p>Total de Aulas Ativas</p>
            </div>
            <div class="icon">
                <i class="fas fa-child"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $relatorio['total_vagas'] ?></h3>
                <p>Total de Vagas</p>
            </div>
            <div class="icon">
                <i class="far fa-flag"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
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
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $relatorio['total_modalidades'] ?></h3>
                <p>Modalidades</p>
            </div>
            <div class="icon">
                <i class="fas fa-list"></i>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title"><i class="fa fa-user-md"></i> Vagas por Modalidade</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <tbody>
                        <tr>
                            <th>Modalidade</th>
                            <th>Gráfico</th>
                            <th class="text-center">Vagas</th>
                        </tr>
                        <?php
                        $vagas_total = 0;
                        foreach ($relatorio['por_modalidade'] as $total):
                            $vagas_total += $total['count'];
                            ?>
                            <tr>
                                <td><?= $total['modalidade']['nome']; ?></td>
                                <td>
                                    <progress id="file" value="<?= $total['count'] / $relatorio['total_vagas'] * 100; ?>" max="100"> <?= $total['count'] / $relatorio['total_vagas'] * 100; ?>% </progress>

                                </td>
                                <td class="text-center"><?= $total['count'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <table class="table table-hover">
                    <tr>
                        <td><strong>Total</strong></td>
                        <td class="text-right"><?= $vagas_total ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div id="grafico_modalidades"></div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title"><i class="fa fa-user-md"></i> Vagas por Núcleo</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <tbody>
                        <tr>
                            <th>Núcleo</th>
                            <th>Gráfico</th>
                            <th class="text-center">Vagas</th>
                        </tr>
                        <?php
                        $vagas_total = 0;
                        foreach ($relatorio['por_nucleo'] as $total):
                            $vagas_total += $total['count'];
                            ?>
                            <tr>
                                <td><?= $total['nucleo']['nome']; ?></td>
                                <td>
                                    <progress id="file" value="<?= $total['count'] / $relatorio['total_vagas'] * 100; ?>" max="100"> <?= $total['count'] / $relatorio['total_vagas'] * 100; ?>% </progress>

                                </td>
                                <td class="text-center"><?= $total['count'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <table class="table table-hover">
                    <tr>
                        <td><strong>Total</strong></td>
                        <td class="text-right"><?= $vagas_total ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div id="grafico_nucleos"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(grafico_modalidades);
    function grafico_modalidades() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            <?php foreach ($relatorio['por_modalidade'] as $total): ?>
            ['<?= h($total['modalidade']['nome']); ?>', <?= $total['count'] ?>],
            <?php endforeach; ?>
        ]);
        var options = {
            'title': 'Aulas por Modalidade',
            'width': 650,
            'height': 300,
            'pieSliceText': 'value'
        };
        var chart = new google.visualization.PieChart(document.getElementById('grafico_modalidades'));
        chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(grafico_nucleos);
    function grafico_nucleos() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            <?php foreach ($relatorio['por_nucleo'] as $total): ?>
            ['<?= h($total['nucleo']['nome']); ?>', <?= $total['count'] ?>],
            <?php endforeach; ?>
        ]);
        var options = {
            'title': 'Aulas por Núcleo',
            'width': 650,
            'height': 300,
            'pieSliceText': 'value'
        };
        var chart = new google.visualization.PieChart(document.getElementById('grafico_nucleos'));
        chart.draw(data, options);
    }


</script>
