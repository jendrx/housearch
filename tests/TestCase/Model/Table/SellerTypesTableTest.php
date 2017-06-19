<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SellerTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SellerTypesTable Test Case
 */
class SellerTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SellerTypesTable
     */
    public $SellerTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.seller_types',
        'app.sellers',
        'app.addresses',
        'app.houses',
        'app.energy_certifications',
        'app.conservations',
        'app.conditions',
        'app.garages',
        'app.outbuildings',
        'app.zones',
        'app.regions',
        'app.samples',
        'app.house_types',
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
        $config = TableRegistry::exists('SellerTypes') ? [] : ['className' => 'App\Model\Table\SellerTypesTable'];
        $this->SellerTypes = TableRegistry::get('SellerTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SellerTypes);

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
