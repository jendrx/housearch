<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SellerTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Sellers
 *
 * @method \App\Model\Entity\SellerType get($primaryKey, $options = [])
 * @method \App\Model\Entity\SellerType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SellerType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SellerType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SellerType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SellerType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SellerType findOrCreate($search, callable $callback = null, $options = [])
 */
class SellerTypesTable extends Table
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

        $this->setTable('seller_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Sellers', [
            'foreignKey' => 'seller_type_id'
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


    /* business logic functions*/

    public function getTypesList()
    {
        return  $this->find('list',['keyField' => 'id', 'valueField' => 'description'])->toArray();
    }
}
