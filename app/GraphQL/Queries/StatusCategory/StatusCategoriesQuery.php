<?php

namespace App\GraphQL\Queries\StatusCategory;

use App\Models\StatusCategory;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class StatusCategoriesQuery extends Query
{
    protected $attributes = [
        'name' => 'title'
    ];

    public function type(): Type {
        return Type::listOf(GraphQL::type('StatusCategory'));
    }

    public function resolve($root, $args) {
        return StatusCategory::all();
    }
}
