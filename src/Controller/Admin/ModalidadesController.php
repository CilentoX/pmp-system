<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * Modalidades Controller
 *
 * @property \App\Model\Table\ModalidadesTable $Modalidades
 * @method \App\Model\Entity\Modalidade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModalidadesController extends AppController
{
        /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $modalidades = $this->paginate($this->Modalidades);

        $this->set(compact('modalidades'));
    }

    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modalidade = $this->Modalidades->newEmptyEntity();
        if ($this->request->is('post')) {
            $modalidade = $this->Modalidades->patchEntity($modalidade, $this->request->getData());
            if ($this->Modalidades->save($modalidade)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $this->set(compact('modalidade'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Modalidade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modalidade = $this->Modalidades->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modalidade = $this->Modalidades->patchEntity($modalidade, $this->request->getData());
            if ($this->Modalidades->save($modalidade)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $this->set(compact('modalidade'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Modalidade id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modalidade = $this->Modalidades->get($id);
        if ($this->Modalidades->delete($modalidade)) {
            $this->Flash->success(__('Excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
