<?php

class ServicesController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		// $this->Service->locale = false;
		$this->Service->locale = Configure::read('Config.language');
		$data = $this->Service->find('all');
		$title_for_layout = __('Услуги');
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_index(){
		$this->Service->locale = 'ru';
		$this->Service->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Service->find('all');
		// debug($data);
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Service->create();
			$data = $this->request->data['Service'];
			
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Service->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Service->locale = 'en';
			}else{
				$this->Service->locale = 'ru';
			}
			// $this->Service->locale = 'ru';

			if($this->Service->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->Service->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Service->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Service->id = $id;
			// $this->Service->locale = Configure::read('Config.languages');
			// debug($this->Service->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Service'];

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Service->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Service->locale = 'en';
			}else{
				$this->Service->locale = 'ru';
			}
			$data1['id'] = $id;
			if($this->Service->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Service->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Service->read(null, $id);
		}
			$this->set(compact('id', 'data'));


	}

	public function admin_delete($id){
		if (!$this->Service->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Service->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Service->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Service->locale = Configure::read('Config.language');
		$this->Service->bindTranslation(array(
			'title' => 'titleTranslation',
			'body' => 'bodyTranslation',
			'keywords' => 'keywordsTranslation',
			'description' => 'descriptionTranslation'
		));
		$data = $this->Service->findById($id);
		
		$title_for_layout = $data['Service']['title'];
		$meta['keywords'] = $data['Service']['keywords'];
		$meta['description'] = $data['Service']['description'];
		$this->set(compact('data','title_for_layout' ,'meta'));
	}

}