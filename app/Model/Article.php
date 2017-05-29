<?php
class Article extends AppModel{
	public $actsAs = array(
		'Translate' => array(
			'body'
			)
		);

	public $belongsTo = 'Construction';
	// public $translateModel = 'ProductI18n';
	public $validate = array(
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите текст'
		)
	);

}