<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RasterColumns Model
 *
 * @method \App\Model\Entity\RasterColumn get($primaryKey, $options = [])
 * @method \App\Model\Entity\RasterColumn newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RasterColumn[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RasterColumn|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RasterColumn patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RasterColumn[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RasterColumn findOrCreate($search, callable $callback = null, $options = [])
 */
class RasterColumnsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('raster_columns');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('r_table_catalog');

        $validator
            ->allowEmpty('r_table_schema');

        $validator
            ->allowEmpty('r_table_name');

        $validator
            ->allowEmpty('r_raster_column');

        $validator
            ->integer('srid')
            ->allowEmpty('srid');

        $validator
            ->numeric('scale_x')
            ->allowEmpty('scale_x');

        $validator
            ->numeric('scale_y')
            ->allowEmpty('scale_y');

        $validator
            ->integer('blocksize_x')
            ->allowEmpty('blocksize_x');

        $validator
            ->integer('blocksize_y')
            ->allowEmpty('blocksize_y');

        $validator
            ->boolean('same_alignment')
            ->allowEmpty('same_alignment');

        $validator
            ->boolean('regular_blocking')
            ->allowEmpty('regular_blocking');

        $validator
            ->integer('num_bands')
            ->allowEmpty('num_bands');

        $validator
            ->allowEmpty('pixel_types');

        $validator
            ->allowEmpty('nodata_values');

        $validator
            ->allowEmpty('out_db');

        $validator
            ->allowEmpty('extent');

        $validator
            ->boolean('spatial_index')
            ->allowEmpty('spatial_index');

        return $validator;
    }
}
