<?php

namespace App\GraphQL\Queries;

use Elasticsearch\ClientBuilder;
use App\Component as C;

class Component
{
    public $esClient;
    function __construct()
    {
        $this->esClient = ClientBuilder::create()->build();
    }
    /**
     * __invoke
     *
     * @param  mixed $_
     * @param  mixed $args
     * @return componentModel
     */
    public function __invoke($_, array $args): ?Object
    {
        $id = $args['id'];
        $params = [
            'index' => 'pc-components',
            'body' => [
                'query' => [
                    'terms' => [
                        '_id' => [$id]
                    ]
                ]
            ]
        ];
        $result = $this->esClient->search($params);
        if (!empty($result['hits']['hits'])) {
            $c =  $result['hits']['hits'][0];
            return C::esToComponent($c);
        } else {
            return null;
        }
    }
}
