<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 * @property \Cake\ORM\Association\HasMany $Buyers
 * @property \Cake\ORM\Association\HasMany $Sellers
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->hasMany('Buyers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Sellers', [
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
            ->notEmpty('email')
            ->email('email');

        $validator
            ->sameAs('password','repass', 'Fields doesn\'t match')
            ->notEmpty('password');

        $validator
            ->sameAs('repass','password','Fields doesn\'t match')
            ->notEmpty('repass');

        $validator
            ->notEmpty('fname');

        $validator
            ->notEmpty('lname');

        $validator
            ->notEmpty('role_id');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }

    public function getSellerId($id = null)
    {
        $sellers = TableRegistry::get('Sellers');

        return $sellers->find('all',[ 'conditions' => ['user_id' => $id],'fields' => ['id']])->first()['id'];
    }

    public function getBuyerId($id = null)
    {
        $buyers = TableRegistry::get('Buyers');
        return $buyers->find('all',[ 'conditions' => ['user_id' => $id],'fields' => ['id']])->first()['id'];
    }

    public function isBuyer($id = null)
    {
        return $this->exists(['id' => $id],['role_id' => 3]);
    }

    public function isSeller($id = null)
    {
        return $this->exists(['id' => $id],['role_id' => 2]);
    }

}
