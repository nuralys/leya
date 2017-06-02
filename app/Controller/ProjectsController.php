<?php

class ProjectsController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function admin_index(){
		$this->Project->locale = array('ru', 'en');
		$this->Project->bindTranslation(array(
			'title' => 'titleTranslation'
		));
		$data = $this->Project->find('all');
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Project->create();
			$data = $this->request->data['Project'];

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Project->locale = 'kz';
			}else{
				$this->Project->locale = 'ru';
			}
			if($this->Project->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->Project->exists($id)){
			throw new NotFoundException('Такой категории нет...');
		}
		$data = $this->Project->findById($id);
		if(!$id){
			throw new NotFoundException('Такой категории нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Project->id = $id;
			// $this->Project->locale = Configure::read('Config.languages');
			// debug($this->Project->locale);

			$data1 = $this->request->data['Project'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Project->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Project->locale = 'en';
			}else{
				$this->Project->locale = 'ru';
			}
			// $this->Project->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
			
			if($this->Project->save($data1)){
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
			$this->Project->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Project->read(null, $id);
		}
			$this->set(compact('id', 'data'));
	}

	public function admin_delete($id){
		if (!$this->Project->exists($id)) {
			throw new NotFounddException('Такой категории нет');
		}
		if($this->Project->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Project->locale = Configure::read('Config.language');
		$this->Project->bindTranslation(array('title' => 'titleTranslation'));


		if(isset($this->request->query['on_stage'])){
		
			$data = $this->Project->find('all', array(
				'conditions' => array('Project.on_stage' => 1)
			));
		}

		if(isset($this->request->query['foreign_project'])){
			$data = $this->Project->find('all', array(
				'conditions' => array('Project.foreign_project' => 1)
			));
		}
		if(!isset($this->request->query['foreign_project']) && !isset($this->request->query['on_stage'])){
			$data = $this->Project->find('all');
		}
		$title_for_layout = __('Проекты');
		// $meta['keywords'] = $post['Project']['keywords'];
		// $meta['description'] = $post['Project']['description'];
		$this->set(compact('data', 'title_for_layout' ,'meta'));
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Project->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Project->locale = Configure::read('Config.language');
		$this->Project->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Project->findById($id);
		$aside = $this->Project->find('all');
		$title_for_layout = $data['Project']['title'];
		// $meta['keywords'] = $post['Project']['keywords'];
		// $meta['description'] = $post['Project']['description'];
		$this->set(compact('data', 'aside', 'title_for_layout' ,'meta'));
	}

	public function plan($project_id, $block=null){
		// if(is_null($project_id) || !(int)$project_id || !$this->Project->exists($project_id)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		$this->Project->locale = false;
		// $this->Block->locale = false;
		$this->Project->Block->locale = false;
		$this->Project->Plan->locale = false;
		// $this->Project->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Project->findById($project_id);
		$block_id = 2;
		$plans = $this->Project->Block->find('all', array(
			'conditions' => array('Block.id' => $block_id)
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

	public function description($id){
		if(is_null($id) || !(int)$id || !$this->Project->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Project->locale = Configure::read('Config.language');
		$this->Project->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Project->findById($id);

		// $advantages = $this->Project->Ad
		// debug($data);
		// die;
		// $aside = $this->Project->find('all');
		$title_for_layout = $data['Project']['title'];
		// $meta['keywords'] = $post['Project']['keywords'];
		// $meta['description'] = $post['Project']['description'];
		$this->set(compact('data', 'title_for_layout' ,'meta'));
	}

	public function gallery($id){
		// if(is_null($id) || !(int)$id || !$this->Project->exists($id)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		// $this->Project->locale = Configure::read('Config.language');
		// // $this->Project->locale = 'ru';
		$this->Project->locale = false;
		// $this->Project->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Project->findById($id);
		// debug($data);
		// die;
		// $data = $this->Project->Gallery->find('all', array(
		// 	'conditions' => array('')
		// ));
		// $title_for_layout = $data['Project']['title'];
		// $meta['keywords'] = $post['Project']['keywords'];
		// $meta['description'] = $post['Project']['description'];
		$this->set(compact('data', 'title_for_layout' ,'meta'));
	}

	public function location($id){
		if(is_null($id) || !(int)$id || !$this->Project->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Project->locale = Configure::read('Config.language');
		$this->Project->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Project->findById($id);
		// debug($data);
		// die;
		// $aside = $this->Project->find('all');
		$title_for_layout = $data['Project']['title'];
		// $meta['keywords'] = $post['Project']['keywords'];
		// $meta['description'] = $post['Project']['description'];
		$this->set(compact('data', 'title_for_layout' ,'meta'));
	}

}