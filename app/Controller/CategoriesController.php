<?php

class CategoriesController extends AppController{
	public $uses = array('Category', 'Product');
	public $components = array('Paginator');

	public function admin_index(){
		$data = $this->Category->find('list');
		$this->set(compact('data'));
	}

	public function index(){
		$parent_cats = $this->Category->find('all', array('conditions'=>array('Category.parent_id'=>0),
			'recursive' => -1));
		//debug($parent_cats);
		$categories = array();
		for($i=1; $i<=6; $i++){
			$categories[$i] = $this->Category->find('threaded', array(
			'conditions' => array('Category.parent_id' => $i),
			'recursive' => -1
			));
		}
		//debug($categories);
		$products = array();
		for($i=1; $i<=6; $i++){
			$products[$i] = $this->Category->find('threaded', array(
			'conditions' => array('Category.parent_id' => $i)
			));
		}
			
			
		// $title_for_layout = $user['User']['meta_title'];
		// $meta['keywords'] = $user['User']['keywords'];
		// $meta['description'] = $user['User']['description'];
		return $this->set(compact('products', 'meta', 'categories', 'parent_cats'));
		
	}

	public function view($alias){
		$data = $this->Category->findByAlias($alias);
		if (!$data) {
			throw new NotFounddException('Такой категории не существует');
		}
		// debug($data);
		return $this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			
			$this->Category->create();
			$data = $this->request->data['Category'];
			
			if($this->Category->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$c_list = $this->Category->find('list');
		return $this->set(compact('c_list'));

	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Category->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Category->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Category->id = $id;
			$data1 = $this->request->data['Category'];
			
			
			if($this->Category->save($data1)){
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
		if (!$this->Category->exists($id)) {
			throw new NotFounddException('Такой категории нету');
		}
		if($this->Category->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

}