<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosFixture
 */
class UsuariosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'cpf' => 'Lorem ipsum dolor sit amet',
                'telefone' => 'Lorem ipsum dolor sit amet',
                'senha' => 'Lorem ipsum dolor sit amet',
                'hash' => 'Lorem ipsum dolor sit amet',
                'grupos_id' => 1,
                'created' => '2024-01-11 10:23:08',
                'modified' => '2024-01-11 10:23:08',
            ],
        ];
        parent::init();
    }
}
