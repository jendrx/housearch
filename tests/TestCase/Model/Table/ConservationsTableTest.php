<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConservationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConservationsTable Test Case
 */
class ConservationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConservationsTable
     */
    public $Conservations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.conservations',
        'app.houses',
        'app.energy_certifications',
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
        $config = TableRegistry::exists('Conservations') ? [] : ['className' => 'App\Model\Table\ConservationsTable'];
        $this->Conservations = TableRegistry::get('Conservations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Conservations);

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
