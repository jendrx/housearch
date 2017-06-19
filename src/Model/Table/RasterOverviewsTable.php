<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RasterOverviews Model
 *
 * @method \App\Model\Entity\RasterOverview get($primaryKey, $options = [])
 * @method \App\Model\Entity\RasterOverview newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RasterOverview[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RasterOverview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RasterOverview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RasterOverview[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RasterOverview findOrCreate($search, callable $callback = null, $options = [])
 */
class RasterOverviewsTable extends Table
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

        $this->setTable('raster_overviews');
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
            ->allowEmpty('o_table_catalog');

        $validator
            ->allowEmpty('o_table_schema');

        $validator
            ->allowEmpty('o_table_name');

        $validator
            ->allowEmpty('o_raster_column');

        $validator
            ->allowEmpty('r_table_catalog');

        $validator
            ->allowEmpty('r_table_schema');

        $validator
            ->allowEmpty('r_table_name');

        $validator
            ->allowEmpty('r_raster_column');

        $validator
            ->integer('overview_factor')
            ->allowEmpty('overview_factor');

        return $validator;
    }
}
