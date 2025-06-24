<?php
declare(strict_types=1);

namespace App\Controller;


use App\Controller\AppController;

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
        $cursos = $this->Cursos->find()->contain(['Modalidades','DiasHorarios', 'Usuarios', 'Nucleos', 'CursosAlunos'=> function($q){
            return $q->where(['status'=> 1]);
        }])->where($condicao);
        $modalidades = $this->Cursos->Modalidades->find('list', ['valueField' => 'nome', 'limit' => 200])->all();
        $nucleos = $this->Cursos->Nucleos->find('list', ['valueField' => 'nome', 'limit' => 200])->all();
        $usuarios = $this->Cursos->Usuarios->find('list', ['valueField' => 'nome', 'limit' => 200])->where(['grupos_id' => 2])->all();
        $this->set(compact('cursos', 'modalidades', 'nucleos', 'usuarios'));
    }

}
