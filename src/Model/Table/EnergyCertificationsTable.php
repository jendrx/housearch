<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EnergyCertifications Model
 *
 * @property \Cake\ORM\Association\HasMany $Houses
 *
 * @method \App\Model\Entity\EnergyCertification get($primaryKey, $options = [])
 * @method \App\Model\Entity\EnergyCertification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EnergyCertification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EnergyCertification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EnergyCertification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EnergyCertification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EnergyCertification findOrCreate($search, callable $callback = null, $options = [])
 */
class EnergyCertificationsTable extends Table
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

        $this->setTable('energy_certifications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Houses', [
            'foreignKey' => 'energy_certification_id'
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
