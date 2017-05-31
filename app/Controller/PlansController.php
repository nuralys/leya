<?php

class PlansController extends AppController{
	// public $uses = array('Plan', 'Category', 'Country');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		// $this->Plan->locale = Configure::read('Config.language');
		// $this->Plan->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Plan->find('all', array(
			'order' => array('Plan.id' => 'desc')
		));
		$years = array();
		

		
		// debug($new_array);
		// $new['2017'] = "Plan";
		// for($i = 1; $i>=count($new); $i++){
		// 	$new[$i] = "asd";
		// }
		// debug($new);
		// die;
		$title_for_layout = __('План');
		$this->set(compact('title_for_layout', 'data', 'new_array'));
	}
		


	public function admin_list($id){
		// $this->Plan->locale = array('ru', 'kz');
		// $this->Plan->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Plan->find('all', array(
			'conditions' => array("Plan.project_id" => $id)
		));
		// debug($data);
		// die;
		
		if($this->request->is('post')){
			$anons = $this->request->data['Plan']['anons'];
			$news_id = $this->request->data['Plan']['news_id'];
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

	public function admin_add($id = null){
		$this->Plan->Project->locale = Configure::read('Config.language');
		$this->Plan->Project->bindTranslation(array('title' => 'titleTranslation'));
		$blocks = $this->Plan->Block->find('all', array(
			'conditions' => array('Block.project_id' => $id),
			'recursive' => -1
		));
			// debug($projects);
			// die;
		if($this->request->is('post')){
			$this->Plan->create();
			$data = $this->request->data['Plan'];
			// debug($this->request->data);
			// debug($data);
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}

			// if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			// 	$this->Plan->locale = 'kz';
			// }elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			// 	$this->Plan->locale = 'en';
			// }else{
			// 	$this->Plan->locale = 'ru';
			// }
			// $this->Plan->locale = 'ru';
			if($this->Plan->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}

		}
		$this->set(compact('blocks'));
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Plan->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Plan->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Plan->id = $id;
			// $this->Plan->locale = Configure::read('Config.languages');
			// debug($this->Plan->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Plan'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Plan->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Plan->locale = 'en';
			}else{
				$this->Plan->locale = 'ru';
			}
			
			// $this->Plan->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->Plan->save($data1)){
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
			$this->Plan->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Plan->read(null, $id);
		}
			
			$this->set(compact('id', 'data'));

	}

	public function admin_delete($id){
		if (!$this->Plan->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Plan->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Plan->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Plan->locale = Configure::read('Config.language');
		$this->Plan->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$post = $this->Plan->findById($id);
	
		$title_for_layout = $post['Plan']['title'];
		$meta['keywords'] = $post['Plan']['keywords'];
		$meta['description'] = $post['Plan']['description'];
		$this->set(compact('post', '','title_for_layout' ,'meta'));
	}

	public function plan($project_id, $block=null){
		// if(is_null($project_id) || !(int)$project_id || !$this->Project->exists($project_id)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		// $this->Plan->locale = false;
		// // $this->Block->locale = false;
		// $this->Project->Block->locale = false;
		// $this->Project->Plan->locale = false;
		// $this->Project->bindTranslation(array('title' => 'titleTranslation'));
		// $data = $this->Plan->findById($project_id);
		$block_id = 2;
		// $plans = $this->Plan->Block->find('all', array(
		// 	'conditions' => array('Block.id' => $block_id)
		// ));
		$plans = $this->Plan->find('all', array(
			'conditions' => array(
				array('Plan.project_id' => 1),
				array('Plan.block_id' => 3)
				)
		));
		debug($plans);
		die;
		//Определяем этажность
		// $floors = $data['Apartment'];
		// $floors_count = count($data['Apartment']);
		// $count_floor = null;
		// for($i=0; $i<$floors_count; $i++){
		// 	if($floors[$i]['floor'] > $count_floor) {
		// 		$count_floor = $floors[$i]['floor'];
		// 	}
		// }
		// $o = 1;
		// 		$count_rooms = array();
		//  foreach ($data['Plan'] as $item){
		// 	if($item['floor'] == 1 && $item['rooms'] != 0){
		// 		// debug($item['rooms']);
		// 		array_push($count_rooms, $item['rooms']);
		// 	// $o++;
		// 		$ua = array_unique($count_rooms);
		// 	}
		// }
		// foreach($ua as $item){
		// 	debug($item);
		// }
		// // debug($ua);
		// die;
		// debug($project_id);
		// debug($data['Project']['floor']);
		// die;
		// if($block == null){

		// }
		// $count_rooms = array(); 
		// 							foreach ($data['Plan'] as $item): 
		// 								if($item['floor'] == 1 && $item['rooms'] != 0): 
										
		// 									 debug($item);
		// 									// array_push($count_rooms, $item['rooms']);
		// 									// $uniqa = array_unique($count_rooms);
											
		// 							 endif;
		// 							 endforeach;
									
		// 							 die;

		$this->set(compact('data', 'title_for_layout', 'meta'));
	}

}