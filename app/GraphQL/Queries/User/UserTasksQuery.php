<?php

namespace App\GraphQL\Queries\User;

use App\Models\Task;
use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class UserTasksQuery extends Query
{
    protected $attributes = [
        'name' => 'userTasks'
    ];

    public function type(): Type
    {
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

    public function resolve($root, $args)
    {
        $user = User::findOrFail($args['id']);

        return $user->tasks;
    }
}
