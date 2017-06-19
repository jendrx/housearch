<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GeometryColumns Model
 *
 * @method \App\Model\Entity\GeometryColumn get($primaryKey, $options = [])
 * @method \App\Model\Entity\GeometryColumn newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GeometryColumn[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GeometryColumn|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GeometryColumn patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GeometryColumn[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GeometryColumn findOrCreate($search, callable $callback = null, $options = [])
 */
class GeometryColumnsTable extends Table
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

        $this->setTable('geometry_columns');
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
            ->allowEmpty('f_geometry_column');

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
