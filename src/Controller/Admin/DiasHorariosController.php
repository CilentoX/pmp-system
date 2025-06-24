<?php
declare(strict_types=1);

namespace App\Controller\Admin;


/**
 * DiasHorarios Controller
 *
 * @property \App\Model\Table\DiasHorariosTable $DiasHorarios
 * @method \App\Model\Entity\DiasHorario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiasHorariosController extends AppController
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
        $diasHorarios = $this->paginate($this->DiasHorarios);

        $this->set(compact('diasHorarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Dias Horario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diasHorario = $this->DiasHorarios->get($id, [
            'contain' => ['Cursos'],
        ]);

        $this->set(compact('diasHorario'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diasHorario = $this->DiasHorarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $diasHorario = $this->DiasHorarios->patchEntity($diasHorario, $this->request->getData());
            if ($this->DiasHorarios->save($diasHorario)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $cursos = $this->DiasHorarios->Cursos->find('list', ['limit' => 200])->all();
        $this->set(compact('diasHorario', 'cursos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dias Horario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diasHorario = $this->DiasHorarios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diasHorario = $this->DiasHorarios->patchEntity($diasHorario, $this->request->getData());
            if ($this->DiasHorarios->save($diasHorario)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $cursos = $this->DiasHorarios->Cursos->find('list', ['limit' => 200])->all();
        $this->set(compact('diasHorario', 'cursos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dias Horario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diasHorario = $this->DiasHorarios->get($id);
        if ($this->DiasHorarios->delete($diasHorario)) {
            $this->Flash->success(__('Excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
