<?php

namespace App\GraphQL\Types;

use App\Models\Task;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TaskType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Task',
        'description' => 'Collection of tasks',
        'model' => Task::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of task'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the task'
            ],
            'status' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Status of the task'
            ],
            'active' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => "Shows if the task is active or not"
            ],
            'user' => [
                'type' => GraphQL::type('User'),
                'description' => 'The user that owned the task'
            ],
            'category' => [
                'type' => GraphQL::type('Category'),
                'description' => 'The category of the task'
            ]
        ];
    }
}