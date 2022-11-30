<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TicketAssignTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TicketAssignTable Test Case
 */
class TicketAssignTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TicketAssignTable
     */
    protected $TicketAssign;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TicketAssign',
        'app.Tickets',
        'app.Staffs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TicketAssign') ? [] : ['className' => TicketAssignTable::class];
        $this->TicketAssign = $this->getTableLocator()->get('TicketAssign', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TicketAssign);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TicketAssignTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TicketAssignTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
