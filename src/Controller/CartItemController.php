<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CartItem Controller
 *
 * @property \App\Model\Table\CartItemTable $CartItem
 * @method \App\Model\Entity\CartItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartItemController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'ProductDetails'],
        ];
        $cartItem = $this->paginate($this->CartItem);

        $this->set(compact('cartItem'));
        $this->viewBuilder()->setOption('serialize', ['cartItem']);
    }

    /**
     * View method
     *
     * @param string|null $id Cart Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cartItem = $this->CartItem->get($id, [
            'contain' => ['Users', 'ProductDetails'],
        ]);

        $this->set(compact('cartItem'));
        $this->viewBuilder()->setOption('serialize', ['cartItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cartItem = $this->CartItem->newEmptyEntity();
        if ($this->request->is('post')) {
            $cartItem = $this->CartItem->patchEntity($cartItem, $this->request->getData());
            if ($this->CartItem->save($cartItem)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
        }
        $users = $this->CartItem->Users->find('list', ['limit' => 200]);
        $productDetails = $this->CartItem->ProductDetails->find('list', ['limit' => 200]);
        $this->set(compact('cartItem', 'users', 'productDetails'));
        $this->viewBuilder()->setOption('serialize', ['cartItem', 'users', 'productDetails']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cart Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cartItem = $this->CartItem->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cartItem = $this->CartItem->patchEntity($cartItem, $this->request->getData());
            if ($this->CartItem->save($cartItem)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
        }
        $users = $this->CartItem->Users->find('list', ['limit' => 200]);
        $productDetails = $this->CartItem->ProductDetails->find('list', ['limit' => 200]);
        $this->set(compact('cartItem', 'users', 'productDetails'));
        $this->viewBuilder()->setOption('serialize', ['cartItem', 'users', 'productDetails']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cartItem = $this->CartItem->get($id);
        $message = "Saved";
        if (!$this->CartItem->delete($cartItem)) {
            $message = "Error";
        } 

        $this->viewBuilder()->setOption('serialize', ['cartItem', 'message']);
    }
}
