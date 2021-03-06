<?php
/**
 * Created by PhpStorm.
 * User: rom
 * Date: 7/13/17
 * Time: 11:16 AM
 */

namespace App\Controller;


use Cake\Event\Event;

class PollsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub
        //$this->Auth->allow(['add','initPoll','getNext','vor']);
    }

    public function initPoll()
    {
        $buyer_id = null;
        $poll_id = null;
        if ($this->request->is('ajax')) {
            $params = $this->request->getQueryParams();
            $buyer_id = $params['buyer_id'];
            $poll_id = $this->Polls->init($buyer_id);
        }

        $this->set(compact('buyer', 'poll_id'));
        $this->set('_serialize', ['buyer', 'poll_id']);
    }

    public function getNext()
    {
        $poll_id = null;
        $pair = null;
        if ($this->request->is('ajax')) {
            $params = $this->request->getQueryParams();
            $poll_id = $params['poll_id'];
            $pair = $this->Polls->getNext($poll_id);
            $done = false;

            if ($pair == null)
                $done = true;
        }
        $this->set(compact('pair', 'done'));
        $this->set('_serialize', ['pair', 'done']);

    }

    public function vote()
    {
        $match_id = null;
        $winner = null;
        if ($this->request->is('ajax')) {
            $params = $this->request->getData();
            $match_id = $params['match_id'];
            $winner = $params['winner'];
            $this->Polls->vote($match_id, $winner);

        }
        $this->set(compact('match_id', 'winner'));
        $this->set('_serialize', ['match_id', 'winner']);
    }

    public function getRank()
    {
        $rank = null;
        if($this->request->is('ajax'))
        {
            $params = $this->request->getQueryParams();
            $poll_id = $params['poll_id'];
            $rank = $this->Polls->getRank($poll_id);
        }

        $this->set(compact('rank'));
        $this->set('_serialize',['rank']);
    }

    public function result($poll_id = null)
    {
        $this->loadModel('Zones');

        $this->loadModel('SamplesPolls');

        $samples = $this->SamplesPolls->find('all', ['conditions' => ['poll_id' => $poll_id], 'contain' => ['Samples' => ['ZoneCategories' => ['Zones']]]]);


        $zones = $this->SamplesPolls->find('all', ['conditions' => ['SamplesPolls.poll_id' => $poll_id]])
            ->select(['SamplesPolls.rank', 'zones.geom_json'])
            ->enableAutoFields(false)
            ->join(['table' => 'samples', 'conditions' => ['SamplesPolls.sample_id = samples.id']])
            ->join(['table' => 'zones', 'conditions' => ['Samples.zone_category_id = zones.zone_category_id']]);

        $zonesGeoJSON = array();
        foreach ($zones as $zone) {
            $geom_json = json_decode($zone['zones']['geom_json'], true);
            $geom_json['properties']['rank'] = $zone['rank'];
            array_push($zonesGeoJSON,$geom_json);
        }
        $zones = array('type' => 'FeatureCollection', 'features' => $zonesGeoJSON);
        $this->set(compact('zones'));
        $this->set('_serialize', ['zones']);
    }


}