<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StationTable Test Case
 */
class StationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StationTable
     */
    public $Station;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Station'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Station') ? [] : ['className' => StationTable::class];
        $this->Station = TableRegistry::getTableLocator()->get('Station', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Station);

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
