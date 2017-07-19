<?php
namespace App\Model\Table;

use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Samples Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Zones
 * @property \Cake\ORM\Association\BelongsTo $ZoneCategories
 * @property \Cake\ORM\Association\BelongsToMany $Polls
 *
 * @method \App\Model\Entity\Sample get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sample newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sample[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sample|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sample patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sample[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sample findOrCreate($search, callable $callback = null, $options = [])
 */
class SamplesTable extends Table
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

        $this->setTable('samples');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Zones', [
            'foreignKey' => 'zone_id'
        ]);
        $this->belongsTo('ZoneCategories', [
            'foreignKey' => 'zone_category_id'
        ]);
        $this->belongsToMany('Polls', [
            'foreignKey' => 'sample_id',
            'targetForeignKey' => 'poll_id',
            'joinTable' => 'samples_polls'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('url_pic');

        $validator
            ->allowEmpty('path_pic');

        $validator
            ->allowEmpty('point');

        $validator
            ->allowEmpty('point_json');

        $validator
            ->numeric('lat')
            ->allowEmpty('lat');

        $validator
            ->numeric('lon')
            ->allowEmpty('lon');

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
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));
        $rules->add($rules->existsIn(['zone_category_id'], 'ZoneCategories'));

        return $rules;
    }

    public function getRandomZoneCategorySample($zone = null)
    {
        return $this->find('all',['conditions' => ['zone_category_id' => $zone], 'order' => 'random()'])->first();

    }

    public function getRandomSamples()
    {
        $zoneCategories = TableRegistry::get('ZoneCategories');

        $samples = [];
        foreach($zoneCategories->getAllIds() as $zoneCategory)
        {

            array_push($samples,$this->getRandomZoneCategorySample($zoneCategory['id']));

        }
        return $samples;
    }
}
