<?php

namespace App\GraphQL\Queries;

use Elasticsearch\ClientBuilder;
use App\Component as C;

class Components
{
    public $esClient;
    function __construct()
    {
        $this->esClient = ClientBuilder::create()->build();
    }
    public function __invoke($_, array $args): array
    {
        $category = $args['category'];
        $params = [
            'index' => 'pc-components',
            'body' => [
                'query' => [
                    'match' => [
                        'name' => $category,
                    ]
                ]
            ]
        ];
        $result = $this->esClient->search($params);
        $components = [];
        if (!empty($result['hits']['hits'])) {
            array_walk($result['hits']['hits'], function ($c) use (&$components) {
                array_push($components, C::esToComponent($c));
            });
        }
        return $components;
    }
}
