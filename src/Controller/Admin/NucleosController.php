<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * Nucleos Controller
 *
 * @property \App\Model\Table\NucleosTable $Nucleos
 * @method \App\Model\Entity\Nucleo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NucleosController extends AppController
{
        /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $nucleos = $this->paginate($this->Nucleos);

        $this->set(compact('nucleos'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Nucleo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nucleo = $this->Nucleos->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('nucleo'));
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nucleo = $this->Nucleos->newEmptyEntity();
        if ($this->request->is('post')) {
            $nucleo = $this->Nucleos->patchEntity($nucleo, $this->request->getData());
            if ($this->Nucleos->save($nucleo)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $this->set(compact('nucleo'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Nucleo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nucleo = $this->Nucleos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nucleo = $this->Nucleos->patchEntity($nucleo, $this->request->getData());
            if ($this->Nucleos->save($nucleo)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $this->set(compact('nucleo'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Nucleo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nucleo = $this->Nucleos->get($id);
        if ($this->Nucleos->delete($nucleo)) {
            $this->Flash->success(__('Excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
