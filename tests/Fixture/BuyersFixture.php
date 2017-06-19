<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BuyersFixture
 *
 */
class BuyersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'job_id' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'income_id' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'qualification_id' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'birthdate' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'user_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'buyers_user_uq' => ['type' => 'unique', 'columns' => ['user_id'], 'length' => []],
            'incomes_fk' => ['type' => 'foreign', 'columns' => ['income_id'], 'references' => ['incomes', 'id'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
            'jobs_fk' => ['type' => 'foreign', 'columns' => ['job_id'], 'references' => ['jobs', 'id'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
            'qualifications_fk' => ['type' => 'foreign', 'columns' => ['qualification_id'], 'references' => ['qualifications', 'id'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
            'users_fk' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'job_id' => 1,
            'income_id' => 1,
            'qualification_id' => 1,
            'birthdate' => '2017-06-13',
            'user_id' => 1
        ],
    ];
}
