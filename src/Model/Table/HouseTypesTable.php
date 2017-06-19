<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HouseTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Houses
 *
 * @method \App\Model\Entity\HouseType get($primaryKey, $options = [])
 * @method \App\Model\Entity\HouseType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HouseType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HouseType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HouseType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HouseType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HouseType findOrCreate($search, callable $callback = null, $options = [])
 */
class HouseTypesTable extends Table
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

        $this->setTable('house_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Houses', [
            'foreignKey' => 'house_type_id'
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
