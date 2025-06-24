<?php
declare(strict_types=1);

namespace App\Controller\Admin;


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
        $condicao = [];
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

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curso = $this->Cursos->newEmptyEntity();
        if ($this->request->is('post')) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(__('Salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $modalidades = $this->Cursos->Modalidades->find('list', ['valueField' => 'nome', 'limit' => 200])->all();
        $nucleos = $this->Cursos->Nucleos->find('list', ['valueField' => 'nome', 'limit' => 200])->all();
        $usuarios = $this->Cursos->Usuarios->find('list', ['valueField' => 'nome', 'limit' => 200])->where(['grupos_id' => 2])->all();
        $this->set(compact('curso', 'modalidades', 'nucleos', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => ['Modalidades', 'Usuarios', 'Nucleos', 'DiasHorarios'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            //APAGA TODOS OS DIAS E HORÀRIOS
            $this->Cursos->DiasHorarios->deleteAll(['cursos_id' => $id]);
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $modalidades = $this->Cursos->Modalidades->find('list', ['valueField' => 'nome', 'limit' => 200])->all();
        $nucleos = $this->Cursos->Nucleos->find('list', ['valueField' => 'nome', 'limit' => 200])->all();
        $usuarios = $this->Cursos->Usuarios->find('list', ['valueField' => 'nome', 'limit' => 200])->where(['grupos_id' => 2])->all();
        $this->set(compact('curso', 'modalidades', 'usuarios', 'nucleos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curso = $this->Cursos->get($id);
        if ($this->Cursos->delete($curso)) {
            $this->Flash->success(__('Excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
