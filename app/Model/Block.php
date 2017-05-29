<?php
class Block extends AppModel{

	public $belongsTo = 'Project';

	public $hasMany = array(
	        // 'Gallery' => array(
	        //     'className'  => 'Gallery',
	        //     // 'conditions' => array('Recipe.approved' => '1'),
	        //     // 'order'      => 'Recipe.created DESC'
	        // ),
	        'Apartment' => array(
	        	'className' => 'Apartment'
	        )
	    );

}