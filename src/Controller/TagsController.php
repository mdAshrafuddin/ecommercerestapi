<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 * @method \App\Model\Entity\Tag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TagsController extends AppController
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
        $tags = $this->paginate($this->Tags);

        $this->set(compact('tags'));
        $this->viewBuilder()->setOption('serialize', ['tags']);
    }

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Product'],
        ]);

        $this->set(compact('tag'));
        $this->viewBuilder()->setOption('serialize', ['tag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tag = $this->Tags->newEmptyEntity();
        if ($this->request->is('post')) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
            
        }
        $product = $this->Tags->Product->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'product'));
        $this->viewBuilder()->setOption('serialize', ['tag', 'product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $message = "Saved";
            } else {
                $message = "Error";
            }
            
        }

        $product = $this->Tags->Product->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'product'));
        $this->viewBuilder()->setOption('serialize', ['tag', 'product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tag = $this->Tags->get($id);
        $message = "Saved";
        if (!$this->Tags->delete($tag)) {
            $message = "Error";
        } 

        return $this->redirect(['action' => 'index']);
    }
}
