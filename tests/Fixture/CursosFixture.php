<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CursosFixture
 */
class CursosFixture extends TestFixture
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
                'modalidades_id' => 1,
                'nucleos_id' => 1,
                'usuarios_id' => 1,
                'vagas' => 1,
                'created' => '2025-01-28 15:36:57',
                'modified' => '2025-01-28 15:36:57',
            ],
        ];
        parent::init();
    }
}
