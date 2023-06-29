<?php

namespace App\Services\Repository\SourceRepos;

use App\Models\Sources;

class SourcesRepository implements SourcesRepositoryInterface
{    
    /**
     * list
     *
     * @return mixed
     */
    public function list()
    {
        return Sources::select('id', 'name', 'slug')->get();
    }
}