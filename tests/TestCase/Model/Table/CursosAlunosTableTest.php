<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CursosAlunosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CursosAlunosTable Test Case
 */
class CursosAlunosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CursosAlunosTable
     */
    protected $CursosAlunos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CursosAlunos',
        'app.Cursos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CursosAlunos') ? [] : ['className' => CursosAlunosTable::class];
        $this->CursosAlunos = $this->getTableLocator()->get('CursosAlunos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CursosAlunos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CursosAlunosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CursosAlunosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
