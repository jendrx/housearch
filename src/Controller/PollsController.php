<?php
/**
 * Created by PhpStorm.
 * User: rom
 * Date: 7/13/17
 * Time: 11:16 AM
 */

namespace App\Controller;


class PollsController extends AppController
{
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

    public function getResults()
    {
        $this->loadModel('Zones');

        $this->loadModel('SamplesPolls');

        /*Select zone_id, rank, geom_json from samples_polls
	inner join samples on sample_id = samples.id
	inner join Zones on Samples.zone_id = Zones.id where poll_id = 234 order by rank*/

        $this->SamplesPolls->find('all', ['conditions' => ['poll_id' => $poll_id]]);

    }


}