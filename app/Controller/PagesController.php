<?php
App::uses('CakeEmail', 'Network/Email');

class PagesController extends AppController {

	public $uses = array('Page', 'News');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function home(){
		//$partners = $this->Partner->find('all');
		//$this->set(compact('partners'));
	}

	public function index(){
		
		$this->Page->locale = Configure::read('Config.language');
		$this->Page->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		
		$main = $this->Page->findById(1);
		//$partners = $this->Partner->find('all');
		
		// $page = $this->Page->findById(1);
		// if(!$page){
		// 	throw new NotFoundException("Такой страницы нету");
		// }
		
		$title_for_layout = __('Fergus - Закупка и экспорт сельскохозяйственной продукции');
		// $meta['keywords'] = $page['Page']['keywords'];
		// $meta['description'] = $page['Page']['description'];
		$this->set(compact('main', 'title_for_layout', 'meta', 'news'));
	}    

	public function page($page_alias = null){
		$this->Page->locale = Configure::read('Config.language');
		$this->Page->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		
		if(is_null($page_alias)){
			throw new NotFoundException("Такой страницы нету");
		}
		$page = $this->Page->findByAlias($page_alias);
		if(!$page){
			throw new NotFoundException("Такой страницы нету");
		}
		
		$title_for_layout = $page['Page']['title'];
		$meta['keywords'] = $page['Page']['keywords'];
		$meta['description'] = $page['Page']['description'];
		
		$this->set(compact('page_alias', 'page', 'title_for_layout', 'meta'));
	}

	public function admin_index(){
		$this->Page->locale = 'ru';
		$this->Page->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$pages = $this->Page->find('all');
		$this->set(compact('pages'));
	}

	public function admin_edit($page_id){
		
		if(is_null($page_id) || !(int)$page_id || !$this->Page->exists($page_id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Page->findById($page_id);
		if(!$page_id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Page->id = $page_id;
			// $this->Page->locale = Configure::read('Config.languages');
			// debug($this->Page->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Page'];
			

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Page->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Page->locale = 'en';
			}else{
				$this->Page->locale = 'ru';
			}
			// $this->Page->locale = 'kz';
			// debug($data1);
			$data1['id'] = $page_id;
			if($this->Page->save($data1)){
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
			$this->Page->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Page->read(null, $page_id);
		}
			$this->set(compact('page_id', 'data'));


	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Page->create();
			$data = $this->request->data['Page'];
			
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Page->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Page->locale = 'en';
			}else{
				$this->Page->locale = 'ru';
			}
			if($this->Page->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function request(){
		$title_for_layout = __('Инвесторам');
		$this->set(compact('title_for_layout'));

		if( !empty($this->request->data) ){
			$email = new CakeEmail('smtp');
			$email->from(array('st-kotel.kz@yandex.ru' => 'Astana N-Tech'))
			->to('st-kotel.kz@yandex.ru')
			->subject('Новые письмо с сайта');
			$message = 'ФИО: '. $this->request->data['Page']['fio'] . ' Телефон: '. $this->request->data['Page']['phone'] . ' Почта: ' . $this->request->data['Page']['email'] . ' Текст: ' . $this->request->data['Page']['body'];
			if( $email->send($message) ){
				$this->Session->setFlash('Письмо успешно отправлено', 'default', array(), 'good');
				//unset($message);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка!', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
		}
	}

	public function contacts(){
		$title_for_layout = "Контакты";
		$this->set(compact('title_for_layout'));
	}

	public function purchase(){
		$title_for_layout = "Закупки";
		$this->set(compact('title_for_layout'));
	}
	public function scheme(){
		$title_for_layout = "Схема работы";
		$this->set(compact('title_for_layout'));
	}

}
