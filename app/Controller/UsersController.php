<?php

class UsersController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
		// $this->layout = 'index';
	 	$this->Auth->allow('cabinet');
	 }
	public function admin_index(){
		$data = $this->User->find('all');
		$this->set(compact('data'));
	}

	public function admin_login(){
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        $this->Session->setFlash('Неверный логин или пароль.', 'default', array(), 'bad');
	    }
	}

	public function admin_logout(){

		return $this->redirect($this->Auth->logout());
	}

	public function login(){
		if($this->Auth->user()){
			return $this->redirect('/users/cabinet');
		}
		if($this->request->is('post')){
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirectUrl());
			}else{
				$this->Session->setFlash('Ошибка авторизации', 'default', array(), 'bad');
			}
		}
	}

	public function edit(){
		// if(is_null($id) || !(int)$id || !$this->User->exists($id)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$id = $this->Auth->user();
		$data = $this->User->findById($id['id']);
		// if(!$id){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			unset($data1['password']);
			unset($data1['password_repeat']);
			
			if($this->User->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			
			$this->set(compact('id', 'data'));
		}
	}

	public function logout(){
		return $this->redirect($this->Auth->logout());
	}

	public function registration(){
		if($this->request->is('post')){
			$this->User->create();
			$data = $this->request->data['User'];
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->User->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_add(){
		if($this->request->is('post')){
			// debug($this->request->data);
			$this->User->create();

			if($this->User->save($this->request->data)){
				// $this->Session->setFlash(__('Статья удачно добавлена'));
				$this->Session->setFlash('Ползователь удачно добавлен.', 'default', array(), 'good');
				$this->redirect('/admin/users');
			}else{
				// $this->Session->setFlash(__('Ошибка при добавлении пользователя'));
				$this->Session->setFlash('Ошибка регистрации.', 'default', array(), 'bad');
				$this->redirect('/admin/users/add');
			}
		}
		$title_for_layout = 'Добавление пользователя';
		$category_list = $this->User->Category->find('list');
		$city_list = $this->User->City->find('list');
		$users = $this->User->find('list');
		$this->set(compact('title_for_layout', 'users', 'category_list', 'city_list'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->User->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->User->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			unset($data1['password']);
			unset($data1['password_repeat']);
			
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->User->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование';
			$category_list = $this->User->Category->find('list');
			$city_list = $this->User->City->find('list');
			// debug($category_list);
			$this->set(compact('id', 'data', 'category_list', 'city_list', 'title_for_layout'));
		}
	}
	public function admin_pswedit($id){
		if(is_null($id) || !(int)$id || !$this->User->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->User->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			if(empty($data1['password']) || !$data1['password']){
				unset($data1['password']);
			}
			if(empty($data1['password_repeat']) || !$data1['password_repeat']){
				unset($data1['password_repeat']);
			}
			
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->User->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование пароля';
			$category_list = $this->User->Category->find('list');
			$city_list = $this->User->City->find('list');
			// debug($category_list);
			$this->set(compact('id', 'data', 'category_list', 'city_list', 'title_for_layout'));
		}
	}
	

	public function cabinet(){
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}

		$data = $this->Auth->user();
		$id = $data['id'];
		$data = $this->User->find('first', array(
			'conditions' => array('User.id' => $id),
		'recursive' => -1));
		// debug($data);

		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->User->save($data1)){
				$this->Session->setFlash('Операция выполнена успешно!', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Личный кабинет';
			$this->set(compact('id', 'data', 'title_for_layout'));
		}


	}

	public function catalog(){
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}

		$data = $this->Auth->user();
		$id = $data['id'];
		// $data = $this->User->find('first', array(
		// 	'conditions' => array('User.id' => $id),
		// 'recursive' => -1));
		$products = $this->User->Product->find('all', array(
			'conditions' => array('Product.user_id' => $id),
			'recursive'=>-1
			));
		// debug($id);
		$title_for_layout = 'Каталог';
		$this->set(compact('products', 'title_for_layout', 'data'));
	}

	public function accessory(){
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}

		$data = $this->Auth->user();
		// debug($data);
		$id = $data['id'];
		$accessory = $this->User->Accessory->find('all', array(
			'conditions' => array('Accessory.user_id' => $id),
			'recursive'=>-1
			));
		// debug($category);
		$title_for_layout = 'Аксессуары';
		$this->set(compact('accessory', 'title_for_layout', 'data'));
	}

}