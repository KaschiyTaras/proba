<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UpdateController extends Controller
{

    public function __invoke(Post $post)
    {


        $data = request()->validate([
            'name' => 'string',
            'age' => 'string',
            'category_id' => '',
        ]);
        $post->update($data);
        return redirect()->route('family.show', $post->id);
    }

}
