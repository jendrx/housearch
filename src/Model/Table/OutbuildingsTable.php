<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Outbuildings Model
 *
 * @property \Cake\ORM\Association\HasMany $Houses
 *
 * @method \App\Model\Entity\Outbuilding get($primaryKey, $options = [])
 * @method \App\Model\Entity\Outbuilding newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Outbuilding[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Outbuilding|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Outbuilding patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Outbuilding[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Outbuilding findOrCreate($search, callable $callback = null, $options = [])
 */
class OutbuildingsTable extends Table
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

        $this->setTable('outbuildings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Houses', [
            'foreignKey' => 'outbuilding_id'
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
