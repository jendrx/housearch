<?php
namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Zones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Regions
 * @property \Cake\ORM\Association\HasMany $Houses
 * @property \Cake\ORM\Association\HasMany $Samples
 *
 * @method \App\Model\Entity\Zone get($primaryKey, $options = [])
 * @method \App\Model\Entity\Zone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Zone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Zone|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Zone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Zone findOrCreate($search, callable $callback = null, $options = [])
 */
class ZonesTable extends Table
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

        $this->setTable('zones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id'
        ]);
        $this->hasMany('Houses', [
            'foreignKey' => 'zone_id'
        ]);
        $this->hasMany('Samples', [
            'foreignKey' => 'zone_id'
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
            ->allowEmpty('geom');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('geom_json');

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
        $rules->add($rules->existsIn(['region_id'], 'Regions'));

        return $rules;
    }

    public function getParishesZonesGeoJSON($id = null)
    {
        return $this->find('all',['conditions' => ['region_id' => $id], 'fields' => ['geom_json']]);
    }

    public function getZoneIntersectPoint($lng = null,$lat = null)
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->prepare('Select id as zone_id  from zones where ST_WITHIN(ST_SetSRID(ST_MakePoint(:r_lng, :r_lat),4326),geom)');


        $stmt->bindValue('r_lat', $lat, 'float');
        $stmt->bindValue('r_lng', $lng, 'float');


        $stmt->execute();
        $zone_id = $stmt->fetch('assoc')['zone_id'];

        return $zone_id;

    }

    public function isResidual($id = null)
    {
        return $this->exists(['id' => $id, 'lug_code' => '999999']);
    }
}
