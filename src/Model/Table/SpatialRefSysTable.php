<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SpatialRefSys Model
 *
 * @method \App\Model\Entity\SpatialRefSy get($primaryKey, $options = [])
 * @method \App\Model\Entity\SpatialRefSy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SpatialRefSy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SpatialRefSy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SpatialRefSy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SpatialRefSy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SpatialRefSy findOrCreate($search, callable $callback = null, $options = [])
 */
class SpatialRefSysTable extends Table
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

        $this->setTable('spatial_ref_sys');
        $this->setDisplayField('srid');
        $this->setPrimaryKey('srid');
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
            ->integer('srid')
            ->allowEmpty('srid', 'create');

        $validator
            ->allowEmpty('auth_name');

        $validator
            ->integer('auth_srid')
            ->allowEmpty('auth_srid');

        $validator
            ->allowEmpty('srtext');

        $validator
            ->allowEmpty('proj4text');

        return $validator;
    }
}
