<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $cpf
 * @property string $telefone
 * @property string $senha
 * @property string $hash
 * @property int $grupos_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Grupo $grupo
 */
class Usuario extends Entity
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
        'cpf' => true,
        'telefone' => true,
        'senha' => true,
        'hash' => true,
        'grupos_id' => true,
        'created' => true,
        'modified' => true,
        'grupo' => true,
    ];


    protected function _setSenha(string $senha): ?string
    {
        if (strlen($senha) > 0) {
            return (new DefaultPasswordHasher)->hash($senha);
        }
    }
}

