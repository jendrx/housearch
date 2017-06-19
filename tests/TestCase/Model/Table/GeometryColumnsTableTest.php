<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GeometryColumnsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GeometryColumnsTable Test Case
 */
class GeometryColumnsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GeometryColumnsTable
     */
    public $GeometryColumns;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.geometry_columns'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GeometryColumns') ? [] : ['className' => 'App\Model\Table\GeometryColumnsTable'];
        $this->GeometryColumns = TableRegistry::get('GeometryColumns', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GeometryColumns);

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
