<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GeographyColumns Model
 *
 * @method \App\Model\Entity\GeographyColumn get($primaryKey, $options = [])
 * @method \App\Model\Entity\GeographyColumn newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GeographyColumn[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GeographyColumn|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GeographyColumn patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GeographyColumn[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GeographyColumn findOrCreate($search, callable $callback = null, $options = [])
 */
class GeographyColumnsTable extends Table
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

        $this->setTable('geography_columns');
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
            ->allowEmpty('f_table_catalog');

        $validator
            ->allowEmpty('f_table_schema');

        $validator
            ->allowEmpty('f_table_name');

        $validator
            ->allowEmpty('f_geography_column');

        $validator
            ->integer('coord_dimension')
            ->allowEmpty('coord_dimension');

        $validator
            ->integer('srid')
            ->allowEmpty('srid');

        $validator
            ->allowEmpty('type');

        return $validator;
    }
}
