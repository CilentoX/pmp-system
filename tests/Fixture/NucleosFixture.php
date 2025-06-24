<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NucleosFixture
 */
class NucleosFixture extends TestFixture
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
                'endereco' => 'Lorem ipsum dolor sit amet',
                'bairro' => 'Lorem ipsum dolor sit amet',
                'telefone' => 'Lorem ipsum dolor ',
                'created' => '2025-01-31 15:54:27',
                'modified' => '2025-01-31 15:54:27',
            ],
        ];
        parent::init();
    }
}
