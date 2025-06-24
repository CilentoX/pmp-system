<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModalidadesNucleosFixture
 */
class ModalidadesNucleosFixture extends TestFixture
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
                'modified' => '2025-01-22 15:45:22',
                'created' => '2025-01-22 15:45:22',
            ],
        ];
        parent::init();
    }
}
