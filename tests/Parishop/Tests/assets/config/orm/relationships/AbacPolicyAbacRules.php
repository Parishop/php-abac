<?php
return [
    'type'         => 'manyToMany',
    'left'         => 'abacPolicy',
    'right'        => 'abacRule',
    'leftOptions'  => [
        'property' => 'rules',
    ],
    'rightOptions' => [
        'property' => 'policies',
    ],
    'pivot'        => 'abacPoliciesAbacRules',
    'pivotOptions' => [
        'leftKey'  => 'abacPolicyId',
        'rightKey' => 'abacRuleId',
    ],
];