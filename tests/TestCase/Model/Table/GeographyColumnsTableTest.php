<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GeographyColumnsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GeographyColumnsTable Test Case
 */
class GeographyColumnsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GeographyColumnsTable
     */
    public $GeographyColumns;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.geography_columns'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GeographyColumns') ? [] : ['className' => 'App\Model\Table\GeographyColumnsTable'];
        $this->GeographyColumns = TableRegistry::get('GeographyColumns', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GeographyColumns);

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
