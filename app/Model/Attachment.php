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
        'Proposta' => array(
            'className' => 'Proposta',
            'foreignKey' => 'foreign_key',
        )
    );
}
?>