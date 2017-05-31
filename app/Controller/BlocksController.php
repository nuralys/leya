<?php

class BlocksController extends AppController{
	// public $uses = array('Block', 'Category', 'Country');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		// $this->Block->locale = Configure::read('Config.language');
		// $this->Block->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Block->find('all', array(
			'order' => array('Block.id' => 'desc')
		));

		// debug($new);
		// die;
		$title_for_layout = __('Блок');
		$this->set(compact('title_for_layout', 'data', 'new_array'));
	}
		
	public function admin_index(){}

	public function admin_list($id){
		// $this->Block->locale = array('ru', 'kz');
		// $this->Block->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Block->find('all', array(
			'conditions' => array("Block.project_id" => $id)
		));
		// debug($data);
		// die;
		
		if($this->request->is('post')){
			$anons = $this->request->data['Block']['anons'];
			$news_id = $this->request->data['Block']['news_id'];
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
		$this->Block->Project->locale = Configure::read('Config.language');
		$this->Block->Project->bindTranslation(array('title' => 'titleTranslation'));
		// $blocks = $this->Block->Block->find('all', array(
		// 	'conditions' => array('Block.project_id' => $id),
		// 	'recursive' => -1
		// ));
			// debug($projects);
			// die;
		if($this->request->is('post')){
			$this->Block->create();
			$data = $this->request->data['Block'];
			// debug($this->request->data);
			// debug($data);
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}

			// if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			// 	$this->Block->locale = 'kz';
			// }elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			// 	$this->Block->locale = 'en';
			// }else{
			// 	$this->Block->locale = 'ru';
			// }
			// $this->Block->locale = 'ru';
			if($this->Block->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}

		}
		// $this->set(compact('blocks'));
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Block->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Block->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Block->id = $id;
			// $this->Block->locale = Configure::read('Config.languages');
			// debug($this->Block->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Block'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Block->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Block->locale = 'en';
			}else{
				$this->Block->locale = 'ru';
			}
			
			// $this->Block->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->Block->save($data1)){
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
			$this->Block->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Block->read(null, $id);
		}
			
			$this->set(compact('id', 'data'));

	}

	public function admin_delete($id){
		if (!$this->Block->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Block->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Block->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Block->locale = Configure::read('Config.language');
		$this->Block->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$post = $this->Block->findById($id);
	
		$title_for_layout = $post['Block']['title'];
		$meta['keywords'] = $post['Block']['keywords'];
		$meta['description'] = $post['Block']['description'];
		$this->set(compact('post', '','title_for_layout' ,'meta'));
	}

	public function plan($project_id, $block=null){
		// if(is_null($project_id) || !(int)$project_id || !$this->Project->exists($project_id)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		// $this->Block->locale = false;
		// // $this->Block->locale = false;
		// $this->Project->Block->locale = false;
		// $this->Project->Block->locale = false;
		// $this->Project->bindTranslation(array('title' => 'titleTranslation'));
		// $data = $this->Block->findById($project_id);
		//debug($this->request->params['pass'][1]);die;
		// $block = $block;
		$block = substr($block, -1, 1);
		

		$r = $this->Block->Block->find('first', array(
			'conditions' => array(
				array('Block.project_id' => $project_id),
				array('Block.id' => $block)
			)
		));

		$block_id = $r['Block']['id'];
		// debug($block_id);die;
		// $block_id = 2;
		// $plans = $this->Block->Block->find('all', array(
		// 	'conditions' => array('Block.id' => $block_id)
		// ));
		$data = $this->Block->find('all', array(
			'conditions' => array(
				array('Block.project_id' => $project_id),
				array('Block.block_id' => $block_id)
				)
		));

		$blocks_list = $this->Block->Block->find('all', array(
			'conditions' => array(
				array('Block.project_id' => $project_id)
			),
			'recursive' => -1
		));

		

		$this->set(compact('data', 'title_for_layout', 'meta', 'blocks_list'));
	}

}