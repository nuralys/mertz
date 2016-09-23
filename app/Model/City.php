<?php

class City extends AppModel {
	
    public $hasMany = array('User');
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