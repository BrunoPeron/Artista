<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Transacao\\V1\\Rest\\Cartao\\CartaoResource' => 'Transacao\\V1\\Rest\\Cartao\\CartaoResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'transacao.rest.cartao' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/cartao[/:cartao_id]',
                    'defaults' => array(
                        'controller' => 'Transacao\\V1\\Rest\\Cartao\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'transacao.rest.cartao',
        ),
    ),
    'zf-rest' => array(
        'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
            'listener' => 'Transacao\\V1\\Rest\\Cartao\\CartaoResource',
            'route_name' => 'transacao.rest.cartao',
            'route_identifier_name' => 'cartao_id',
            'collection_name' => 'cartao',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Transacao\\V1\\Rest\\Cartao\\CartaoEntity',
            'collection_class' => 'Transacao\\V1\\Rest\\Cartao\\CartaoCollection',
            'service_name' => 'Cartao',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Transacao\\V1\\Rest\\Cartao\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
                0 => 'application/vnd.transacao.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
                0 => 'application/vnd.transacao.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Transacao\\V1\\Rest\\Cartao\\CartaoEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'transacao.rest.cartao',
                'route_identifier_name' => 'cartao_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Transacao\\V1\\Rest\\Cartao\\CartaoCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'transacao.rest.cartao',
                'route_identifier_name' => 'cartao_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
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
    'zf-content-validation' => array(
        'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
            'input_filter' => 'Transacao\\V1\\Rest\\Cartao\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Transacao\\V1\\Rest\\Cartao\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nrcartao',
                'description' => 'numero do cartao que deve ser criptografado com pelo menos um bcrypt',
                'error_message' => 'faltou o numero do cartao',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'tipo',
                'description' => 'tipo do cartao credito ou debito',
                'error_message' => 'faltou o tipo',
            ),
            2 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nome',
                'description' => 'nome do proprietario do cartao',
                'error_message' => 'faltou o nome do proprietario',
            ),
            3 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'codpessoa',
                'description' => 'codigo da pessoa que sera vinculado ao cartao',
                'error_message' => 'faltou o codpessoa',
            ),
            4 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cpf',
                'description' => 'cpf do dono do cartao',
                'error_message' => 'faltou o cpf',
            ),
            5 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'validade',
                'error_message' => 'faltou a validade',
                'description' => 'validade do cartao',
            ),
            6 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'sobrenome',
                'description' => 'sobrenome do dono',
                'error_message' => 'faltou o sobrenome',
            ),
            7 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'codcartao',
                'description' => 'codigo de indice para o cartao',
            ),
            8 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'descadd',
                'description' => 'descricao adicional',
            ),
        ),
    ),
);
