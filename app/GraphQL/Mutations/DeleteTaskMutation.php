<?php

namespace App\GraphQL\Mutations;

use App\Models\Task;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteTaskMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteTask',
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
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure
                            $getSelectFields): bool
    {
        $task = Task::findOrFail($args['id']);
        $task->delete();

        return true;
    }
}
