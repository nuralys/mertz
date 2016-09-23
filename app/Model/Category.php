<?php

class Category extends AppModel {

	public $hasMany = array(
		'Product' => array(
		        'className'  => 'Product',
		     )
	    );
	public $validate = array(
	        'title' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Введите название'
	        ),
	        'alias' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Введите alias'
	        )
	    );
}