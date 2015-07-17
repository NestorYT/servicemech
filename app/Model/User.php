<?php
class User extends AppModel {

    public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),
        'note' => array(
            'rule' => 'notBlank'
        )
    );

}
