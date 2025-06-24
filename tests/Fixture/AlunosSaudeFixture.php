<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlunosSaudeFixture
 */
class AlunosSaudeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'alunos_saude';
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
                'plano_saude' => 1,
                'arquivo_atestado' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-01-23 12:26:21',
                'modified' => '2025-01-23 12:26:21',
            ],
        ];
        parent::init();
    }
}
