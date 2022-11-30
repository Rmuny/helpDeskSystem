<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TicketAssign Controller
 *
 * @property \App\Model\Table\TicketAssignTable $TicketAssign
 * @method \App\Model\Entity\TicketAssign[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TicketAssignController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tickets', 'Staffs'],
        ];
        $ticketAssign = $this->paginate($this->TicketAssign);

        $this->set(compact('ticketAssign'));
    }

    /**
     * View method
     *
     * @param string|null $id Ticket Assign id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticketAssign = $this->TicketAssign->get($id, [
            'contain' => ['Tickets', 'Staffs'],
        ]);

        $this->set(compact('ticketAssign'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticketAssign = $this->TicketAssign->newEmptyEntity();
        if ($this->request->is('post')) {
            $ticketAssign = $this->TicketAssign->patchEntity($ticketAssign, $this->request->getData());
            if ($this->TicketAssign->save($ticketAssign)) {
                $this->Flash->success(__('The ticket assign has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket assign could not be saved. Please, try again.'));
        }
        $tickets = $this->TicketAssign->Tickets->find('list', ['limit' => 200])->all();
        $staffs = $this->TicketAssign->Staffs->find('list', ['limit' => 200])->all();
        $this->set(compact('ticketAssign', 'tickets', 'staffs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket Assign id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticketAssign = $this->TicketAssign->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticketAssign = $this->TicketAssign->patchEntity($ticketAssign, $this->request->getData());
            if ($this->TicketAssign->save($ticketAssign)) {
                $this->Flash->success(__('The ticket assign has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket assign could not be saved. Please, try again.'));
        }
        $tickets = $this->TicketAssign->Tickets->find('list', ['limit' => 200])->all();
        $staffs = $this->TicketAssign->Staffs->find('list', ['limit' => 200])->all();
        $this->set(compact('ticketAssign', 'tickets', 'staffs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket Assign id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticketAssign = $this->TicketAssign->get($id);
        if ($this->TicketAssign->delete($ticketAssign)) {
            $this->Flash->success(__('The ticket assign has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket assign could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
