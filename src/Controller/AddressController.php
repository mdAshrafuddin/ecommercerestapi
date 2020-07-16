<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Address Controller
 *
 * @property \App\Model\Table\AddressTable $Address
 * @method \App\Model\Entity\Addres[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddressController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $address = $this->paginate($this->Address);

        $this->set(compact('address'));
        
        $this->viewBuilder()->setOption('serialize', ['address']);
    }

    /**
     * View method
     *
     * @param string|null $id Addres id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $address = $this->Address->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('address'));
        $this->viewBuilder()->setOption('serialize', ['address']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $address = $this->Address->newEmptyEntity();
        if ($this->request->is('post')) {
            $address = $this->Address->patchEntity($address, $this->request->getData());
            if ($this->Address->save($address)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
        }
        $users = $this->Address->Users->find('list', ['limit' => 200]);
        $this->set(compact('address', 'users', 'message'));
        $this->viewBuilder()->setOption('serialize', ['address', 'users', 'message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Addres id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $address = $this->Address->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $address = $this->Address->patchEntity($address, $this->request->getData());
            if ($this->Address->save($address)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
        }
        $users = $this->Address->Users->find('list', ['limit' => 200]);
        $this->set(compact('address', 'users', 'message'));
        $this->viewBuilder()->setOption('serialize', ['address', 'users', 'message']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Addres id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $address = $this->Address->get($id);
        $message = "Saved";
        if (!$this->Address->delete($addres)) {
           $message = "Error";
        } 

        $this->viewBuilder()->setOption('serialize', ['address', 'message']);
    }
}
