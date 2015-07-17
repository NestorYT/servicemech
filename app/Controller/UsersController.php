<?php
class UsersController extends AppController {

	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('users',$this->User->find('all'));
	}

	public function view($id = null) {
		if (!$id) {
            throw new NotFoundException(__('Invalid user'));
		}

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
        
        $this->set('user',$user);
	
	}

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('User has been added.'));
                return $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash(__('Unable to add your user'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is(array('post','put'))) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('User has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
             
            $this->session->setFlash(__('Unable to update user'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
        
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->User->delete($id)) {
            $this->Session->setFlash(
                __('The user with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Session->setFlash(
                __('The user with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

}
