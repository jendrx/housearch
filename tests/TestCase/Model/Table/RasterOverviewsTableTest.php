<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RasterOverviewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RasterOverviewsTable Test Case
 */
class RasterOverviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RasterOverviewsTable
     */
    public $RasterOverviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.raster_overviews'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RasterOverviews') ? [] : ['className' => 'App\Model\Table\RasterOverviewsTable'];
        $this->RasterOverviews = TableRegistry::get('RasterOverviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RasterOverviews);

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
