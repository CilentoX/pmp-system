<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModalidadesFixture
 */
class ModalidadesFixture extends TestFixture
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
                'created' => '2025-01-22 15:44:59',
                'modified' => '2025-01-22 15:44:59',
            ],
        ];
        parent::init();
    }
}
