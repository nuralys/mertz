<?php

class FeedbacksController extends AppController{
	public function admin_index(){
		$data = $this->Feedback->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function add(){
		if($this->request->is('post')){
			$this->Feedback->create();
			$data = $this->request->data['Feedback'];
			// debug($data);
			
			if($this->Feedback->save($data)){
				$this->Session->setFlash('Ваше сообщение отправлено. В ближайшее время с вами свяжется наш менеджер.', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('К сожалению возникла ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Feedback->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Feedback->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Feedback->id = $id;
			$data1 = $this->request->data['Feedback'];
			
			if($this->Feedback->save($data1)){
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
		if (!$this->Feedback->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Feedback->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		
		$title_for_layout = 'Обратная связь';
		$meta['keywords'] = 'Обратная связь';
		$meta['description'] = 'Если у вас появились вопросы или предложения по улучшению сервиса, вы можете написать здесь.';
		
		// debug($news);
		$this->set(compact('data', 'title_for_layout', 'meta'));
	}
	
}