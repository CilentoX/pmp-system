<?php
declare(strict_types=1);

namespace App\Controller\Admin;


/**
 * Alunos Controller
 *
 * @property \App\Model\Table\AlunosTable $Alunos
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlunosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $nome = $this->request->getQuery('nome') ? ['OR' => ['nome LIKE' => "%{$this->request->getQuery('nome')}%", 'cpf LIKE' => "%{$this->request->getQuery('nome')}%"]] : [];
        $alunos = $this->paginate($this->Alunos, ['conditions' => $nome, 'order' => ['nome ASC']]);

        $this->set(compact('alunos'));
    }

    /**
     * View method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aluno = $this->Alunos->get($id, [
            'contain' => ['Cursos' => ['Modalidades', 'Nucleos', 'Usuarios'], 'AlunosSaudes', 'Questionarios'],
        ]);
        $this->set(compact('aluno'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aluno = $this->Alunos->newEmptyEntity();
        if ($this->request->is('post')) {
            $dados = $this->request->getData();
            $dados['codigo_acesso'] = substr(md5(microtime()), 0, 8);
            $cpf = $dados['cpf'];
            $inputs_files = [
                'arquivo_rg',
                'arquivo_cpf',
                'alunos_saude.arquivo_atestado',
                'arquivo_comprovante_residencia'
            ];
            $diretorio = "uploads/arquivos/$cpf";
            // Verifica se o diretório existe; se não, cria
            if (!is_dir($diretorio)) {
                if (!mkdir($diretorio, 0777, true)) { // true cria diretórios pai, caso não existam
                    $this->Flash->error('Erro ao criar o diretório para o CPF. Por favor tente novamente.');
                    return $this->redirect($this->referer());
                }
            }
            foreach ($inputs_files as $input) {
                if ($this->request->getData("{$input}.name") && $this->request->getData("{$input}.error") == 0) {
                    $nome_arquivo = "{$input}._" . rand() . '.' . strtolower(pathinfo($this->request->getData("{$input}.name"), PATHINFO_EXTENSION));
                    $permitidos = ['xls', 'xlsx', 'doc', 'docx', 'csv', 'pdf', 'jpg', 'png', 'jpeg'];
                    $extensao = strtolower(pathinfo($this->request->getData("{$input}.name"), PATHINFO_EXTENSION));
                    if (!in_array($extensao, $permitidos)) {
                        $this->Flash->error('Erro ao salvar o arquivo ' . $input . '. Formato de arquivo incorreto! Por favor tente novamente.');
                        return $this->redirect($this->referer());
                    }
                    $path_arquivo = "$diretorio/$nome_arquivo";
                    move_uploaded_file($this->request->getData("{$input}.tmp_name"), $path_arquivo);
                    if (strpos($input, '.') !== false) {
                        $input_nome = explode('.', $input);
                        $dados[$input_nome[0]][$input_nome[1]] = $nome_arquivo;
                    } else {
                        $dados[$input] = $nome_arquivo;
                    }
                }
            }
            $aluno = $this->Alunos->patchEntity($aluno, $dados);
            if ($this->Alunos->save($aluno)) {
                $this->Flash->success(__('Salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $cursos = $this->Alunos->Cursos->find('list', ['limit' => 200])->all();
        $this->set(compact('aluno', 'cursos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aluno = $this->Alunos->get($id, [
            'contain' => ['AlunosSaudes', 'Questionarios'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dados = $this->request->getData();
            $cpf = $dados['cpf'];
            $inputs_files = [
                'arquivo_rg',
                'arquivo_cpf',
                'alunos_saude.arquivo_atestado',
                'arquivo_comprovante_residencia'
            ];
            $diretorio = "uploads/arquivos/$cpf";
            // Verifica se o diretório existe; se não, cria
            if (!is_dir($diretorio)) {
                if (!mkdir($diretorio, 0777, true)) { // true cria diretórios pai, caso não existam
                    $this->Flash->error('Erro ao criar o diretório para o CPF. Por favor tente novamente.');
                    return $this->redirect($this->referer());
                }
            }
            foreach ($inputs_files as $input) {
                if ($this->request->getData("{$input}.name") && $this->request->getData("{$input}.error") == 0) {
                    $nome_arquivo = "{$input}._" . rand() . '.' . strtolower(pathinfo($this->request->getData("{$input}.name"), PATHINFO_EXTENSION));
                    $permitidos = ['xls', 'xlsx', 'doc', 'docx', 'csv', 'pdf', 'jpg', 'png', 'jpeg'];
                    $extensao = strtolower(pathinfo($this->request->getData("{$input}.name"), PATHINFO_EXTENSION));
                    if (!in_array($extensao, $permitidos)) {
                        $this->Flash->error('Erro ao salvar o arquivo ' . $input . '. Formato de arquivo incorreto! Por favor tente novamente.');
                        return $this->redirect($this->referer());
                    }
                    $path_arquivo = "$diretorio/$nome_arquivo";
                    move_uploaded_file($this->request->getData("{$input}.tmp_name"), $path_arquivo);
                    if (strpos($input, '.') !== false) {
                        $input_nome = explode('.', $input);
                        $dados[$input_nome[0]][$input_nome[1]] = $nome_arquivo;
                    } else {
                        $dados[$input] = $nome_arquivo;
                    }
                } else {
                    if (strpos($input, '.') !== false) {
                        $input_nome = explode('.', $input);
                        unset($dados[$input_nome[0]][$input_nome[1]]);
                    } else {
                        unset($dados[$input]);
                    }

                }
            }
            $aluno = $this->Alunos->patchEntity($aluno, $dados);
            if ($this->Alunos->save($aluno)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $cursos = $this->Alunos->Cursos->find('list', ['limit' => 200])->all();
        $this->set(compact('aluno', 'cursos'));
    }

    /**
     * Imprimir method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function imprimir($id = null)
    {
        $aluno = $this->Alunos->get($id, [
            'contain' => ['Cursos' => ['Modalidades', 'Nucleos', 'Usuarios'], 'AlunosSaudes', 'Questionarios'],
        ]);
        $this->viewBuilder()->setLayout('pdf');
        $this->set(compact('aluno'));
    }

    /**
     * Imprimir method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function imprimirAutorizacao($id = null)
    {
        $aluno = $this->Alunos->get($id, [
            'contain' => ['Cursos' => ['Modalidades', 'Nucleos', 'Usuarios'], 'AlunosSaudes', 'Questionarios'],
        ]);
        $this->viewBuilder()->setLayout('pdf');
        $this->set(compact('aluno'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aluno = $this->Alunos->get($id);
        if ($this->Alunos->delete($aluno)) {
            $this->Flash->success(__('Excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
