<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Conservations Model
 *
 * @property \Cake\ORM\Association\HasMany $Houses
 *
 * @method \App\Model\Entity\Conservation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Conservation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Conservation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Conservation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conservation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Conservation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Conservation findOrCreate($search, callable $callback = null, $options = [])
 */
class ConservationsTable extends Table
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

        $this->setTable('conservations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Houses', [
            'foreignKey' => 'conservation_id'
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
}
