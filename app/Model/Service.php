<?php 

class Service extends AppModel{
	public $actsAs = array(
		'Translate' => array(
			'title',
			'body',
			'keywords',
			'description'

			)
		);

	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название'
		),
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите текст'
		)
	);
}