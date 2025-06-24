<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * Questionarios Controller
 *
 * @property \App\Model\Table\QuestionariosTable $Questionarios
 * @method \App\Model\Entity\Questionario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionariosController extends AppController
{
        /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Alunos'],
        ];
        $questionarios = $this->paginate($this->Questionarios);

        $this->set(compact('questionarios'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Questionario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $questionario = $this->Questionarios->get($id, [
            'contain' => ['Alunos'],
        ]);

        $this->set(compact('questionario'));
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $questionario = $this->Questionarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $questionario = $this->Questionarios->patchEntity($questionario, $this->request->getData());
            if ($this->Questionarios->save($questionario)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $alunos = $this->Questionarios->Alunos->find('list', ['limit' => 200])->all();
        $this->set(compact('questionario', 'alunos'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Questionario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $questionario = $this->Questionarios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $questionario = $this->Questionarios->patchEntity($questionario, $this->request->getData());
            if ($this->Questionarios->save($questionario)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $alunos = $this->Questionarios->Alunos->find('list', ['limit' => 200])->all();
        $this->set(compact('questionario', 'alunos'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Questionario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $questionario = $this->Questionarios->get($id);
        if ($this->Questionarios->delete($questionario)) {
            $this->Flash->success(__('Excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
