<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModalidadesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModalidadesTable Test Case
 */
class ModalidadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ModalidadesTable
     */
    protected $Modalidades;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Modalidades',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Modalidades') ? [] : ['className' => ModalidadesTable::class];
        $this->Modalidades = $this->getTableLocator()->get('Modalidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Modalidades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ModalidadesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
