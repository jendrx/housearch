<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SamplesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SamplesTable Test Case
 */
class SamplesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SamplesTable
     */
    public $Samples;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.samples',
        'app.zones',
        'app.regions',
        'app.houses',
        'app.energy_certifications',
        'app.conservations',
        'app.conditions',
        'app.garages',
        'app.outbuildings',
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
        $config = TableRegistry::exists('Samples') ? [] : ['className' => 'App\Model\Table\SamplesTable'];
        $this->Samples = TableRegistry::get('Samples', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Samples);

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
