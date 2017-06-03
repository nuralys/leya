<?php
class Resume extends AppModel{


	public $validate = array(
		'fio' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите ФИО'
		),
		'phone' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите телефон'
		),
		'file' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки файла',
				'allowEmpty' => true
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')),
				'message' => 'Разрешены к загрузке PDF, DOC, DOCX',
				'allowEmpty' => true
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '1MB'),
				'message' => 'Максимальный размер файла - 1 Мб',
				'allowEmpty' => true
			),
			'customUploadFile' => array(
				'rule' => 'customUploadFile',
				'message' => 'Ошибка обработки загрузки файла',
				'allowEmpty' => true
			)
		)
	);

	public function customUploadFile($file = array()){
		if(!is_uploaded_file($file['file']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['file']['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'files/resumes/' . $fileName;
		$path_th = WWW_ROOT . 'files/resumes/thumbs/' . $fileName;
		if(!move_uploaded_file($file['file']['tmp_name'], $path)){
			return false;
		}
		$this->data[$this->alias]['file'] = $fileName;
		return true;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'files/resumes/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}

	
}