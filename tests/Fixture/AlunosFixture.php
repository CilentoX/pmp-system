<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlunosFixture
 */
class AlunosFixture extends TestFixture
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
                'rg' => 'Lorem ipsum dolor sit amet',
                'cpf' => 1,
                'data_nascimento' => '2025-01-22',
                'telefone' => 'Lorem ipsum dolor ',
                'responsavel_legal' => 'Lorem ipsum dolor sit amet',
                'grau_parentesco' => 1,
                'grau_parentesco_outro' => 'Lorem ipsum dolor sit amet',
                'cep' => 'Lorem ipsum dolor ',
                'endereco' => 'Lorem ipsum dolor sit amet',
                'bairro' => 'Lorem ipsum dolor sit amet',
                'municipio' => 'Lorem ipsum dolor sit amet',
                'como_soube' => 'Lorem ipsum dolor sit amet',
                'arquivo_cpf' => 'Lorem ipsum dolor sit amet',
                'arquivo_rg' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-01-22 17:50:37',
                'modified' => '2025-01-22 17:50:37',
            ],
        ];
        parent::init();
    }
}
