<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhinxlogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhinxlogTable Test Case
 */
class PhinxlogTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhinxlogTable
     */
    public $Phinxlog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.phinxlog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Phinxlog') ? [] : ['className' => PhinxlogTable::class];
        $this->Phinxlog = TableRegistry::get('Phinxlog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Phinxlog);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
