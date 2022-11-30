<?php
declare(strict_types=1);

namespace App\Controller;


use App\Model\Entity\Staff;
use Cake\Datasource\ResultSetInterface;
use Cake\Event\EventInterface;
use Cake\Mailer\Mailer;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;

/**
 * Staffs Controller
 *
 * @property \App\Model\Table\StaffsTable $Staffs
 * @property \App\Model\Table\SolutionsTable $Solutions
// *  @property \App\Model\Table\SolutionsTable $Categories
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method Staff[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class StaffsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->Solutions = $this->fetchTable('Solutions');

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Categories'],
        ];
//        search
        $key = $this->request->getQuery('key');
//        dd($key);
        if ($key) {
            $query = $this->Staffs->find('all')->where(['username LIKE' => '%' . $key . '%']);

        } else {
            $query = $this->Staffs->find()->all();
        }
        $staffs = $this->paginate($this->Staffs, ['limit' => 10]);
//        dd($staffs);
//        dd([$staff->all(), $this->paginate($staff)]);
        $this->set(compact('staffs'));
    }
    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => ['Roles', 'TicketAssign', 'Tickets', 'Categories'],
        ]);
        $this->set(compact('staff'));
    }

    /**
     * Add method
     * @param string|null $gender Staff gender.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $data = $this->getRequest()->getData();
        $data['created'] = date('Y-m-d H:i:s');

        $staff = $this->Staffs->newEmptyEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->getData());
//            dd($image);
            if (!$staff->getErrors) {
                $image = $this->request->getData('image');
//                dd($image);

                $name = $image->getClientFilename();
//                dd([$name, $image]);

                if (!is_dir(WWW_ROOT . 'img' . DS . 'staff-img'))
                    mkdir(WWW_ROOT . 'img' . DS . 'staff-img', 0775);

                $targetPath = WWW_ROOT . 'img' . DS . 'staff-img' . DS . $name;

                $staff->profileImage = 'staff-img/' . $name;

            }
            if ($this->Staffs->save($staff)) {
                $image->moveTo($targetPath);
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $roles = $this->Staffs->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('staff', 'roles'));

        $categories = $this->Staffs->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('staff', 'categories'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $data = $this->getRequest()->getData();
        $data['created'] = date('Y-m-d H:i:s');
        $staff = $this->Staffs->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->getData());

            if (!$staff->getErrors) {
                $image = $this->request->getData('image');
//                dd($image);

                $name = $image->getClientFilename();
//                dd([$name, $image]);

                if (!is_dir(WWW_ROOT . 'img' . DS . 'staff-img'))
                    mkdir(WWW_ROOT . 'img' . DS . 'staff-img', 0775);

                $targetPath = WWW_ROOT . 'img' . DS . 'staff-img' . DS . $name;

                $image->moveTo($targetPath);
                $imgpath = WWW_ROOT . 'img' . DS . $staff->profileImage;

                if (file_exists($imgpath)) {
                    unlink($imgpath);
                }
                $staff->profileImage = 'staff-img/' . $name;

            }
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $categories = $this->Staffs->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('staff', 'categories'));
        $roles = $this->Staffs->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('staff', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $staff = $this->Staffs->get($id);
        $imgpath = WWW_ROOT . 'img' . DS . $staff->profileImage;

        if ($this->Staffs->delete($staff)) {
            if (file_exists($imgpath)) {
                unlink($imgpath);
            }
            $this->Flash->success(__('The staff has been deleted.'));
        } else {
            $this->Flash->error(__('The staff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }





//    public function deleteAll()
//    {
//        $this->request->allowMethod(['post', 'delete']);
//        $ids = $this->request->getData('ids');
//
//        if ($this->Staffs->deleteAll(['Staffs.id IN' => $ids])) {
//            $this->Flash->success(__('The staffs has been deleted.'));
//        }
//        return $this->redirect(['action' => 'index']);
//    }

    public function login(){
        $this->viewBuilder()->setLayout('ajax');
        if ($this->request->is('post')) {
            $staff = $this->Auth->identify();
//            dd($staff);
            if ($staff) {

                $this->Auth->setUser($staff);
                if ($staff['role_id'] == 16) {
                    return $this->redirect([
                        'controller' => 'Staffs',
                        'action' => 'index',

                    ]);
                } elseif ($staff['role_id'] == 4) {
                    return $this->redirect([
                        'controller' => 'Faqs',
                        'action' => 'general',
                    ]);
                } elseif ($staff['role_id'] == 11) {
                    return $this->redirect([
                        'controller' => 'Assistants',
                        'action' => 'ticketAssigned',
                    ]);
                } else {
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }
            $this->Flash->error(__('Your username or password was incorrect.'));

        }
    }


    public function logout()
    {
        //Leave empty for now.
        $this->redirect($this->Auth->logout());
    }

/////////////////////////////////Forgot Password?///////////////////////////////////

//    function forgotPassword() {
//        $this->viewBuilder()->setLayout('ajax');
//
//        if (!empty($this->data)) {
//            $staff = $this->Staffs->findByEmai($this->data['Staff']['email']);
//            if (empty($staff)) {
//                $this->Session->setflash('Sorry, the username entered was not found.');
//                $this->redirect('/staffs/forgot_password');
//            }else {
//                $staff = $this->__generatePasswordToken($staff);
//                if ($this->Staff->save($staff) && $this->__sendForgotPasswordEmail($staff['Staff']['id'])) {
//                    $this->Session->setflash('Password reset instructions have been sent to your email address.
//						You have 24 hours to complete the request.');
//                    $this->redirect('/staffs/login');
//                }
//            }
//        }
//    }

    public function forgotPassword()
    {
        $this->viewBuilder()->setLayout('ajax');

        if ($this->request->is('post')) {
            $myemail = $this->request->getData('email');
            $mytoken = Security::hash(Security::randomBytes(25));

            $staffTable = TableRegistry::get('Staffs');
            $staff = $staffTable->find('all')->where(['email' => $myemail])->first();

            $staff->password = '';
            $staff->token = $mytoken;

            if ($staffTable->save($staff)) {
                $mailer = new Mailer();
                $mailer->setTransport('gmail');
                $mailer
                    ->setTo($myemail)
                    ->setSubject('Help desk Confirm pin code');
                try {
                    $mailer->deliver('Hello ' . $myemail. ' Please click the link below to reset your password http://localhost:8765/staffs/resetPassword/' . ' Reset Password');

                } catch (SocketException|\Exception $e) {
                    $this->log($e->getMessage() . PHP_EOL . $e->getTraceAsString());
                }
                $this->redirect(['action' => 'resetPassword', $staff->id]);
                $this->Flash->success('Pin code has been sent to your email please check your inbox');
            }
        }
    }


//    public function sendPinCode($staff, $pinCode){
//        $mailer = new Mailer();
//        $mailer->setTransport('gmail');
//        $mailer
//            ->setTo($staff->email)
//            ->setEmailFormat('html')
//            ->setSubject('Your Pin Code')
//            ->setViewVars([
//                'pinCode' => $pinCode,
//                'name' => $staff->staffName,
//            ])
//            ->viewBuilder()
//            ->setTemplate('send_pin_code');
//
//        try {
//            $mailer->deliver();
//        }
//        catch (SocketException|\Exception $e)
//        {
//            $this->log($e->getMessage() . PHP_EOL . $e->getTraceAsString());
//        }
//    }

    public function resetPassword($staff, $id = null){
//        if($this->request->is('post')){
//            $hasher = new DefaultPasswordHasher();
//            $mypass = $hasher->hash($this->request->getData('password'));
//
//            $staffTable = TableRegistry::get('Staffs');
//            $staff = $staffTable->find('all')->where(['token'=>$token])->first();
//            $staff->password = $mypass;
//
//            if ($staffTable->save($staff)){
//                return$this->redirect(['action'=>'login']);
//            }
//        }
        $this->viewBuilder()->setLayout('ajax');
        $this->Staffs->get($id, [
            'contain' => [],
        ]);
//        dd($staff = $this->Staffs->get($id));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if ($data['new_password'] == $data['confirm_new_password']) {
                $staff = $this->Staffs->patchEntity($staff,
                    [
                        'password' => $data['new_password']
                    ]);

                if ($this->Staffs->save($staff)) {
                    $this->Flash->success('Password has been changed successfully');
                } else {
                    $this->Flash->error('Password could not be changed');
                }
            } else {
                $this->Flash->error('Could be not change! password match failed');
            }
            $this->set(compact('staff'));
//                dd('pass');
        }
    }


//    function __generatePasswordToken($staff)
//    {
//        if (empty($staff)) {
//            return null;
//        }
//        // Generate a random string 100 chars in length.
//        $token = "";
//        for ($i = 0; $i < 100; $i++) {
//            $d = rand(1, 100000) % 2;
//            $d ? $token .= chr(rand(33, 79)) : $token .= chr(rand(80, 126));
//        }

//
//        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
//
//        // Generate hash of random string
//        $hash = Security::hash($token, 'sha256', true);;
//        for ($i = 0; $i < 20; $i++) {
//            $hash = Security::hash($hash, 'sha256', true);
//        }
//
//        $staff['Staffs']['reset_password_token'] = $hash;
//        $staff['Staffs']['token_created_at'] = date('Y-m-d H:i:s');
//
//        return $staff;
//    }

//change password
    public function changePassword()
    {
        $this->viewBuilder()->setLayout('ajax');
        $id = $this->Auth->User('id');
        $staff = $this->Staffs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if ($this->checkPassword($data['current_password'], $staff->password)) {
                if ($data['new_password'] == $data['confirm_new_password']) {

                    $staff = $this->Staffs->patchEntity($staff,
                        [
                            'password' => $data['new_password']
                        ]);

                    if ($this->Staffs->save($staff)) {
                        $this->Flash->success('Password has been changed successfully');
                    } else {
                        $this->Flash->error('Password could not be changed');
                    }
                } else {
                    $this->Flash->error('Could be not change! password match failed');
                }
                $this->set(compact('staff'));
//                dd('pass');
            } else {
                $this->Flash->error('Incorrect current password');
//            dd('fail');
                //////////
            }
        }
    }

    public function checkPassword($currentPassword, $staffPassword)
    {
        return (new DefaultPasswordHasher())->check($currentPassword, $staffPassword);
    }
    public function beforeFilter(EventInterface $event)
    {
        $this->Auth->allow(['logout', 'login', 'add', 'forgotPassword', 'resetPassword']);
        parent::beforeFilter($event); // TODO: Change the autogenerated stub
        $login = null;
        if ($this->Auth->user()) {
            $login = $this->Auth->user();
        }
        $this->set(compact('login'));
    }
}

