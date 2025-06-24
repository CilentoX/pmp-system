<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DiasHorario Entity
 *
 * @property int $id
 * @property int $cursos_id
 * @property string $dia_semana
 * @property \Cake\I18n\Time $horario_inicio
 * @property \Cake\I18n\Time $horario_fim
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Curso $curso
 */
class DiasHorario extends Entity
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
        'dia_semana' => true,
        'horario_inicio' => true,
        'horario_fim' => true,
        'created' => true,
        'modified' => true,
        'curso' => true,
    ];
}
