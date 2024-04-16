<?php

namespace App\GraphQL\Queries\StatusCategory;

use App\Models\StatusCategory;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class StatusCategoryTasksQuery extends Query
{
    protected $attributes = [
        'name' => 'task'
    ];

    public function type(): Type {
        return Type::listOf(GraphQL::type('Task'));
    }

    public function args(): array {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required'],
            ]
        ];
    }

    public function resolve($root, $args) {
        $category = StatusCategory::findOrFail($args['id']);

        return $category->tasks;
    }
}
