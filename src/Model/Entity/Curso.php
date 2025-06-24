<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Curso Entity
 *
 * @property int $id
 * @property int $modalidades_id
 * @property int $grupos_id
 * @property int $usuarios_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Modalidade $modalidade
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Aluno[] $alunos
 * @property \App\Model\Entity\DiasHorario[] $dias_horarios
 */
class Curso extends Entity
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
        'modalidades_id' => true,
        'nucleos_id' => true,
        'usuarios_id' => true,
        'vagas' => true,
        'idade_minima' => true,
        'created' => true,
        'modified' => true,
        'modalidade' => true,
        'nucleo' => true,
        'usuario' => true,
        'alunos' => true,
        'dias_horarios' => true,
    ];
}
