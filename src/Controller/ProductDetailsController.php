<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProductDetails Controller
 *
 * @property \App\Model\Table\ProductDetailsTable $ProductDetails
 * @method \App\Model\Entity\ProductDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Product'],
        ];
        $productDetails = $this->paginate($this->ProductDetails);

        $this->set(compact('productDetails'));
        $this->viewBuilder()->setOption('serialize', ['productDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Product Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productDetail = $this->ProductDetails->get($id, [
            'contain' => ['Product'],
        ]);

        $this->set(compact('productDetail'));
        
        $this->viewBuilder()->setOption('serialize', ['productDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productDetail = $this->ProductDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $productDetail = $this->ProductDetails->patchEntity($productDetail, $this->request->getData());
            if ($this->ProductDetails->save($productDetail)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
        }
        $product = $this->ProductDetails->Product->find('list', ['limit' => 200]);
        $this->set(compact('productDetail', 'product'));
        $this->viewBuilder()->setOption('serialize', ['productDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productDetail = $this->ProductDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productDetail = $this->ProductDetails->patchEntity($productDetail, $this->request->getData());
            if ($this->ProductDetails->save($productDetail)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
        }
        $product = $this->ProductDetails->Product->find('list', ['limit' => 200]);
        $this->set(compact('productDetail', 'product'));
        $this->viewBuilder()->setOption('serialize', ['productDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productDetail = $this->ProductDetails->get($id);
        $message = "Saved";
        if (!$this->ProductDetails->delete($productDetail)) {
            $message = "Error";
        } 
        
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
