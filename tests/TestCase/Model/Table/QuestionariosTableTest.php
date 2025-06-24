<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionariosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionariosTable Test Case
 */
class QuestionariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionariosTable
     */
    protected $Questionarios;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Questionarios',
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
        $config = $this->getTableLocator()->exists('Questionarios') ? [] : ['className' => QuestionariosTable::class];
        $this->Questionarios = $this->getTableLocator()->get('Questionarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Questionarios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QuestionariosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\QuestionariosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
