<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DiasHorariosFixture
 */
class DiasHorariosFixture extends TestFixture
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
                'dia_semana' => 'Lorem ip',
                'horario_inicio' => '13:18:53',
                'horario_fim' => '13:18:53',
                'created' => '2025-01-28 13:18:53',
                'modified' => '2025-01-28 13:18:53',
            ],
        ];
        parent::init();
    }
}
