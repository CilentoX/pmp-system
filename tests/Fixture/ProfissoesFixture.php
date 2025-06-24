<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfissoesFixture
 */
class ProfissoesFixture extends TestFixture
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
                'created' => '2024-07-23 12:29:45',
                'modified' => '2024-07-23 12:29:45',
            ],
        ];
        parent::init();
    }
}
