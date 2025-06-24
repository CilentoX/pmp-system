<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CursosAlunosFixture
 */
class CursosAlunosFixture extends TestFixture
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
                'cursos_id' => 1,
                'alunos_id' => 1,
                'created' => '2025-01-22 15:45:10',
                'modified' => '2025-01-22 15:45:10',
            ],
        ];
        parent::init();
    }
}
