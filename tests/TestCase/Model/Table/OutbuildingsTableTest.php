<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OutbuildingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OutbuildingsTable Test Case
 */
class OutbuildingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OutbuildingsTable
     */
    public $Outbuildings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.outbuildings',
        'app.houses',
        'app.energy_certifications',
        'app.conservations',
        'app.conditions',
        'app.garages',
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
        'app.qualifications',
        'app.house_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Outbuildings') ? [] : ['className' => 'App\Model\Table\OutbuildingsTable'];
        $this->Outbuildings = TableRegistry::get('Outbuildings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Outbuildings);

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
