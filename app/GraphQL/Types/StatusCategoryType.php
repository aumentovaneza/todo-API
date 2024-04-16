<?php

namespace App\GraphQL\Types;

use App\Models\StatusCategory;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class StatusCategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'StatusCategory',
        'description' => 'Collection of status categories',
        'model' => StatusCategory::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of category'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of category'
            ],
            'tasks' => [
                'type' => Type::listOf(GraphQL::type('Task')),
                'description' => 'List of tasks belonging to a category'
            ]
        ];
    }
}
