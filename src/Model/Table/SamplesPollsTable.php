<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * SamplesPolls Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Polls
 * @property \Cake\ORM\Association\BelongsTo $Samples
 *
 * @method \App\Model\Entity\SamplesPoll get($primaryKey, $options = [])
 * @method \App\Model\Entity\SamplesPoll newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SamplesPoll[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SamplesPoll|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SamplesPoll patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SamplesPoll[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SamplesPoll findOrCreate($search, callable $callback = null, $options = [])
 */
class SamplesPollsTable extends Table
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

        $this->setTable('samples_polls');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Polls', [
            'foreignKey' => 'poll_id'
        ]);
        $this->belongsTo('Samples', [
            'foreignKey' => 'sample_id'
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
            ->notEmpty('buyer_id');

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
        $rules->add($rules->existsIn(['poll_id'], 'Polls'));
        $rules->add($rules->existsIn(['sample_id'], 'Samples'));

        return $rules;
    }


    public function getSamplesIds($poll = null)
    {
        $ids = [];
        $samples = $this->find('all', ['conditions' => ['poll_id' => $poll]])->toArray();

        foreach ($samples as $sample) {
            array_push($ids, $sample['sample_id']);
        }

        return $ids;
    }

    public function getSamples($poll = null)
    {
        return $this->find('all', ['conditions' => ['poll_id' => $poll]])->toArray();

    }

    public function setPosition($poll_id = null, $sample_id = null, $position = null)
    {
        $sample_poll_id = $this->find('all', ['fields' => ['id'], 'conditions' => [['and' => [['poll_id' => $poll_id], ['sample_id' => $sample_id]]]]])->first()['id'];
        $sample_poll = $this->get($sample_poll_id);
        $sample_poll->set('rank', $position);
        $this->save($sample_poll);
    }

    public function getPosition($poll_id = null, $target = null)
    {
        return $this->find('all',['conditions' => [ 'and' => [['poll_id' => $poll_id], ['sample_id' => $target]]], 'fields' => ['rank']])->first()['rank'];

    }

    public function rankSample($poll_id = null, $target = null, $parent = null, $placeAt = null, $offset = null)
    {
        $position = $offset + 1;
        if($parent !== null)
        {
            if($placeAt == 0)
            {
                $position = $this->getPosition($poll_id,$parent) + $offset + 1;
            }
            else
            {
                $position = $this->getPosition($poll_id,$parent) - $offset - 1;
            }
        }
        $this->setPosition($poll_id,$target,$position);
    }

    public function getSampleRank($poll_id = null)
    {
        return $this->find('all', ['order' => ['rank' => 'asc'], 'conditions' => ['poll_id' => $poll_id],
                                        'fields' => ['SamplesPolls.id','SamplesPolls.rank','Samples.id','Samples.lat', 'Samples.lon','Samples.zone_id','Samples.zone_category_id']])->contain(['Samples']);
    }

}
