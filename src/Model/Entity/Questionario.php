<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Questionario Entity
 *
 * @property int $id
 * @property int $alunos_id
 * @property bool $coracao
 * @property bool $dor_peito
 * @property bool $dor_peito_mes
 * @property bool $tontura
 * @property bool $articular
 * @property bool $tratamento
 * @property bool $cirurgia
 * @property bool $outra_razao
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Aluno $aluno
 */
class Questionario extends Entity
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
        'coracao' => true,
        'dor_peito' => true,
        'dor_peito_mes' => true,
        'tontura' => true,
        'articular' => true,
        'tratamento' => true,
        'cirurgia' => true,
        'outra_razao' => true,
        'created' => true,
        'modified' => true,
        'aluno' => true,
    ];
}
