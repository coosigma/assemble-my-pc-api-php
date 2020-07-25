<?php


namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;

class ComponentController extends Controller
{
    public $esClient;

    function __construct()
    {
        $this->esClient = ClientBuilder::create()->build();
    }

    public function searchById($id)
    {
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
            return response()->json([
                "count" => $result['hits']['total']['value'],
                "component" => $result['hits']['hits'],
            ], 200);
        } else {
            return response()->json([
                "status" => "404",
                "details" => [
                    "id" => $id,
                    "message" => "no component founded"
                ],
            ], 400);
        }
    }

    public function searchByCategory($category)
    {
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
        if (!empty($result['hits']['hits'])) {
            return response()->json([
                "count" => $result['hits']['total']['value'],
                "components" => $result['hits']['hits'],
            ], 200);
        } else {
            return response()->json([
                "status" => "404",
                "details" => [
                    "category" => $category,
                    "message" => "no components of the category founded"
                ],
            ], 400);
        }
    }
}
