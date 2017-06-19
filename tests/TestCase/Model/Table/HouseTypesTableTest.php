<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HouseTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HouseTypesTable Test Case
 */
class HouseTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HouseTypesTable
     */
    public $HouseTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.house_types',
        'app.houses',
        'app.energy_certifications',
        'app.conservations',
        'app.conditions',
        'app.garages',
        'app.outbuildings',
        'app.zones',
        'app.regions',
        'app.samples',
        'app.sellers',
        'app.addresses',
        'app.seller_types',
        'app.users',
        'app.roles',
        'app.buyers',
        'app.jobs',
        'app.incomes',
        'app.qualifications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HouseTypes') ? [] : ['className' => 'App\Model\Table\HouseTypesTable'];
        $this->HouseTypes = TableRegistry::get('HouseTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HouseTypes);

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
