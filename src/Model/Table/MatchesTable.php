<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Matches Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Polls
 *
 * @method \App\Model\Entity\Match get($primaryKey, $options = [])
 * @method \App\Model\Entity\Match newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Match[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Match|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Match patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Match[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Match findOrCreate($search, callable $callback = null, $options = [])
 */
class MatchesTable extends Table
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

        $this->setTable('matches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Polls', [
            'foreignKey' => 'poll_id'
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
            ->allowEmpty('round');

        $validator
            ->allowEmpty('target');

        $validator
            ->allowEmpty('optone');

        $validator
            ->allowEmpty('opttwo');

        $validator
            ->allowEmpty('winner');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validatings
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['poll_id'], 'Polls'));

        return $rules;
    }

    public function getAll()
    {
        return $this->find('all');
    }

    public function getHighestAtRound($poll = null,$round = null)
    {
        return $this->find('all',['fields' => 'optTwo','conditions' => [['and' => [['poll_id' => $poll], ['winner <> target' ], ['round' => $round]]]]]);
    }

    public function getLowestAtRound($poll = null,$round = null)
    {
        return $this->find('all',['fields' => 'optTwo', 'conditions' => [['and' => [['poll_id' => $poll],['winner = target'], ['round' => $round]]]]]);
    }


    public function getTargetHighest($poll = null,$target = null)
    {
        $optTwo = $this->find('all',['fields' => 'optTwo', 'conditions' => [['and' => [['poll_id' => $poll], ['winner <> target' ], ['target' => $target]]]]])->toArray();
        $highest = array();
        foreach ($optTwo as $opt)
        {
            array_push($highest,$opt['optTwo']);
        }
        return $highest;
    }

    public function getTargetLowest($poll = null,$target = null)
    {
        $optTwo = $this->find('all',['fields' => 'optTwo', 'conditions' => [['and' => [['poll_id' => $poll],['winner = target'], ['target' => $target]]]]]);

        $lowest = array();

        foreach($optTwo as $opt)
        {
            array_push($lowest, $opt['optTwo']);
        }
        return $lowest;
    }

}
