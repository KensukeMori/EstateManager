<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildingTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildingTable Test Case
 */
class BuildingTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildingTable
     */
    public $Building;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Building'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Building') ? [] : ['className' => BuildingTable::class];
        $this->Building = TableRegistry::getTableLocator()->get('Building', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Building);

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
