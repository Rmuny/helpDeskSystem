<?php
declare(strict_types=1);

namespace App\Controller;
//use Cake\Collection\Collection::filter($callback);
use Cake\Collection\Collection;
use Cake\Event\EventInterface;
use Cake\Mailer\Mailer;
use Cake\Network\Exception\SocketException;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use PhpParser\Node\Stmt\DeclareDeclare;
/**
* @property \Cake\I18n\FrozenTime $created
*/

/**
 * Tickets Controller
 * @param string|null $id Solution id.

 * @property \App\Model\Table\TicketsTable $Tickets
 * @property \App\Model\Table\StaffsTable $Staff
 * @property \App\Model\Table\CategoriesTable $Categories
 * @property \App\Model\Table\CategoriesTable $Solutions
 *
 * @method \App\Model\Entity\Ticket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TicketsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->Categories = $this->fetchTable('Categories');
        $this->Solutions = $this->fetchTable('Solutions');

    }
    public function beforeRender(EventInterface $event)
    {
        parent::beforeRender($event); // TODO: Change the autogenerated stub
        $roleID = $this->Auth->user('role_id');
        if ($roleID == STAFF) {
            $this->viewBuilder()->setLayout('userdefault');
        } elseif ($roleID == ASSISTANT) {
            $this->viewBuilder()->setLayout('assistantdefault');
        } elseif ($roleID == ADMIN) {
            $this->viewBuilder()->setLayout('default');
        } else {
            $this->viewBuilder()->setLayout('default');
        }
    }

    /**
     * Index method
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id = null)
    {
        $this->paginate = [
            'contain' => ['Status', 'Staffs', 'Categories'],
        ];

        $data = $this->getRequest()->getData();
        $data['staff_id'] = 53;
        $data['submit_by'] = $this->Auth->user('id');

        $tickets = $this->paginate($this->Tickets, ['limit' => 10]);
//        $tic = $this->Tickets->find()->where(['status_id'=>3])->toArray();
//        dd($query);
        $tickets = $this->Tickets->find()->contain(['Categories','Staffs','Status'])->all();

        $this->set(compact('tickets'));
    }

    /**
     * View method
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Staffs', 'Status', 'Reply', 'TicketAssign', 'Categories'],
        ]);

        $this->set(compact('ticket'));
        return $this->redirect(['controller' => 'Reply', 'action' => 'index', $ticket->id]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $data = $this->getRequest()->getData();
        $data['status_id'] = 1;
        $data['staff_id'] = 64;
        $data['created'] = date('Y-m-d H:i:s');
//        dd($data['created']=date('m'));
        $data['submit_by'] = $this->Auth->user('id');
//        dd($this->Auth->user('id'));
        $ticket = $this->Tickets->newEmptyEntity();
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $data);
//            dd($ticket);
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $staffs = $this->Tickets->Staffs->find('list', ['limit' => 200])->all();
        $this->set(compact('ticket', 'staffs'));
        $status = $this->Tickets->Status->find('list', ['limit' => 200])->all();
        $this->set(compact('ticket', 'status'));
        $categories = $this->Solutions->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('ticket', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Staffs', 'Categories'],
        ]);
//        dd($ticket['id']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
//            dd($this->request->data);
            $reqData = $this->request->data;

//            The first() method allows you to fetch only the first row from a query
            $staffInfo = $this->Tickets->Staffs->find()->where(['id' => $reqData['staff_id']])->first();
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));
                $this->assignAlertToStaff($staffInfo['email'], $ticket['id']);
                $this->assignAlertToUser($staffInfo['email'], $ticket['id']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $data = $this->getRequest()->getData();
        $data['modified'] = date('Y-m-d H:i:s');

        $staffs = $this->Tickets->Staffs->find('list', ['limit' => 200])->all();
        $status = $this->Tickets->Status->find('list', ['limit' => 200])->all();
        $categories = $this->Tickets->Categories->find('list', ['limit' => 200])->all();

//        dd($ticket);
        $this->set(compact('ticket', 'staffs', 'status','categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Tickets->get($id);
        if ($this->Tickets->delete($ticket)) {
            $this->Flash->success(__('The ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function assignAlertToStaff($staff, $id)
    {
        $myEmail = $staff;
//        $query = $this->getTableLocator()->get('Staffs')->find();
//        foreach ($query as $ticket) {
//            $name = $ticket->id;
//        }
        $mailer = new Mailer();
        $mailer->setTransport('gmail');
        $mailer
            ->setTo($myEmail)
            ->setEmailFormat('html')
            ->setSubject('Help Desk_Assign Notification 🔔')
            ->setViewVars(['num' => $id, 'staff' => $myEmail])
            ->viewBuilder()
            ->setTemplate('assignNotificationToStaff');
        $mailer->deliver();
//        if ($mailer->deliver()) {
        $this->Flash->success('Assign notification has been sent to solver email');
    }

    public function assignAlertToUser($staff, $id)
    {
        $myEmail = $staff;
        $user_id = $this->Tickets->get($id);
        $user = $this->Tickets->Staffs->get($user_id['submit_by']);
        $myEmail2 = $user->email;
//            dd($myEmail);
        $mailer = new Mailer();
        $mailer->setTransport('gmail');
        $mailer
            ->setTo($myEmail2)
            ->setEmailFormat('html')
            ->setSubject('Help Desk_Assign Notification 🔔')
            ->setViewVars(['name' => $user->staffName, 'assign' => $myEmail])
            ->viewBuilder()
            ->setTemplate('assignNotificationToUser');

        if ($mailer->deliver()) {
            $this->Flash->success('Assign notification has been sent to admin email');
        }
    }
    public function dashboard()
    {
        $status = $this->Tickets->find();
//        $status->select([
//            'all' => $status->func()->count('id'),
//            'status' => 'COUNT(CASE WHEN id = 1 THEN 1 ELSE null END)',
//            'inProgress'=>'COUNT(CASE WHEN Tickets.status_id = 3 THEN 1 ELSE null END)',
//            'assign'=>'COUNT(CASE WHEN Tickets.status_id = 2 THEN 1 ELSE null END)',
//            'resolve'=>'COUNT(CASE WHEN Tickets.status_id = 4 THEN 1 ELSE null END)',
//            'close'=>'COUNT(CASE WHEN Tickets.status_id = 5 THEN 1 ELSE null END)',
//        ]);
//        $status->newExpr()->add(['status_id' => 1]);

        $status->select([
            'all' => $status->func()->count('id'),
            'status' => $status->func()->count('status_id'),
            'open' => $status->func()->count('case when Tickets.status_id = 1 then 1 else null end'),
            'assign' => $status->func()->count('case when Tickets.status_id = 2 then 1 else null end'),
            'inProgress' => $status->func()->count('case when Tickets.status_id = 3 then 1 else null end'),
            'resolve' => $status->func()->count('case when Tickets.status_id = 4 then 1 else null end'),
            'close' => $status->func()->count('case when Tickets.status_id = 5 then 1 else null end'),
        ]);
        $status = $status->toArray();
        $this->set(compact('status'));
//        dd($status->toArray());
        $category = $this->Tickets->find();

        $category->select([
            'all' => $category->func()->count('id'),
            'category' => $category->func()->count('category_id'),
            'bank' => $category->func()->count('case when Tickets.category_id = 1 then 1 else null end'),
            'it' => $category->func()->count('case when Tickets.category_id = 2 then 1 else null end'),
            'school' => $category->func()->count('case when Tickets.category_id = 3 then 1 else null end')
        ]);
        $category = $category->toArray();
//        dd($category);
        $this->set(compact('category'));

        $solution = $this->Solutions->find();
        $solution->select([
            'all' => $solution->func()->count('id'),
            'bank' => $solution->func()->count('case when Solutions.category_id = 1 then 1 else null end'),
            'it' => $solution->func()->count('case when Solutions.category_id = 2 then 1 else null end'),
            'school' => $solution->func()->count('case when Solutions.category_id = 3 then 1 else null end')
        ]);
        $solution = $solution->toArray();
//        dd($solution);
        $this->set(compact('solution'));
//        $created = $data['created']=date('m');
//        dd($data['created']=date('m'));
//        define('MONTH', 2592000);


        $ticket = $this->Tickets->find();
        $ticket->select([
            'all'=>$ticket->func()->count('id'),
            'jan'=>$ticket->func()->count('case when MONTH(Tickets.created) = 1 then 1 else null end'),
            'feb'=>$ticket->func()->count('case when MONTH(Tickets.created) = 2 then 1 else null end'),
            'mar'=>$ticket->func()->count('case when MONTH(Tickets.created) = 3 then 1 else null end'),
            'apr'=>$ticket->func()->count('case when MONTH(Tickets.created) = 4 then 1 else null end'),
            'may'=>$ticket->func()->count('case when MONTH(Tickets.created) = 5 then 1 else null end'),
            'jun'=>$ticket->func()->count('case when MONTH(Tickets.created) = 6 then 1 else null end'),
            'jul'=>$ticket->func()->count('case when MONTH(Tickets.created) = 7 then 1 else null end'),
            'aug'=>$ticket->func()->count('case when MONTH(Tickets.created) = 8 then 1 else null end'),
            'sep'=>$ticket->func()->count('case when MONTH(Tickets.created) = 9 then 1 else null end'),
            'oct'=>$ticket->func()->count('case when MONTH(Tickets.created) = 10 then 1 else null end'),
            'nov'=>$ticket->func()->count('case when MONTH(Tickets.created) = 11 then 1 else null end'),
            'dec'=>$ticket->func()->count('case when MONTH(Tickets.created) = 12 then 1 else null end'),
        ]);
//        dd($ticket->toArray()[0]['feb']);

        $this->set(compact('ticket'));
    }

    public function report(){
        $tickets = $this->Tickets->find()->contain(['Categories', 'Staffs','Status'])->all();
//        Filter
        $catekey = $this->request->getQuery('catekey');
        $catekey = (int)$catekey;

        $key = $this->request->getQuery('key');
        $key = (int) $key;
// where(['AND' => ['a' => 2, 'b' => 3])

        if ($catekey&&$key){
                $query = $this->Tickets->find('all')->contain(['Categories', 'Staffs', 'Status'])->where(['AND'=>['Tickets.category_id' => $catekey,'status_id'=> $key]]);
        }elseif ($key){
            $query = $this->Tickets->find('all')->contain(['Categories', 'Staffs', 'Status'])->where(['status_id'=> $key]);
        }elseif ($catekey){
            $query = $this->Tickets->find('all')->contain(['Categories', 'Staffs', 'Status'])->where(['Tickets.category_id' => $catekey]);
        }

        else{
            $query = $this->Tickets->find()->contain(['Categories', 'Staffs','Status'])->all();
        }
        $tickets = $query;
        $status = $this->Tickets->Status->find('list')->all();
        $category = $this->Tickets->Categories->find('list')->all();
        $this->set(compact('tickets','status','category'));
    }



    public function exportdata(){
        $datatbl = '';
        $datatbl = '<table cellspacing="2" cellpadding="5" style= "border: 1px; text-align:center;" border="1" width="60%" >';
        $datatbl.= '<h2 style="text-align: center">Help Desk Report</h2>
                    <tr>
                        <th style="text-align: center;">Ticket Number</th>
                        <th style="text-align: center;">Description</th>
                        <th style="text-align: center;">Category</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Assign To</th>
                        <th style="text-align: center;">Created date</th>
                   </tr>';
        $tickets = $this->Tickets->find()->contain(['Categories', 'Staffs','Status'])->all();
        foreach ($tickets as $tickets){
            $id = $tickets['id'];
            $answer = $tickets['answer'];
            $category =$tickets['category_id'];
            $status = $tickets['status_id'];
            $assign = $tickets['staff_id'];
            $created = $tickets['created'];
            $datatbl .= '<tr>
                            <td style="text-align: center;">'.'#TK'. $id. '</td>
                            <td style="text-align: center;">'. $answer. '</td>
                            <td style="text-align: center;">'. $category. '</td>
                            <td style="text-align: center;">'. $status. '</td>
                            <td style="text-align: center;">'. $assign. '</td>
                            <td style="text-align: center;">'. $created. '</td>
                        </tr>';
        }
        $datatbl .= "</table";

//        Exel export
        header('Content-Type: application/force-download');
        header('Content-disposition: attachment; filename = helpDesk_report.xls');
        header("Pragma: ");
        header("Cache-Control: ");
        echo $datatbl;
        die;


    }

}
