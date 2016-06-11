<?php 

class Post extends AppModel {

    var $actsAs = array('Sluggable');

	public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );

	public function isOwnedBy($post, $user) {
	    return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}

    public function save($data = null, $validate = true, $fieldList = []) {
        if ( !$this->Behaviors->load('Sluggable') ) {
           $this->Behaviors->load('Sluggable');
        }

        return parent::save($data, $validate, $fieldList);
    }
}