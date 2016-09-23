<?php

class AccessoriesController extends AppController{
	public function admin_index(){
		$data = $this->Accessory->find('all', array(
			'order' => array('Accessory.id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Accessory->create();
			$data = $this->request->data['Accessory'];
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->Accessory->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$categories = $this->Accessory->Category->find('list');
		$this->set(compact('categories'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Accessory->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Accessory->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Accessory->id = $id;
			$data1 = $this->request->data['Accessory'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Accessory->save($data1)){
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

	public function admin_delete($id){
		if (!$this->Accessory->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Accessory->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		
		$title_for_layout = 'Новости';
		$data = $this->Accessory->find('all', array(
			'order' => array('Accessory.id' => 'desc')
		));
		// debug($news);
		$this->set(compact('data', 'title_for_layout'));
	}


	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Accessory->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Accessory->findById($id);
		$user_id = $data['Category']['user_id'];
		$ui = $this->Accessory->Category->User->findById($user_id);

		$title_for_layout = $data['Accessory']['title'];

		$this->set(compact('data', 'title_for_layout', 'ui'));
	}

	public function search(){
		$search = !empty($_GET['q']) ? $_GET['q'] : null ;
		if( is_null($search)){
			return $this->set('search_res', 'Введите поисковый запрос');
		}
		$search_res = $this->Accessory->find('all', array(
			'conditions' => array('Accessory.title LIKE' => '%'.$search.'%')
			));
		$title_for_layout = 'Поиск';
		$this->set(compact('search_res', 'title_for_layout'));
		
	}

	public function add(){
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}
		if($this->request->is('post')){
			$this->Accessory->create();
			$data = $this->request->data['Accessory'];
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->Accessory->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function edit($id){
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}

		$user_data = $this->Auth->user();
		$user_id = $user_data['id'];
		
		$product = $this->Accessory->findById($id);
		if($product['Accessory']['user_id'] != $user_id){
			$this->Session->setFlash('Вы не имеете доступа к данному материалу', 'default', array(), 'bad');
			return $this->redirect($this->referer('/users/category'));
		}
		
		if(is_null($id) || !(int)$id || !$this->Accessory->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		if(is_null($id) || !(int)$id || !$this->Accessory->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Accessory->findById($id);
	
		if($this->request->is(array('post', 'put'))){
			$this->Accessory->id = $id;
			$data1 = $this->request->data['Accessory'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Accessory->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			//$categories = $this->Accessory->Category->find('list');
			$this->set(compact('id', 'data'));
		}
	}

	
}