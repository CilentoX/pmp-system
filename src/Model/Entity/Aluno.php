<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Aluno Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $rg
 * @property int $cpf
 * @property \Cake\I18n\FrozenDate $data_nascimento
 * @property string $telefone
 * @property string $responsavel_legal
 * @property int $grau_parentesco
 * @property string $grau_parentesco_outro
 * @property string $cep
 * @property string $endereco
 * @property string $bairro
 * @property string $municipio
 * @property string $como_soube
 * @property string $como_soube_outro
 * @property string|null $arquivo_cpf
 * @property string|null $arquivo_rg
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Curso[] $cursos
 */
class Aluno extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'email' => true,
        'rg' => true,
        'cpf' => true,
        'data_nascimento' => true,
        'telefone' => true,
        'responsavel_legal' => true,
        'grau_parentesco' => true,
        'grau_parentesco_outro' => true,
        'cep' => true,
        'endereco' => true,
        'bairro' => true,
        'municipio' => true,
        'arquivo_comprovante_residencia' => true,
        'como_soube' => true,
        'como_soube_outro' => true,
        'codigo_acesso' => true,
        'arquivo_cpf' => true,
        'arquivo_rg' => true,
        'observacoes' => true,
        'created' => true,
        'modified' => true,
        'cursos' => true,
        'cursos_alunos' => true,
        'alunos_saude' => true,
        'questionario' => true,
    ];
}
