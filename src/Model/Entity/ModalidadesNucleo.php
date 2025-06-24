<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModalidadesNucleo Entity
 *
 * @property int $id
 * @property int $modalidades_id
 * @property int $nucleos_id
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Modalidade $modalidade
 * @property \App\Model\Entity\Nucleo $nucleo
 */
class ModalidadesNucleo extends Entity
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
        'modified' => true,
        'created' => true,
        'modalidade' => true,
        'nucleo' => true,
    ];
}
