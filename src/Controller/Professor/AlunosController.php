<?php
declare(strict_types=1);

namespace App\Controller\Professor;


/**
 * Alunos Controller
 *
 * @property \App\Model\Table\AlunosTable $Alunos
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlunosController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aluno = $this->Alunos->get($id, [
            'contain' => ['Cursos' => ['Modalidades', 'Nucleos', 'Usuarios'], 'AlunosSaudes', 'Questionarios'],
        ]);
        $this->set(compact('aluno'));
    }

    /**
     * Imprimir method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function imprimir($id = null)
    {
        $aluno = $this->Alunos->get($id, [
            'contain' => ['Cursos' => ['Modalidades', 'Nucleos', 'Usuarios'], 'AlunosSaudes', 'Questionarios'],
        ]);
        $this->viewBuilder()->setLayout('pdf');
        $this->set(compact('aluno'));
    }

    /**
     * Imprimir method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function imprimirAutorizacao($id = null)
    {
        $aluno = $this->Alunos->get($id, [
            'contain' => ['Cursos' => ['Modalidades', 'Nucleos', 'Usuarios'], 'AlunosSaudes', 'Questionarios'],
        ]);
        $this->viewBuilder()->setLayout('pdf');
        $this->set(compact('aluno'));
    }

}
