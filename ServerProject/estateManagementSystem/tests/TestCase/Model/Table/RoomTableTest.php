<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoomTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoomTable Test Case
 */
class RoomTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RoomTable
     */
    public $Room;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Room'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Room') ? [] : ['className' => RoomTable::class];
        $this->Room = TableRegistry::getTableLocator()->get('Room', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Room);

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
