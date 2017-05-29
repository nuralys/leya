<?php

class ProductsController extends AppController{
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		$this->Product->locale = Configure::read('Config.language');
		$this->Product->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Product->find('all', array(
			'order' => array('Product.id' => 'desc')
		));
		$title_for_layout = __('Продукты');
		$this->set(compact('title_for_layout', 'data'));
	}

	public function admin_index(){
		$this->Product->locale = array('ru', 'kz');
		$this->Product->bindTranslation(array(
			'title' => 'titleTranslation'
		));
		$data = $this->Product->find('all');
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Product->create();
			$data = $this->request->data['Product'];
			
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Product->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Product->locale = 'en';
			}else{
				$this->Product->locale = 'ru';
			}
			// $this->Product->locale = 'ru';
			if($this->Product->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
			$this->Product->Category->locale = 'ru';
			$categories = $this->Product->Category->find('list');
			$this->set(compact('categories'));
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Product->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Product->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Product->id = $id;
			// $this->Product->locale = Configure::read('Config.languages');
			// debug($this->Product->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Product'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Product->locale = 'kz';
				// $this->Category->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Product->locale = 'en';
				// $this->Category->locale = 'en';
			}else{
				$this->Product->locale = 'ru';
				// $this->Category->locale = 'ru';
			}
			
			// $this->Product->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->Product->save($data1)){
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
			$this->Product->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Product->read(null, $id);
		}
			
				$this->Product->Category->locale = 'ru';
			$categories = $this->Product->Category->find('list');
			$this->set(compact('id', 'data', 'categories'));

	}

	public function admin_delete($id){
		if (!$this->Product->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Product->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Product->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Product->locale = Configure::read('Config.language');
		$this->Product->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$this->Product->Category->locale = Configure::read('Config.language');
		$this->Product->Category->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$data = $this->Product->findById($id);
	$aside = $this->Product->Category->find('all');
		$title_for_layout = $data['Product']['title'];
		$meta['keywords'] = $data['Product']['keywords'];
		$meta['description'] = $data['Product']['description'];
		$this->set(compact('data', '','title_for_layout' ,'meta', 'aside'));
	}

}