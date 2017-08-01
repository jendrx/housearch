<?php
namespace App\Model\Table;

use Cake\I18n\Time;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Houses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $EnergyCertifications
 * @property \Cake\ORM\Association\BelongsTo $Conservations
 * @property \Cake\ORM\Association\BelongsTo $Garages
 * @property \Cake\ORM\Association\BelongsTo $Outbuildings
 * @property \Cake\ORM\Association\BelongsTo $Zones
 * @property \Cake\ORM\Association\BelongsTo $Sellers
 * @property \Cake\ORM\Association\BelongsTo $Conditions
 * @property \Cake\ORM\Association\BelongsTo $HouseTypes
 *
 * @method \App\Model\Entity\House get($primaryKey, $options = [])
 * @method \App\Model\Entity\House newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\House[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\House|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\House patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\House[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\House findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HousesTable extends Table
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

        $this->setTable('houses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('EnergyCertifications', [
            'foreignKey' => 'energy_certification_id'
        ]);
        $this->belongsTo('Conservations', [
            'foreignKey' => 'conservation_id'
        ]);
        $this->belongsTo('Garages', [
            'foreignKey' => 'garage_id'
        ]);
        $this->belongsTo('Outbuildings', [
            'foreignKey' => 'outbuilding_id'
        ]);
        $this->belongsTo('Zones', [
            'foreignKey' => 'zone_id'
        ]);
        $this->belongsTo('Sellers', [
            'foreignKey' => 'seller_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Conditions', [
            'foreignKey' => 'condition_id'
        ]);
        $this->belongsTo('HouseTypes', [
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
            ->allowEmpty('id', 'create');

        $validator
            ->integer('price')
            ->notEmpty('price');

        $validator
            ->integer('area')
            ->greaterThanOrEqual('area',0)
            ->notEmpty('area');

        $validator
            ->integer('construction_year')
            ->greaterThanOrEqual('construction_year',0)
            ->lessThanOrEqual('construction_year', Time::now()->year)
            ->notEmpty('construction_year');

        $validator
            ->url('url_ad')
            ->allowEmpty('url_ad');

        $validator
            ->allowEmpty('geom');

        $validator
            ->integer('energy_certification_year')
            ->greaterThanOrEqual('energy_certification_year',0)
            ->allowEmpty('energy_certification_year');

        $validator
            ->integer('outbuilding_area')
            ->greaterThanOrEqual('outbuilding_area',0)
            ->allowEmpty('outbuilding_area');

        $validator
            ->integer('rooms')
            ->greaterThanOrEqual('rooms',0)
            ->notEmpty('rooms');

        $validator
            ->allowEmpty('lat')
            ->latitude('lat');

        $validator
            ->allowEmpty('lon')
            ->longitude('lon');

        $validator
            ->allowEmpty('geom_json');

        $validator
            ->allowEmpty('path_pic');

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
        $rules->add($rules->existsIn(['energy_certification_id'], 'EnergyCertifications'));
        $rules->add($rules->existsIn(['conservation_id'], 'Conservations'));
        $rules->add($rules->existsIn(['garage_id'], 'Garages'));
        $rules->add($rules->existsIn(['outbuilding_id'], 'Outbuildings'));
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));
        $rules->add($rules->existsIn(['seller_id'], 'Sellers'));
        $rules->add($rules->existsIn(['condition_id'], 'Conditions'));
        $rules->add($rules->existsIn(['house_type_id'], 'HouseTypes'));

        return $rules;
    }

    public function getAll()
    {
        return $this->find('all');
    }

    public function getByZone($zone_id = null)
    {
        return $this->find('all', ['conditions' => ['zone_id' => $zone_id]]);
    }

    public function setGeoJSONProperty($house_id = null, $property = null, $value = null)
    {
        $house = $this->get($house_id);
        $geoJson = json_decode($house['location_json']);
        $geoJson['properties'][$property] = $value;
        return json_encode($geoJson);
    }

    public function toFeatureCollection($houses)
    {
        return array('type' => 'FeatureCollection', 'features' => $houses);
    }


}
