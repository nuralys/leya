<?php
class Apartment extends AppModel {

	public $belongsTo = array(
		'Block' => array(
			'className' => 'Block',
			),
		'Project' => array(
			'className' => 'Project',
			)
		);
}