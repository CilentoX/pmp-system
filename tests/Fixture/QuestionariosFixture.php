<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionariosFixture
 */
class QuestionariosFixture extends TestFixture
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
                'alunos_id' => 1,
                'coracao' => 1,
                'dor_peito' => 1,
                'dor_peito_mes' => 1,
                'tontura' => 1,
                'articular' => 1,
                'tratamento' => 1,
                'cirurgia' => 1,
                'outra_razao' => 1,
                'created' => '2025-01-24 16:36:32',
                'modified' => '2025-01-24 16:36:32',
            ],
        ];
        parent::init();
    }
}
