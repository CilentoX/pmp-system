<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;

/**
 * Alunos Controller
 *
 * @property \App\Model\Table\AlunosTable $Alunos
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlunosController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id, $codigo_acesso)
    {
        $aluno = $this->Alunos->find()
            ->contain(['Cursos' => ['Modalidades', 'Nucleos', 'Usuarios'], 'AlunosSaudes', 'Questionarios'])
            ->where(['codigo_acesso' => $codigo_acesso])
            ->first();
        if (!$aluno) {
            $this->Flash->error(__('Aluno não encontrado! Por favor, tente novamente.'));
            return $this->redirect(['action' => 'add']);
        }

        $this->set(compact('aluno'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($cursos_id = null)
    {
        if (!$cursos_id) {
            $this->Flash->error('Escolha um curso pra começar.');
            return $this->redirect(['controller' => 'Cursos']);
        }
        $curso = $this->Alunos->Cursos->get($cursos_id, [
            'contain' => ['Modalidades', 'Usuarios', 'Alunos', 'Nucleos', 'DiasHorarios'],
        ]);
        $vagas = $curso->vagas - count($curso->alunos);
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

            $dados['cursos_alunos'][0]['status'] = $vagas <= 0 ? 2 : 1;
            $dados['cursos_alunos'][0]['cursos_id'] = $cursos_id;
            $aluno = $this->Alunos->patchEntity($aluno, $dados);
            if ($aluno->email == '') {
                unset($aluno->email);
            }
            if ($this->Alunos->save($aluno)) {
                $mailer = new Mailer();
                $mailer->setEmailFormat('html')
                    ->setTo($aluno->email)
                    ->setSubject('Este é um email da Prefeitura de Petrópolis - Agita Petrópolis')
                    ->setViewVars(['aluno' => $aluno])
                    ->viewBuilder()
                    ->setTemplate('enviar_codigo')
                    ->addHelpers(['Html']);
                if ($mailer->deliver()) {
                    $this->Flash->success(__('E-mail enviado para ' . $aluno->email . ' com sucesso.'));
                } else {
                    $this->Flash->error(__('Erro ao enviar e-mail. Por favor, tente novamente.'));
                }
                $this->Flash->success(__('Salvo com sucesso.'));
                return $this->redirect(['action' => 'view', $aluno->id, $aluno->codigo_acesso]);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente.'));
        }
        $this->set(compact('aluno', 'curso'));
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
     * Verifica method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function verifica($email_cpf)
    {
        $aluno = $this->Alunos->find()->where(['OR' => [['cpf' => $email_cpf], ['email' => $email_cpf]]])->count();
        if ($aluno > 0) {
            echo 1;
        } else {
            echo 0;
        }
        exit;
    }

    /**
     * ReenviarCodigo method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function reenviarCodigo($cpf)
    {
        $aluno = $this->Alunos->find()->where(['cpf' => $cpf])->first();
        if (empty($aluno)) {
            $this->Flash->error(__('Cadastro não encontrado. Por favor, tente novamente.'));
            return $this->redirect($this->referer());
        } else {
            /* ENVIA UM EMAIL P/ O USUARIO */
            $mailer = new Mailer();
            $mailer->setEmailFormat('html')
                ->setTo($aluno->email)
                ->setSubject('Este é um email da Prefeitura de Petrópolis - Agita Petrópolis')
                ->setViewVars(['aluno' => $aluno])
                ->viewBuilder()
                ->setTemplate('reenviar_codigo')
                ->addHelpers(['Html']);
            if ($mailer->deliver()) {
                $this->Flash->success(__('E-mail enviado para ' . $aluno->email . ' com sucesso.'));
            } else {
                $this->Flash->error(__('Erro ao enviar e-mail. Por favor, tente novamente.'));
            }
            return $this->redirect($this->referer());
        }
    }

}
