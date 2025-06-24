<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModalidadesNucleosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModalidadesNucleosTable Test Case
 */
class ModalidadesNucleosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ModalidadesNucleosTable
     */
    protected $ModalidadesNucleos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ModalidadesNucleos',
        'app.Modalidades',
        'app.Nucleos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ModalidadesNucleos') ? [] : ['className' => ModalidadesNucleosTable::class];
        $this->ModalidadesNucleos = $this->getTableLocator()->get('ModalidadesNucleos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ModalidadesNucleos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ModalidadesNucleosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ModalidadesNucleosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
