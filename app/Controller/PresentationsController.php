<?php

class PresentationsController extends AppController{
	// public $uses = array('Presentation', 'Category', 'Country');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		$this->Presentation->locale = Configure::read('Config.language');
		$this->Presentation->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Presentation->find('all', array(
			'order' => array('Presentation.id' => 'desc')
		));
		
		// debug($new);
		// die;
		$title_for_layout = __('Презентация проектов');
		$this->set(compact('title_for_layout', 'data'));
	}

	public function admin_index(){
		$this->Presentation->locale = array('ru', 'kz');
		$this->Presentation->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Presentation->find('all');
		
		if($this->request->is('post')){
			$anons = $this->request->data['Presentation']['anons'];
			$news_id = $this->request->data['Presentation']['news_id'];
			// debug($news_id);
			// die;

			// debug($news_id);
			$setAnons = $this->_anons($news_id, $anons);
			if($setAnons){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Presentation->create();
			$data = $this->request->data['Presentation'];
			// debug($this->request->data);
			// debug($data);
			// die;
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if(!isset($data['pdf']['name']) || !$data['pdf']['name']){
				unset($data['pdf']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Presentation->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Presentation->locale = 'en';
			}else{
				$this->Presentation->locale = 'ru';
			}
			// $this->Presentation->locale = 'ru';
			if($this->Presentation->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Presentation->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Presentation->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Presentation->id = $id;
			// $this->Presentation->locale = Configure::read('Config.languages');
			// debug($this->Presentation->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Presentation'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if(!isset($data1['mypdf']['name']) || !$data1['mypdf']['name']){
				unset($data1['mypdf']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Presentation->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Presentation->locale = 'en';
			}else{
				$this->Presentation->locale = 'ru';
			}
			
			// $this->Presentation->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->Presentation->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Presentation->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Presentation->read(null, $id);
		}
			
			$this->set(compact('id', 'data'));

	}

	public function admin_delete($id){
		if (!$this->Presentation->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Presentation->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Presentation->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Presentation->locale = Configure::read('Config.language');
		$this->Presentation->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$post = $this->Presentation->findById($id);
	
		$title_for_layout = $post['Presentation']['title'];
		$meta['keywords'] = $post['Presentation']['keywords'];
		$meta['description'] = $post['Presentation']['description'];
		$this->set(compact('post', '','title_for_layout' ,'meta'));
	}

}