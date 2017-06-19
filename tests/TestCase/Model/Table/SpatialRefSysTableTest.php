<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpatialRefSysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpatialRefSysTable Test Case
 */
class SpatialRefSysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpatialRefSysTable
     */
    public $SpatialRefSys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.spatial_ref_sys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SpatialRefSys') ? [] : ['className' => 'App\Model\Table\SpatialRefSysTable'];
        $this->SpatialRefSys = TableRegistry::get('SpatialRefSys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SpatialRefSys);

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
