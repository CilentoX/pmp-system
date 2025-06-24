<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AlunosSaude Entity
 *
 * @property int $id
 * @property int $alunos_id
 * @property bool $plano_saude
 * @property string $tipo_sanguineo
 * @property bool $remedio_regular
 * @property string|null $remedio_regular_qual
 * @property string|null $arquivo_atestado
 * @property \Cake\I18n\FrozenDate $validade_atestado
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 * @property bool $deficiencia
 * @property string|null $deficiencia_qual
 * @property bool $doenca_respiratoria
 * @property string|null $doenca_respiratoria_qual
 * @property bool $doenca_historico
 * @property string|null $doenca_historico_qual
 * @property bool $cirurgia
 * @property string|null $cirurgia_qual
 * @property bool $alergia
 * @property string|null $alergia_qual
 * @property bool $atividade_fisica
 * @property string|null $atividade_fisica_qual
 * @property bool $atividade_fisica_restricao
 * @property string|null $atividade_fisica_restricao_qual
 * @property bool $fuma
 *
 * @property \App\Model\Entity\Aluno $aluno
 */
class AlunosSaude extends Entity
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
        'alunos_id' => true,
        'plano_saude' => true,
        'plano_saude_qual' => true,
        'tipo_sanguineo' => true,
        'remedio_regular' => true,
        'remedio_regular_qual' => true,
        'arquivo_atestado' => true,
        'validade_atestado' => true,
        'modified' => true,
        'created' => true,
        'deficiencia' => true,
        'deficiencia_qual' => true,
        'doenca_respiratoria' => true,
        'doenca_respiratoria_qual' => true,
        'doenca_historico' => true,
        'doenca_historico_qual' => true,
        'cirurgia' => true,
        'cirurgia_qual' => true,
        'alergia' => true,
        'alergia_qual' => true,
        'atividade_fisica' => true,
        'atividade_fisica_qual' => true,
        'atividade_fisica_restricao' => true,
        'atividade_fisica_restricao_qual' => true,
        'fuma' => true,
        'aluno' => true,
    ];
}
