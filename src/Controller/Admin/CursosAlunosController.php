<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * CursosAlunos Controller
 *
 * @property \App\Model\Table\CursosAlunosTable $CursosAlunos
 * @method \App\Model\Entity\CursosAluno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursosAlunosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cursos'],
        ];
        $cursosAlunos = $this->paginate($this->CursosAlunos);

        $this->set(compact('cursosAlunos'));
    }

    /**
     * View method
     *
     * @param string|null $id Cursos Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cursosAluno = $this->CursosAlunos->get($id, [
            'contain' => ['Cursos'],
        ]);

        $this->set(compact('cursosAluno'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($cursos_id)
    {
        $cursosAluno = $this->CursosAlunos->newEmptyEntity();
        if ($this->request->is('post')) {
            $cursosAluno = $this->CursosAlunos->patchEntity($cursosAluno, $this->request->getData());
            $cursosAluno->cursos_id = $cursos_id;
            $cursosAluno->status = 1;
            if ($this->CursosAlunos->save($cursosAluno)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'add', $cursos_id]);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $curso = $this->CursosAlunos->Cursos->get($cursos_id, [
            'contain' => ['Modalidades', 'Usuarios', 'Alunos', 'Nucleos', 'DiasHorarios', 'CursosAlunos' => function ($q) {
                return $q->where(['status' => 1]);
            }],
        ]);
        $alunosMatriculados = $this->CursosAlunos->find()->contain(['Alunos'])->where(['cursos_id' => $cursos_id]);
        $alunosMatriculadosIds = '0';
        if ($alunosMatriculados->count() > 0) {
            $alunosMatriculadosIds = $alunosMatriculados->extract('alunos_id')->toArray();
        }
        $alunos = $this->CursosAlunos->Alunos->find('list', ['valueField' => 'nome'])->where(['id NOT IN' => $alunosMatriculadosIds])->order(['nome' => 'ASC'])->all();
        $this->set(compact('cursosAluno', 'curso', 'alunos', 'alunosMatriculados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cursos Aluno id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cursosAluno = $this->CursosAlunos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cursosAluno = $this->CursosAlunos->patchEntity($cursosAluno, $this->request->getData());
            if ($this->CursosAlunos->save($cursosAluno)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $cursos = $this->CursosAlunos->Cursos->find('list', ['limit' => 200])->all();
        $this->set(compact('cursosAluno', 'cursos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cursos Aluno id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cursosAluno = $this->CursosAlunos->get($id);
        if ($this->CursosAlunos->delete($cursosAluno)) {
            $this->Flash->success(__('Excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'add', $cursosAluno->cursos_id]);
    }

    /**
     * Status method
     *
     * @param string|null $id Cursos Aluno id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function status($id = null, $status = null)
    {
        $this->request->allowMethod(['post', 'put', 'get']);
        $cursosAluno = $this->CursosAlunos->get($id);
        $cursosAluno->status = $status;
        if ($this->CursosAlunos->save($cursosAluno)) {
            $this->Flash->success(__('Atualizado com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao atualizar. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'add', $cursosAluno->cursos_id]);
    }
}
