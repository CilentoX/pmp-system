<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InstituicoesFixture
 */
class InstituicoesFixture extends TestFixture
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
                'ordem' => 1,
                'created' => '2024-07-23 12:28:56',
                'modified' => '2024-07-23 12:28:56',
            ],
        ];
        parent::init();
    }
}
