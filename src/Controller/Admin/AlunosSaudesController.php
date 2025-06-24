<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * AlunosSaudes Controller
 *
 * @property \App\Model\Table\AlunosSaudesTable $AlunosSaudes
 * @method \App\Model\Entity\AlunosSaude[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlunosSaudesController extends AppController
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
        $alunosSaudes = $this->paginate($this->AlunosSaudes);

        $this->set(compact('alunosSaudes'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Alunos Saude id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $alunosSaude = $this->AlunosSaudes->get($id, [
            'contain' => ['Alunos'],
        ]);

        $this->set(compact('alunosSaude'));
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alunosSaude = $this->AlunosSaudes->newEmptyEntity();
        if ($this->request->is('post')) {
            $alunosSaude = $this->AlunosSaudes->patchEntity($alunosSaude, $this->request->getData());
            if ($this->AlunosSaudes->save($alunosSaude)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $alunos = $this->AlunosSaudes->Alunos->find('list', ['limit' => 200])->all();
        $this->set(compact('alunosSaude', 'alunos'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Alunos Saude id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alunosSaude = $this->AlunosSaudes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $alunosSaude = $this->AlunosSaudes->patchEntity($alunosSaude, $this->request->getData());
            if ($this->AlunosSaudes->save($alunosSaude)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $alunos = $this->AlunosSaudes->Alunos->find('list', ['limit' => 200])->all();
        $this->set(compact('alunosSaude', 'alunos'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Alunos Saude id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alunosSaude = $this->AlunosSaudes->get($id);
        if ($this->AlunosSaudes->delete($alunosSaude)) {
            $this->Flash->success(__('Excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
