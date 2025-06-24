<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

/**
 * CursosAlunos Controller
 *
 * @property \App\Model\Table\CursosAlunosTable $CursosAlunos
 * @method \App\Model\Entity\CursosAluno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursosAlunosController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($cursos_id)
    {
        $cursosAluno = $this->CursosAlunos->newEmptyEntity();
        $curso = $this->CursosAlunos->Cursos->get($cursos_id, [
            'contain' => ['Modalidades', 'Usuarios', 'Alunos', 'Nucleos', 'DiasHorarios'],
        ]);
        $vagas = $curso->vagas - count($curso->alunos);
        if ($this->request->is('post')) {
            $aluno = $this->CursosAlunos->Alunos->find()->where(['cpf' => $this->request->getData('cpf'), 'codigo_acesso' => $this->request->getData('codigo_acesso')])->first();
            if (!$aluno) {
                $this->Flash->error(__('Cadastro não encontrado. Por favor, tente novamente.'));
                return $this->redirect(['controller' => 'Cursos']);
            }
            $cursosAluno = $this->CursosAlunos->find()->where(['alunos_id' => $aluno->id]);
            if ($aluno) {
                $this->Flash->error(__('Você já está matriculado neste curso'));
                return $this->redirect(['controller' => 'Cursos']);
            }
            $cursosAluno = $this->CursosAlunos->patchEntity($cursosAluno, $this->request->getData());
            $cursosAluno->alunos_id = $aluno->id;
            $cursosAluno->cursos_id = $cursos_id;
            $cursosAluno->status = $vagas <= 0 ? 2 : 1;
            if ($this->CursosAlunos->save($cursosAluno)) {
                $this->Flash->success(__('Salvo com sucesso.'));
                return $this->redirect(['controller' => 'alunos', 'action' => 'view', $aluno->id, $aluno->codigo_acesso]);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }

        $this->set(compact('cursosAluno', 'curso'));
    }
}
