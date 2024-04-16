<?php

namespace App\GraphQL\Mutations;

use App\Models\Task;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteAllTaskMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAllTask',
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure
                            $getSelectFields): bool
    {
        $tasks = Task::all();

        foreach ($tasks as $task) {
            if ($task->category->title !== 'active' ) {
                $task->delete();
            }
        }

        return true;
    }
}
