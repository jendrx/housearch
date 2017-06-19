<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuyersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuyersTable Test Case
 */
class BuyersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BuyersTable
     */
    public $Buyers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.buyers',
        'app.jobs',
        'app.incomes',
        'app.qualifications',
        'app.users',
        'app.roles',
        'app.sellers',
        'app.addresses',
        'app.seller_types',
        'app.houses',
        'app.energy_certifications',
        'app.conservations',
        'app.conditions',
        'app.garages',
        'app.outbuildings',
        'app.zones',
        'app.regions',
        'app.samples',
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
        $config = TableRegistry::exists('Buyers') ? [] : ['className' => 'App\Model\Table\BuyersTable'];
        $this->Buyers = TableRegistry::get('Buyers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Buyers);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
