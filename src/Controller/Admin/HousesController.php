<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Houses Controller
 *
 * @property \App\Model\Table\HousesTable $Houses
 *
 * @method \App\Model\Entity\House[] paginate($object = null, array $settings = [])
 */
class HousesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['EnergyCertifications', 'Conservations', 'Conditions', 'Garages', 'Outbuildings', 'Zones', 'Sellers', 'HouseTypes']
        ];
        $houses = $this->paginate($this->Houses);

        $this->set(compact('houses'));
        $this->set('_serialize', ['houses']);
    }

    /**
     * View method
     *
     * @param string|null $id House id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $house = $this->Houses->get($id, [
            'contain' => ['EnergyCertifications', 'Conservations', 'Conditions', 'Garages', 'Outbuildings', 'Zones', 'Sellers', 'HouseTypes']
        ]);

        $this->set('house', $house);
        $this->set('_serialize', ['house']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $house = $this->Houses->newEntity();
        if ($this->request->is('post')) {
            $house = $this->Houses->patchEntity($house, $this->request->getData());
            if ($this->Houses->save($house)) {
                $this->Flash->success(__('The house has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The house could not be saved. Please, try again.'));
        }
        $energyCertifications = $this->Houses->EnergyCertifications->find('list', ['limit' => 200]);
        $conservations = $this->Houses->Conservations->find('list', ['limit' => 200]);
        $conditions = $this->Houses->Conditions->find('list', ['limit' => 200]);
        $garages = $this->Houses->Garages->find('list', ['limit' => 200]);
        $outbuildings = $this->Houses->Outbuildings->find('list', ['limit' => 200]);
        $zones = $this->Houses->Zones->find('list', ['limit' => 200]);
        $sellers = $this->Houses->Sellers->find('list', ['limit' => 200]);
        $houseTypes = $this->Houses->HouseTypes->find('list', ['limit' => 200]);
        $this->set(compact('house', 'energyCertifications', 'conservations', 'conditions', 'garages', 'outbuildings', 'zones', 'sellers', 'houseTypes'));
        $this->set('_serialize', ['house']);
    }

    /**
     * Edit method
     *
     * @param string|null $id House id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $house = $this->Houses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $house = $this->Houses->patchEntity($house, $this->request->getData());
            if ($this->Houses->save($house)) {
                $this->Flash->success(__('The house has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The house could not be saved. Please, try again.'));
        }
        $energyCertifications = $this->Houses->EnergyCertifications->find('list', ['limit' => 200]);
        $conservations = $this->Houses->Conservations->find('list', ['limit' => 200]);
        $conditions = $this->Houses->Conditions->find('list', ['limit' => 200]);
        $garages = $this->Houses->Garages->find('list', ['limit' => 200]);
        $outbuildings = $this->Houses->Outbuildings->find('list', ['limit' => 200]);
        $zones = $this->Houses->Zones->find('list', ['limit' => 200]);
        $sellers = $this->Houses->Sellers->find('list', ['limit' => 200]);
        $houseTypes = $this->Houses->HouseTypes->find('list', ['limit' => 200]);
        $this->set(compact('house', 'energyCertifications', 'conservations', 'conditions', 'garages', 'outbuildings', 'zones', 'sellers', 'houseTypes'));
        $this->set('_serialize', ['house']);
    }

    /**
     * Delete method
     *
     * @param string|null $id House id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $house = $this->Houses->get($id);
        if ($this->Houses->delete($house)) {
            $this->Flash->success(__('The house has been deleted.'));
        } else {
            $this->Flash->error(__('The house could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
