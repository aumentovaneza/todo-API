<?php

namespace App\GraphQL\Mutations;

use App\Models\Task;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateTaskMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createTask',
    ];

    public function type(): Type
    {
        return GraphQL::type('Task');
    }

    public function args(): array
    {
        return [
           'title' => [
               'name' => 'title',
               'type' => Type::string(),
               'required' => true,
           ],
            'status' => [
                'name' => 'status',
                'type' => Type::int(),
                'required' => true,
            ],
            'active' => [
                'name' => 'active',
                'type' => Type::boolean(),
                'required' => true,
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure
    $getSelectFields): Task
    {
        return Task::create([
            'title' => $args['title'],
            'status' => $args['status'],
            'active' => $args['active']
        ]);
    }
}
