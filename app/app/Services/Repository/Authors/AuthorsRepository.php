<?php

namespace App\Services\Repository\Authors;

use App\Models\Authors;

final class AuthorsRepository  implements AuthorsRepositoryInterface
{
    public function list()
    {
        return Authors::select('id','name')->get();
    }
}
