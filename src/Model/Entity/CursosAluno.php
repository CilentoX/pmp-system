<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CursosAluno Entity
 *
 * @property int $id
 * @property int $cursos_id
 * @property int $alunos_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Curso $curso
 */
class CursosAluno extends Entity
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
        'cursos_id' => true,
        'alunos_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'curso' => true,
    ];
}
