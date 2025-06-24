<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlunosSaudesFixture
 */
class AlunosSaudesFixture extends TestFixture
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
                'plano_saude' => 1,
                'tipo_sanguineo' => 'L',
                'remedio_regular' => 1,
                'remedio_regular_qual' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'arquivo_atestado' => 'Lorem ipsum dolor sit amet',
                'validade_atestado' => '2025-01-24',
                'modified' => '2025-01-24 16:36:16',
                'created' => '2025-01-24 16:36:16',
                'deficiencia' => 1,
                'deficiencia_qual' => 'Lorem ipsum dolor sit amet',
                'doenca_respiratoria' => 1,
                'doenca_respiratoria_qual' => 'Lorem ipsum dolor sit amet',
                'doenca_historico' => 1,
                'doenca_historico_qual' => 'Lorem ipsum dolor sit amet',
                'cirurgia' => 1,
                'cirurgia_qual' => 'Lorem ipsum dolor sit amet',
                'alergia' => 1,
                'alergia_qual' => 'Lorem ipsum dolor sit amet',
                'atividade_fisica' => 1,
                'atividade_fisica_qual' => 'Lorem ipsum dolor sit amet',
                'atividade_fisica_restricao' => 1,
                'atividade_fisica_restricao_qual' => 'Lorem ipsum dolor sit amet',
                'fuma' => 1,
            ],
        ];
        parent::init();
    }
}
