<?php
namespace App\Controller;


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
        /*$this->paginate = [
            'contain' => ['EnergyCertifications', 'Conservations', 'Conditions', 'Garages', 'Outbuildings', 'Zones', 'Sellers']
        ];*/
        $houses = $this->paginate($this->Houses,['maxLimit' => 10]);
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
        $this->loadModel('Regions');
        $this->loadModel('Zones');
        $this->loadModel('Users');

        $house = $this->Houses->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $zone_id = '';
            $lat = null;
            $lon = null;
            $location = '';

            // if absolute
            if($data['lat'] != '' or $data['lon'] != '')
            {
                $zone_id = $this->Zones->getZoneIntersectPoint(floatval($data['lon']),floatval($data['lat']));

                if($zone_id == null or $this->Zones->isResidual($zone_id))
                {
                    $this->Flash->error(__('This location is not allowed'));
                }
                $lat = $data['lat'];
                $lon = $data['lon'];
                $location = 'a';
            }
            //if zonal
            else
            {
                if($data['zone_id'] == '')
                {
                    $this->Flash->error(__('You must select a zone'));
                }
                else{
                    $zone_id = $data['zone_id'];
                    $centroid = json_decode($this->Zones->getCentroid($zone_id));
                    $lat = $centroid->lat;
                    $lon = $centroid->lon;
                    $location = 'z';
                }
            }

            if($zone_id != '')
            {
                $user = $this->Auth->user();
                $seller_id = $this->Users->getSellerId($user['id']);

                $house = $this->Houses->patchEntity($house,$data,
                    ['fieldList' =>
                        ['price', 'area', 'construction_year', 'condition_id', 'rooms',
                            'garage_id', 'outbuilding_id', 'outbuilding_area', 'energy_certification_id', 'energy_certification_year', 'house_type_id', 'url_ad']]);

                $house->set('seller_id', $seller_id);
                $house->set('zone_id', $zone_id);
                $house->set('lat', $lat);
                $house->set('lon', $lon);
                $house->set('geom', $this->Houses->toGeometry($lat,$lon));
                $house->set('geom_json', json_decode($this->Houses->toGeoJSON($lat,$lon)));
                $house->set('location', $location);

                if ($this->Houses->save($house)) {
                    $this->Flash->success(__('The house has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The house could not be saved. Please, try again.'));
            }

        }
        $energyCertifications = $this->Houses->EnergyCertifications->getList();
        $conservations = $this->Houses->Conservations->getList();
        $conditions = $this->Houses->Conditions->getList();
        $garages = $this->Houses->Garages->getList();
        $outbuildings = $this->Houses->Outbuildings->getList();
        $zones = $this->Houses->Zones->find('list', ['limit' => 200]);
        $sellers = $this->Houses->Sellers->find('list', ['limit' => 200]);
        $houseTypes = $this->Houses->HouseTypes->getList();

        $parishes = $this->Regions->getParishesList();

        $this->set(compact('house', 'energyCertifications', 'conservations', 'conditions', 'garages', 'outbuildings', 'zones', 'sellers', 'houseTypes','parishes'));
        $this->set('_serialize', ['house','parishes']);
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
