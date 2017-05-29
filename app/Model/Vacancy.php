<?php 

class Vacancy extends AppModel{
	public $actsAs = array(
		'Translate' => array(
			'title',
			'position',
			'body'
			)
		);
	
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название'
		),
		'position' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите текст'
		)
	);
}