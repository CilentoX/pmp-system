<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlunosSaudesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlunosSaudesTable Test Case
 */
class AlunosSaudesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlunosSaudesTable
     */
    protected $AlunosSaudes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AlunosSaudes',
        'app.Alunos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AlunosSaudes') ? [] : ['className' => AlunosSaudesTable::class];
        $this->AlunosSaudes = $this->getTableLocator()->get('AlunosSaudes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AlunosSaudes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AlunosSaudesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AlunosSaudesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
