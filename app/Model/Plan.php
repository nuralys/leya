<?php
class Plan extends AppModel {

	public $belongsTo = array(
		// 'Apartment' => array(
		// 	'className' => 'Apartment',
		// 	),
		'Block' => array(
			'className' => 'Block',
			),
		'Project' => array(
			'className' => 'Project',
			)
		);
}