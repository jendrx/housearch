<?php
namespace App\Model\Table;

use Cake\I18n\Time;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Datasource;

/**
 * Polls Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Buyers
 * @property \Cake\ORM\Association\HasMany $Matches
 * @property \Cake\ORM\Association\BelongsToMany $Samples
 *
 * @method \App\Model\Entity\Poll get($primaryKey, $options = [])
 * @method \App\Model\Entity\Poll newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Poll[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Poll|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Poll patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Poll[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Poll findOrCreate($search, callable $callback = null, $options = [])
 */
class PollsTable extends Table
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

        $this->setTable('polls');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Buyers', [
            'foreignKey' => 'buyer_id'
        ]);
        $this->hasMany('Matches', [
            'foreignKey' => 'poll_id'
        ]);
        $this->belongsToMany('Samples', [
            'foreignKey' => 'poll_id',
            'targetForeignKey' => 'sample_id',
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
            ->dateTime('finished')
            ->allowEmpty('finished');

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
        $rules->add($rules->existsIn(['buyer_id'], 'Buyers'));
        return $rules;
    }



    /** Create poll entity,associated samples and first round of matches*/
    /* if success return id of poll else return null*/
    public function init($buyer = null)
    {
        if ($buyer == null)
            return null;

        /* set into db poll info and samples used at this poll*/
        $poll = $this->newEntity();
        $poll->set('buyer_id', $buyer);
        $poll->set('samples', $this->Samples->getRandomSamples());
        if (!$this->save($poll)) {
            return null;
        }

        $samplesIds = $this->SamplesPolls->getSamplesIds($poll['id']);

        if (!$this->setTarget($poll['id'], $samplesIds,null ,null,null))
            return null;

        return $poll;

    }

    // return poll if user has been opened
    public function isOpen($buyer = null)
    {
        return $this->find('all',['conditions' =>[ 'and' => [['buyer_id' => $buyer],['finished is null']]]])->first();
    }

    /* given a samples this method set a several mathces to a given poll*/
    public function setTarget($poll_id = null,$samples = null, $round = null, $parent = null, $placeAt = null)
    {
        $poll = $this->get($poll_id);
        $target = array_shift($samples);
        $matches = [];
        foreach($samples as $sample)
        {
            $match = $this->Matches->newEntity();
            $match->set('poll_id', $poll_id);
            $match->set('round',  $round);
            $match->set('target', $target);
            $match->set('optone', $target);
            $match->set('opttwo', $sample);
            $match->set('parent', $parent);
            $match->set('placeat', $placeAt);

            array_push($matches,$match);
        }

        $poll->set('matches',$matches);

        if(!$this->save($poll))
        {
            return false;
        }
        return true;
    }

    /*get next available pair*/
    public function nextPair($poll = null)
    {
        $match = $this->Matches->find('all', ['conditions' => [[ 'and' => [['poll_id' => $poll], ['winner is null']]]]])->first();
        $optOne = $this->Samples->get($match['optone']);
        $optTwo = $this->Samples->get($match['opttwo']);
        return array('poll_id' => $match['poll_id'], 'match_id' => $match['id'], 'round' => $match['round'], 'optOne' => $optOne, 'optTwo' => $optTwo);
    }

    /* check if current round being played has more matches*/
    public function targetHasMatches($poll = null, $target = null)
    {
        return $this->Matches->exists(['poll_id' => $poll,'target' => $target,'winner is null']);
    }

    public function hasMoreMatches($poll = null)
    {
        return $this->Matches->exists(['poll_id' => $poll,'winner is null']);
    }
    /* returns null or last poll match*/
    public function getLastMatch($poll)
    {
        return $this->Matches->find('all',['conditions' => ['poll_id' => $poll], 'order' => ['id' => 'desc']])->first();
    }

    public function getLastVotedMatch($poll)
    {
        return $this->Matches->find('all',['conditions' => ['and' => [['poll_id' => $poll], ['winner is not null']]],'order' => ['id' => 'desc']])->first();
    }

    /* vote in a match*/
    public function vote($match_id = null, $winner = null)
    {
        $match = $this->Matches->get($match_id);
        $match->set('winner', $winner);
        if(!$this->Matches->save($match))
            return false;
        return true;
    }

    public function getNext($poll = null)
    {
        // check if this exists
        if (!$this->exists(['id' => $poll]))
            return null;

        $match = $this->getLastVotedMatch($poll);

        if($match === null)
            $match = $this->getLastMatch($poll);

        if($this->targetHasMatches($poll,$match['target']))
        {
            return $this->nextPair($poll);
        }

        $highest = $this->Matches->getTargetHighest($poll, $match['target']);
        $highestLength = count($highest);

        $lowest = $this->Matches->getTargetLowest($poll, $match['target']);
        $lowestLength = count($lowest);

        if($highestLength == 1)
        {
            //$this->SamplesPolls->rankSample($poll,$highest[0],$match['parent'],$match['placeat'],0);
        }
        else if($highestLength > 1)
        {
            $this->setTarget($poll, $highest, null, $match['target'],1);

        }

        //$this->SamplesPolls->rankSample($poll, $match['target'], $match['parent'], $match['placeat'], $highestLength);

        if ($lowestLength == 1)
        {
            //$this->SamplesPolls->rankSample($poll, $lowest[0], $target, $placeAt, 0);
        }
        else if($lowestLength > 1)
        {
            $this->setTarget($poll, $lowest, null, $match['target'], 0);
        }

        if(!$this->hasMoreMatches($poll))
        {
            $this->setFinished($poll);
            return null;

        }

        return $this->nextPair($poll);
    }

    public function setFinished($poll_id = null)
    {
        $poll = $this->get($poll_id);
        $ts = Time::now();
        $poll->set('finished',$ts);
        $this->save($poll);
    }


}
