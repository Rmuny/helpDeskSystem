<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Solutions Controller
 *
 * @property \App\Model\Table\SolutionsTable $Solutions
 * @method \App\Model\Entity\Solution[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SolutionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];
        $solutions = $this->paginate($this->Solutions, ['limit' => 5]);

        $this->set(compact('solutions'));
    }

    /**
     * View method
     *
     * @param string|null $id Solution id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $solution = $this->Solutions->get($id, [
            'contain' => ['Categories'],
        ]);

        $this->set(compact('solution'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $solution = $this->Solutions->newEmptyEntity();
        if ($this->request->is('post')) {
            $solution = $this->Solutions->patchEntity($solution, $this->request->getData());
            if ($this->Solutions->save($solution)) {
                $this->Flash->success(__('The solution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The solution could not be saved. Please, try again.'));
        }
        $categories = $this->Solutions->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('solution', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Solution id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $solution = $this->Solutions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $solution = $this->Solutions->patchEntity($solution, $this->request->getData());
            if ($this->Solutions->save($solution)) {
                $this->Flash->success(__('The solution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The solution could not be saved. Please, try again.'));
        }
        $categories = $this->Solutions->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('solution', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Solution id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $solution = $this->Solutions->get($id);
        if ($this->Solutions->delete($solution)) {
            $this->Flash->success(__('The solution has been deleted.'));
        } else {
            $this->Flash->error(__('The solution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
