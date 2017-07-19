<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub

        $this->Auth->allow(['roleChooser','logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Sellers', 'Buyers']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Sellers', 'Buyers']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $data =  $this->request->getData();
            $user = $this->Users->patchEntity($user, $data);

            echo json_encode($data);



            if ($this->Users->save($user)) {

                echo json_encode($user);

                $this->Flash->success(__('The user has been saved.'));
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $roles = $this->Users->Roles->getUserRolesList();
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $sellers = $this->Users->Sellers->find('list', ['limit' => 200]);
        $buyers = $this->Users->Buyers->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'sellers', 'buyers'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                if($user['role_id'] == 2)
                {
                    return $this->redirect(['controller' => 'sellers', 'action' =>  'home']);
                }

                if($user['role_id'] == 3)
                {
                    return $this->redirect(['controller' => 'buyers', 'action' => 'home']);
                }
                //return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }

    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function roleChooser()
    {
        $this->loadModel('Roles');
        if($this->request->is('post'))
        {
            $data = $this->request->getData();
            $role = $data['role_id'];

            if($role == 2)
            {
                $this->redirect(['controller' => 'sellers', 'action' => 'add']);
            }else if ($role == 3)
            {
                $this->redirect(['controller' => 'buyers', 'action' => 'add']);
            }
            else
            {
                $this->Flash->error(__('Invalid choice'));
            }

        }

        $roles = $this->Roles->getUserRolesList();
        $this->set(compact('roles'));
        $this->set('_serialize',['roles']);

    }


}
