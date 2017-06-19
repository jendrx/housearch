<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HousesFixture
 *
 */
class HousesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'price' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'area' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'construction_year' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'url_ad' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'location' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'energy_certification_year' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'outbuilding_area' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'energy_certification_id' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'conservation_id' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'garage_id' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'outbuilding_id' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'zone_id' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'seller_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'condition_id' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'house_type_id' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'rooms' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'lat' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'lon' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'location_json' => ['type' => 'json', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'path_pic' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'conditions_fk' => ['type' => 'foreign', 'columns' => ['condition_id'], 'references' => ['conditions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'conservations_fk' => ['type' => 'foreign', 'columns' => ['conservation_id'], 'references' => ['conservations', 'id'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
            'energy_certifications_fk' => ['type' => 'foreign', 'columns' => ['energy_certification_id'], 'references' => ['energy_certifications', 'id'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
            'garages_fk' => ['type' => 'foreign', 'columns' => ['garage_id'], 'references' => ['garages', 'id'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
            'house_types_fk' => ['type' => 'foreign', 'columns' => ['house_type_id'], 'references' => ['house_types', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'outbuildings_fk' => ['type' => 'foreign', 'columns' => ['outbuilding_id'], 'references' => ['outbuildings', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'sellers_fk' => ['type' => 'foreign', 'columns' => ['seller_id'], 'references' => ['sellers', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'zones_fk' => ['type' => 'foreign', 'columns' => ['zone_id'], 'references' => ['zones', 'id'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
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
            'price' => 1,
            'area' => 1,
            'construction_year' => 1,
            'url_ad' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'location' => 'Lorem ipsum dolor sit amet',
            'created' => 1497361448,
            'energy_certification_year' => 1,
            'outbuilding_area' => 1,
            'energy_certification_id' => 1,
            'conservation_id' => 1,
            'garage_id' => 1,
            'outbuilding_id' => 1,
            'zone_id' => 1,
            'seller_id' => 1,
            'condition_id' => 1,
            'house_type_id' => 1,
            'rooms' => 1,
            'lat' => 1,
            'lon' => 1,
            'location_json' => '',
            'path_pic' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
