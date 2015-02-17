<?php
class Attachment extends AppModel {
    public $actsAs = array(
        'Upload.Upload' => array(
            'attachment' => array(
                'thumbnailSizes' => array(
                    'home' => '185x410',
                    'lista' => '175x320',
                    'detalhe' => '300x400',
                ),
                'thumbnailMethod'   => 'php'
            ),
        ),
    );

    public $belongsTo = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'foreign_key',
        )
    );
}
?>