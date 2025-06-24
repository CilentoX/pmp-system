<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlunosSaudeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlunosSaudeTable Test Case
 */
class AlunosSaudeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlunosSaudeTable
     */
    protected $AlunosSaude;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AlunosSaude',
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
        $config = $this->getTableLocator()->exists('AlunosSaude') ? [] : ['className' => AlunosSaudeTable::class];
        $this->AlunosSaude = $this->getTableLocator()->get('AlunosSaude', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AlunosSaude);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AlunosSaudeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AlunosSaudeTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
