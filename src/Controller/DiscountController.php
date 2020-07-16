<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Discount Controller
 *
 * @property \App\Model\Table\DiscountTable $Discount
 * @method \App\Model\Entity\Discount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiscountController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $discount = $this->paginate($this->Discount);

        $this->set(compact('discount'));
        $this->viewBuilder()->setOption('serialize', ['discount']);
    }

    /**
     * View method
     *
     * @param string|null $id Discount id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $discount = $this->Discount->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set(compact('discount'));
        $this->viewBuilder()->setOption('serialize', ['discount']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $discount = $this->Discount->newEmptyEntity();
        if ($this->request->is('post')) {
            $discount = $this->Discount->patchEntity($discount, $this->request->getData());
            if ($this->Discount->save($discount)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
        }
        $this->set(compact('discount'));
        
        $this->viewBuilder()->setOption('serialize', ['discount']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Discount id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $discount = $this->Discount->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $discount = $this->Discount->patchEntity($discount, $this->request->getData());
            if ($this->Discount->save($discount)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
        }
        $this->set(compact('discount'));
        
        $this->viewBuilder()->setOption('serialize', ['discount']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Discount id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $discount = $this->Discount->get($id);
        $message = "Saved";
        if ($this->Discount->delete($discount)) {
            $message = "Error";
        } 

        $this->viewBuilder()->setOption('serialize', ['discount']);
    }
}
