<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RasterColumnsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RasterColumnsTable Test Case
 */
class RasterColumnsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RasterColumnsTable
     */
    public $RasterColumns;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.raster_columns'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RasterColumns') ? [] : ['className' => 'App\Model\Table\RasterColumnsTable'];
        $this->RasterColumns = TableRegistry::get('RasterColumns', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RasterColumns);

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
