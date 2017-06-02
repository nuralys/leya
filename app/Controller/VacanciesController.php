<?php

class VacanciesController extends AppController{
	// public $uses = array('Vacancy', 'Category', 'Country');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		$this->Vacancy->locale = Configure::read('Config.language');
		$this->Vacancy->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Vacancy->find('all', array(
			'order' => array('Vacancy.id' => 'desc')
		));
		$title_for_layout = __('Полезная информация');
		$this->set(compact('title_for_layout', 'data'));
	}

	public function admin_index(){
		$this->Vacancy->locale = array('ru', 'kz');
		$this->Vacancy->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Vacancy->find('all');
		
		if($this->request->is('post')){
			$anons = $this->request->data['Vacancy']['anons'];
			$news_id = $this->request->data['Vacancy']['news_id'];
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
			$this->Vacancy->create();
			$data = $this->request->data['Vacancy'];
			// debug($this->request->data);
			// debug($data);
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Vacancy->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Vacancy->locale = 'en';
			}else{
				$this->Vacancy->locale = 'ru';
			}
			// $this->Vacancy->locale = 'ru';
			if($this->Vacancy->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Vacancy->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Vacancy->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Vacancy->id = $id;
			// $this->Vacancy->locale = Configure::read('Config.languages');
			// debug($this->Vacancy->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Vacancy'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Vacancy->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Vacancy->locale = 'en';
			}else{
				$this->Vacancy->locale = 'ru';
			}
			
			// $this->Vacancy->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->Vacancy->save($data1)){
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
			$this->Vacancy->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Vacancy->read(null, $id);
		}
			
			$this->set(compact('id', 'data'));

	}

	public function admin_delete($id){
		if (!$this->Vacancy->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Vacancy->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Vacancy->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Vacancy->locale = Configure::read('Config.language');
		$this->Vacancy->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$data = $this->Vacancy->findById($id);
	// debug($data);
		$title_for_layout = $data['Vacancy']['title'];
		// $meta['keywords'] = $post['Vacancy']['keywords'];
		// $meta['description'] = $post['Vacancy']['description'];
		$this->set(compact('data','title_for_layout'));
	}

	public function send($id=null){
		// if(is_null($id) || !(int)$id || !$this->Vacancy->exists($id)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		$this->Vacancy->locale = Configure::read('Config.language');
		$this->Vacancy->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$data = $this->Vacancy->find('all');
	// debug($data);
		// $title_for_layout = $data['Vacancy']['title'];
		// $meta['keywords'] = $post['Vacancy']['keywords'];
		// $meta['description'] = $post['Vacancy']['description'];
		$this->set(compact('data','title_for_layout'));
	}

}