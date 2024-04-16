<?php

namespace App\GraphQL\Mutations;

use App\Models\Task;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateTaskMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateTask',
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
              'name' => 'id',
              'type' => Type::int(),
              'required' => true,
            ],
            'title' => [
                'name' => 'title',
                'type' => Type::string(),
            ],
            'status' => [
                'name' => 'status',
                'type' => Type::int(),
            ],
            'active' => [
                'name' => 'active',
                'type' => Type::boolean(),
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure
                            $getSelectFields): bool
    {
        $task = Task::findOrFail($args['id']);

        $task->update([
            'title' => $args['title'],
            'status' => $args['status'],
            'active' => $args['active']
        ]);

        return true;
    }
}
