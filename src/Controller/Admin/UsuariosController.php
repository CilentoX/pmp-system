<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Grupos'],
        ];
        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Grupos'],
        ]);

        $this->set(compact('usuario'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $grupos = $this->Usuarios->Grupos->find('list', ['valueField' => 'nome'], ['limit' => 200])->all();

        $this->set(compact('usuario', 'grupos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Grupos'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $grupos = $this->Usuarios->Grupos->find('list', ['valueField' => 'nome'], ['limit' => 200])->all();
        $this->set(compact('usuario', 'grupos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('Excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('vazio');
        if ($this->request->is('post')) {
            $usuarios = $this->Auth->identify();
            if ($usuarios) {
                $this->Auth->setUser($usuarios);
                switch ($usuarios['grupos_id']) {
                    case 1:
                        return $this->redirect(['prefix' => 'Admin', 'controller' => 'Cursos', 'action' => 'index']);
                        break;
                    case 2:
                        return $this->redirect(['prefix' => 'Professor', 'controller' => 'Cursos', 'action' => 'index']);
                        break;
                    default:
                        return $this->redirect(['controller' => 'Cursos', 'action' => 'index']);
                        break;
                }
            } else {
                $this->Flash->error(__('E-mail ou Senha incorretos'));
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function alterarSenha($usuarios_id = null)
    {
        $usuario = null;
        if ($this->request->is('Post')) {
            if($usuarios_id){
                $usuario = $this->Usuarios->get($usuarios_id);
            }else{
                $usuario = $this->Usuarios->get($this->Auth->User('id'));
            }
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success('Salvo com sucesso.');
            } else {
                $this->Flash->error('Erro ao salvar. Por favor, tente novamente.');
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('usuario'));
    }
}
