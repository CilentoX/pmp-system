<?php
declare(strict_types=1);

namespace App\Controller\Professor;


/**
 * Cursos Controller
 *
 * @property \App\Model\Table\CursosTable $Cursos
 * @method \App\Model\Entity\Curso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $condicao = ['usuarios_id' => $this->Auth->User('id')];
        if ($this->request->getQuery('modalidades_id')) {
            $condicao['modalidades_id'] = $this->request->getQuery('modalidades_id');
        }
        if ($this->request->getQuery('nucleos_id')) {
            $condicao['nucleos_id'] = $this->request->getQuery('nucleos_id');
        }
        if ($this->request->getQuery('usuarios_id')) {
            $condicao['usuarios_id'] = $this->request->getQuery('usuarios_id');
        }
        if ($this->request->getQuery('idade_minima')) {
            $condicao['idade_minima'] = $this->request->getQuery('idade_minima');
        }

        $cursos = $this->Cursos->find()->contain(['Modalidades', 'Usuarios', 'Nucleos', 'CursosAlunos' => function ($q) {
            return $q->where(['status' => 1]);
        }])->where($condicao);
        $this->paginate($cursos);


        $modalidades = $this->Cursos->Modalidades->find('list', ['valueField' => 'nome', 'limit' => 200])->all();
        $nucleos = $this->Cursos->Nucleos->find('list', ['valueField' => 'nome', 'limit' => 200])->all();
        $usuarios = $this->Cursos->Usuarios->find('list', ['valueField' => 'nome', 'limit' => 200])->where(['grupos_id' => 2])->all();
        $this->set(compact('cursos', 'modalidades', 'nucleos', 'usuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => ['Modalidades', 'Usuarios', 'Alunos', 'Nucleos', 'DiasHorarios', 'CursosAlunos' => function ($q) {
                return $q->where(['status' => 1]);
            }],
        ]);

        $this->set(compact('curso'));
    }

    /**
     * View method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function pauta($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => ['Modalidades', 'Usuarios', 'Nucleos', 'Alunos' => function ($q) {
                return $q->where(['status' => 1]);
            }],
        ]);
        $this->set(compact('curso'));
        $this->viewBuilder()->setLayout('pdf');
    }
}
