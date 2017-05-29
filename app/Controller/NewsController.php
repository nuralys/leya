<?php

class NewsController extends AppController{
	// public $uses = array('News', 'Category', 'Country');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		$this->News->locale = Configure::read('Config.language');
		$this->News->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->News->find('all', array(
			'order' => array('News.id' => 'desc')
		));
		$years = array();
		foreach ($data as $item) {
			# code...
			$years[] = strftime("%Y", strtotime($item['News']['date']));
			$new = array_flip($years);
			//date('Y',$item['News']['date']);
		}
		$new['2017'] = "News";
		// for($i = 1; $i>=count($new); $i++){
		// 	$new[$i] = "asd";
		// }
		debug($new);die;
		$title_for_layout = __('Новости');
		$this->set(compact('title_for_layout', 'data'));
	}
		

	public function search(){
		$this->News->locale = Configure::read('Config.language');
		$this->News->bindTranslation(array('title' => 'titleTranslation'));
		$this->Gallery->locale = Configure::read('Config.language');
		$this->Gallery->bindTranslation(array('title' => 'titleTranslation'));
		$galleries = $this->Gallery->find('all', array(
            'limit' => 3
        ));
		$stol = $this->News->find('all', array(
            'conditions' => array('category_id' => 5),
            'limit' => 3
        ));
		$search = !empty($_GET['q']) ? $_GET['q'] : null;
		if(is_null($search)){
			$search_res = __('Введите пойсковый запрос...');
			return $this->set(compact('search_res'));
		}
		$categories = $this->Category->find('all');
		$title_for_layout = __('Поиск');
		$search_res = $this->News->query("SELECT * FROM i18n 
			WHERE i18n.content LIKE '%{$search}%'");
		$this->set(compact('search_res', 'title_for_layout', 'categories', 'stol', 'galleries'));
	}

	public function admin_index(){
		$this->News->locale = array('ru', 'kz');
		$this->News->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->News->find('all');
		
		if($this->request->is('post')){
			$anons = $this->request->data['News']['anons'];
			$news_id = $this->request->data['News']['news_id'];
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
			$this->News->create();
			$data = $this->request->data['News'];
			// debug($this->request->data);
			// debug($data);
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->News->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->News->locale = 'en';
			}else{
				$this->News->locale = 'ru';
			}
			// $this->News->locale = 'ru';
			if($this->News->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->News->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->News->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->News->id = $id;
			// $this->News->locale = Configure::read('Config.languages');
			// debug($this->News->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['News'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->News->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->News->locale = 'en';
			}else{
				$this->News->locale = 'ru';
			}
			
			// $this->News->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->News->save($data1)){
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
			$this->News->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->News->read(null, $id);
		}
			
			$this->set(compact('id', 'data'));

	}

	public function admin_delete($id){
		if (!$this->News->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->News->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->News->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->News->locale = Configure::read('Config.language');
		$this->News->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$post = $this->News->findById($id);
	
		$title_for_layout = $post['News']['title'];
		$meta['keywords'] = $post['News']['keywords'];
		$meta['description'] = $post['News']['description'];
		$this->set(compact('post', '','title_for_layout' ,'meta'));
	}

}