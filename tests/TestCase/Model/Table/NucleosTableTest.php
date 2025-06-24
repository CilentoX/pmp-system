<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NucleosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NucleosTable Test Case
 */
class NucleosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NucleosTable
     */
    protected $Nucleos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Nucleos',
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
        $config = $this->getTableLocator()->exists('Nucleos') ? [] : ['className' => NucleosTable::class];
        $this->Nucleos = $this->getTableLocator()->get('Nucleos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Nucleos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NucleosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
