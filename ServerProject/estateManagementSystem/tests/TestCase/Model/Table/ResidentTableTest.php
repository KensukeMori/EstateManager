<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResidentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResidentTable Test Case
 */
class ResidentTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResidentTable
     */
    public $Resident;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Resident'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Resident') ? [] : ['className' => ResidentTable::class];
        $this->Resident = TableRegistry::getTableLocator()->get('Resident', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Resident);

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
