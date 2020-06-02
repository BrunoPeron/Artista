<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Transacoes\\V1\\Rest\\Cartao\\CartaoResource' => 'Transacoes\\V1\\Rest\\Cartao\\CartaoResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'transacoes.rest.cartao' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/cartao[/:cartao_id]',
                    'defaults' => array(
                        'controller' => 'Transacoes\\V1\\Rest\\Cartao\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'transacoes.rest.cartao',
        ),
    ),
    'zf-rest' => array(
        'Transacoes\\V1\\Rest\\Cartao\\Controller' => array(
            'listener' => 'Transacoes\\V1\\Rest\\Cartao\\CartaoResource',
            'route_name' => 'transacoes.rest.cartao',
            'route_identifier_name' => 'cartao_id',
            'collection_name' => 'cartao',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Transacoes\\V1\\Rest\\Cartao\\CartaoEntity',
            'collection_class' => 'Transacoes\\V1\\Rest\\Cartao\\CartaoCollection',
            'service_name' => 'cartao',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Transacoes\\V1\\Rest\\Cartao\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Transacoes\\V1\\Rest\\Cartao\\Controller' => array(
                0 => 'application/vnd.transacoes.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Transacoes\\V1\\Rest\\Cartao\\Controller' => array(
                0 => 'application/vnd.transacoes.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Transacoes\\V1\\Rest\\Cartao\\CartaoEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'transacoes.rest.cartao',
                'route_identifier_name' => 'cartao_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Transacoes\\V1\\Rest\\Cartao\\CartaoCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'transacoes.rest.cartao',
                'route_identifier_name' => 'cartao_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Transacoes\\V1\\Rest\\Cartao\\Controller' => array(
            'input_filter' => 'Transacoes\\V1\\Rest\\Cartao\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Transacoes\\V1\\Rest\\Cartao\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nrcartao',
                'description' => 'numero do cartao',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'codseguranca',
                'description' => 'cod de seguranca',
            ),
            2 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nome',
                'description' => 'nome da dona do cartao',
            ),
            3 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'sobrenome',
                'description' => 'sobrenome da dona do cartao',
            ),
            4 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cod_pessoa',
                'description' => 'cod da pessoa equivalente',
            ),
            5 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'mesvenc',
                'description' => 'mes de vencimento',
            ),
            6 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cpf',
                'description' => 'cpf da dona do cartao',
            ),
            7 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'anovenc',
                'description' => 'ano de vencimento',
            ),
            8 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cod_cartao',
                'description' => 'cod cartao',
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Transacoes\\V1\\Rest\\Cartao\\Controller' => array(
                'collection' => array(
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
);
