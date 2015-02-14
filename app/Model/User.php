<?php 
// app/Model/User.php
class User extends AppModel {
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'O login é obrigatório.'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A senha é obrigatória.'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'colaborador')),
                'message' => 'Por favor escolha um nível de acesso válido',
                'allowEmpty' => false
            )
        )
    );
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }

        return true;
    }
}
?>