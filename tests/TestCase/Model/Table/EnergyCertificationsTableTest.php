<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnergyCertificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnergyCertificationsTable Test Case
 */
class EnergyCertificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EnergyCertificationsTable
     */
    public $EnergyCertifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.energy_certifications',
        'app.houses',
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
        $config = TableRegistry::exists('EnergyCertifications') ? [] : ['className' => 'App\Model\Table\EnergyCertificationsTable'];
        $this->EnergyCertifications = TableRegistry::get('EnergyCertifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EnergyCertifications);

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
