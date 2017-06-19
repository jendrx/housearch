<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Qualifications Model
 *
 * @property \Cake\ORM\Association\HasMany $Buyers
 *
 * @method \App\Model\Entity\Qualification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Qualification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Qualification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Qualification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Qualification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Qualification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Qualification findOrCreate($search, callable $callback = null, $options = [])
 */
class QualificationsTable extends Table
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

        $this->setTable('qualifications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Buyers', [
            'foreignKey' => 'qualification_id'
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
        return $this->find('list',['keyField' => 'id', 'valueField' => 'description'])->toArray();
    }
}
