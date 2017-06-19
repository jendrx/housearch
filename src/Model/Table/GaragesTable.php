<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Garages Model
 *
 * @property \Cake\ORM\Association\HasMany $Houses
 *
 * @method \App\Model\Entity\Garage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Garage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Garage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Garage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Garage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Garage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Garage findOrCreate($search, callable $callback = null, $options = [])
 */
class GaragesTable extends Table
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

        $this->setTable('garages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Houses', [
            'foreignKey' => 'garage_id'
        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('description');

        return $validator;
    }

    public function getList()
    {
        return $this->find('list',['keyField' => 'id', 'valueField' => 'description']);
    }
}
