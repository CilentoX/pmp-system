<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * ModalidadesNucleos Controller
 *
 * @property \App\Model\Table\ModalidadesNucleosTable $ModalidadesNucleos
 * @method \App\Model\Entity\ModalidadesNucleo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModalidadesNucleosController extends AppController
{
        /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Modalidades', 'Nucleos'],
        ];
        $modalidadesNucleos = $this->paginate($this->ModalidadesNucleos);

        $this->set(compact('modalidadesNucleos'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Modalidades Nucleo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modalidadesNucleo = $this->ModalidadesNucleos->get($id, [
            'contain' => ['Modalidades', 'Nucleos'],
        ]);

        $this->set(compact('modalidadesNucleo'));
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modalidadesNucleo = $this->ModalidadesNucleos->newEmptyEntity();
        if ($this->request->is('post')) {
            $modalidadesNucleo = $this->ModalidadesNucleos->patchEntity($modalidadesNucleo, $this->request->getData());
            if ($this->ModalidadesNucleos->save($modalidadesNucleo)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $modalidades = $this->ModalidadesNucleos->Modalidades->find('list', ['limit' => 200])->all();
        $nucleos = $this->ModalidadesNucleos->Nucleos->find('list', ['limit' => 200])->all();
        $this->set(compact('modalidadesNucleo', 'modalidades', 'nucleos'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Modalidades Nucleo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modalidadesNucleo = $this->ModalidadesNucleos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modalidadesNucleo = $this->ModalidadesNucleos->patchEntity($modalidadesNucleo, $this->request->getData());
            if ($this->ModalidadesNucleos->save($modalidadesNucleo)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $modalidades = $this->ModalidadesNucleos->Modalidades->find('list', ['limit' => 200])->all();
        $nucleos = $this->ModalidadesNucleos->Nucleos->find('list', ['limit' => 200])->all();
        $this->set(compact('modalidadesNucleo', 'modalidades', 'nucleos'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Modalidades Nucleo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modalidadesNucleo = $this->ModalidadesNucleos->get($id);
        if ($this->ModalidadesNucleos->delete($modalidadesNucleo)) {
            $this->Flash->success(__('Excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
