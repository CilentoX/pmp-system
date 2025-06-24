<?php
declare(strict_types=1);

namespace App\Controller\Admin;
class RelatoriosController extends AppController
{
    /**
     * Cursos method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function cursos()
    {
        $cursosTable = $this->fetchTable('Cursos');
        $relatorio = [];

        // Total de cursos
        $relatorio['total_cursos'] = $cursosTable->find()->count();

        // Total de vagas
        $totalVagas = $cursosTable->find()
            ->select(['total_vagas' => $cursosTable->find()->func()->sum('vagas')])
            ->first();
        $relatorio['total_vagas'] = $totalVagas->total_vagas;

        // Total de matriculados com status = 1
        $relatorio['total_matriculados'] = $cursosTable->CursosAlunos->find()
            ->distinct(['alunos_id'])
            ->where(['status' => 1])
            ->count();

        // Total de modalidades
        $relatorio['total_modalidades'] = $cursosTable->Modalidades->find()->count();

        // Total por Modalidade
        $queryModalidade = $cursosTable->find()->contain('Modalidades');
        $queryModalidade->select([
            'Modalidades.nome',
            'count' => $queryModalidade->func()->sum('Cursos.vagas')
        ])
            ->group('Cursos.modalidades_id')
            ->order(['count' => 'DESC']);
        $relatorio['por_modalidade'] = $queryModalidade->all();

        // Total por Núcleo
        $queryNucleo = $cursosTable->find()->contain('Nucleos');
        $queryNucleo->select([
            'Nucleos.nome',
            'count' => $queryNucleo->func()->sum('Cursos.vagas')
        ])
            ->group('Cursos.nucleos_id')
            ->order(['count' => 'DESC']);
        $relatorio['por_nucleo'] = $queryNucleo->all();

        $this->set(compact('relatorio'));
    }

    /**
     * Alunos method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function alunos()
    {
        $alunos = $this->fetchTable('Alunos');
        $relatorio = [];
        $relatorio['total_alunos'] = $alunos->find()->count();

        $relatorio['total_matriculados'] = $alunos->CursosAlunos->find()
            ->distinct(['alunos_id'])
            ->where(['status' => 1])
            ->count();

        $relatorio['total_espera'] = $alunos->CursosAlunos->find()
            ->distinct(['alunos_id'])
            ->where(['status' => 2])
            ->count();

        $relatorio['total_cancelados'] = $alunos->CursosAlunos->find()
            ->distinct(['alunos_id'])
            ->where(['status' => 0])
            ->count();

        $faixa_etaria = [];
        $dataAtual = new \DateTime(); // Data atual

        // Criança (0-11 anos)
        $crianca = clone $dataAtual;
        $crianca->modify("-11 years");
        $faixa_etaria['crianca'] = $alunos->find()
            ->where(['data_nascimento >=' => $crianca->format('Y-m-d')])
            ->count();

        // Adolescente (12-17 anos)
        $adolescente = clone $crianca;
        $adolescente->modify("-6 years");
        $faixa_etaria['adolescente'] = $alunos->find()
            ->where([
                'data_nascimento <=' => $crianca->format('Y-m-d'),
                'data_nascimento >=' => $adolescente->format('Y-m-d')
            ])
            ->count();

        // Jovem (18-29 anos)
        $jovem = clone $adolescente;
        $jovem->modify("-12 years");
        $faixa_etaria['jovem'] = $alunos->find()
            ->where([
                'data_nascimento <=' => $adolescente->format('Y-m-d'),
                'data_nascimento >=' => $jovem->format('Y-m-d')
            ])
            ->count();

        // Adulto (30-59 anos)
        $adulto = clone $jovem;
        $adulto->modify("-30 years");
        $faixa_etaria['adulto'] = $alunos->find()
            ->where([
                'data_nascimento <=' => $jovem->format('Y-m-d'),
                'data_nascimento >=' => $adulto->format('Y-m-d')
            ])
            ->count();

        // Idoso (60+ anos)
        $faixa_etaria['idoso'] = $alunos->find()
            ->where(['data_nascimento <=' => $adulto->format('Y-m-d')])
            ->count();


        $this->set(compact('relatorio', 'faixa_etaria'));

    }

}
