<?php
return array(
    'type'      => 'group',
    'resolvers' => array(
        'id'        => array(
            'type' => 'pattern',
            'path' => '<processor>/<action>/<id>(/)',
        ),
        'action'    => array(
            'type' => 'pattern',
            'path' => '<processor>/<action>(/)',
        ),
        'processor' => array(
            'type'     => 'pattern',
            'path'     => '<processor>(/)',
            'defaults' => array(
                'action' => 'default',
            ),
        ),
        'default'   => array(
            'type'     => 'pattern',
            'path'     => '',
            'defaults' => array(
                'processor' => 'home',
                'action'    => 'default',
            ),
        ),
    ),
);

