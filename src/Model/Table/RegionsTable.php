<?php
namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Regions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentRegions
 * @property \Cake\ORM\Association\HasMany $ChildRegions
 * @property \Cake\ORM\Association\HasMany $Zones
 *
 * @method \App\Model\Entity\Region get($primaryKey, $options = [])
 * @method \App\Model\Entity\Region newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Region[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Region|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Region patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Region[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Region findOrCreate($search, callable $callback = null, $options = [])
 */
class RegionsTable extends Table
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

        $this->addBehavior('Tree',
            ['parent' => 'parent_id',
                'left' => 'lft',
                'right' => 'rght',
                'level' => 'level']);

        $this->setTable('regions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentRegions', [
            'className' => 'Regions',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildRegions', [
            'className' => 'Regions',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Zones', [
            'foreignKey' => 'region_id'
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
            ->allowEmpty('geom');

        $validator
            ->allowEmpty('geom_json');

        $validator
            ->integer('admin_level')
            ->allowEmpty('admin_level');

        $validator
            ->allowEmpty('parent_dicofre');

        $validator
            ->allowEmpty('dicofre');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentRegions'));

        return $rules;
    }

    public function getParishesList()
    {
        return $this->find('list', ['keyField' => 'id', 'valueField' => 'name', 'conditions' => ['admin_level' => 6]]);
    }

    public function  getChildrenSubSections($id = null)
    {
        return $this->find('children',['for' => $id, 'conditions' => ['admin_level' => 8]])->toArray();
    }

    public function getSubSectionsGeoJSON($id = null)
    {
        return $this->find('children',['for' => $id, 'conditions' => ['admin_level' => 8],'fields' => ['geom_json']])->toArray();
    }

    public function getChildrenParishes($id = null)
    {
        return $this->find('children',['for' => $id, 'conditions' => ['admin_level' => 6]])->toArray();
    }

    public function toFeatureCollection($territories = null)
    {
        $result = array();
        foreach ($territories as $territory)
        {
            array_push($result,($territory['geom_json']));
        }
        return array( 'type' => 'FeatureCollection', 'features' => $result);

    }


    public function getCentroid($id = null)
    {
        $conn = ConnectionManager::get('default');

        $stmt = $conn->prepare('Select row_to_json(row) as centroid  from (Select ST_X(centroid) as lon, ST_Y(centroid) as lat  from  
			( Select ST_Centroid((Select  geom from regions where id =:r_id)) as centroid) p) row');

        $stmt->bindValue('r_id', $id, 'integer');

        $stmt->execute();
        $row = $stmt->fetch('assoc')['centroid'];

        return $row;

    }



}
