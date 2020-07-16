<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Address', 'Discount'],
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->viewBuilder()->setOption('serialize', ['orders']);
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Users', 'Address', 'Discount'],
        ]);

        $this->set(compact('order'));
        $this->viewBuilder()->setOption('serialize', ['order']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
        }

        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $address = $this->Orders->Address->find('list', ['limit' => 200]);
        $discount = $this->Orders->Discount->find('list', ['limit' => 200]);
        $this->set(compact('order', 'users', 'address', 'discount'));
        $this->viewBuilder()->setOption('serialize', ['discount', 'order', 'users', 'address', 'message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
        }

        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $address = $this->Orders->Address->find('list', ['limit' => 200]);
        $discount = $this->Orders->Discount->find('list', ['limit' => 200]);
        $this->set(compact('order', 'users', 'address', 'discount'));
        $this->viewBuilder()->setOption('serialize', ['discount', 'order', 'users', 'address', 'message']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        $message = "Saved";
        if (!$this->Orders->delete($order)) {
            $message = "Error";
        } 

        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
