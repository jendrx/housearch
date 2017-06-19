<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buyers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Jobs
 * @property \Cake\ORM\Association\BelongsTo $Incomes
 * @property \Cake\ORM\Association\BelongsTo $Qualifications
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Buyer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Buyer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Buyer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Buyer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Buyer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Buyer findOrCreate($search, callable $callback = null, $options = [])
 */
class BuyersTable extends Table
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

        $this->setTable('buyers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id'
        ]);
        $this->belongsTo('Incomes', [
            'foreignKey' => 'income_id'
        ]);
        $this->belongsTo('Qualifications', [
            'foreignKey' => 'qualification_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->date('birthdate')
            ->allowEmpty('birthdate');

        $validator
            ->inList('gender',[0,1,2,9]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));
        $rules->add($rules->existsIn(['income_id'], 'Incomes'));
        $rules->add($rules->existsIn(['qualification_id'], 'Qualifications'));

        return $rules;
    }

    public function is_registered($user_id)
    {
        return $this->exists(['conditions' => ['user_id' => $user_id]]);
    }
}
