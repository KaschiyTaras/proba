<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{

    public function __invoke()
    {


        $data = request()->validate([
            'name' => 'required|string',
            'age' => 'string',
            'category_id' => '',
            'tags' => '',


        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        // dd($tags,$data);

        $post = Post::create($data);
        $post->tags()->attach($tags);
//        foreach ($tags as $tag){
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id,
//            ]);
//        }

        //Post::create($data);
        return redirect()->route('family.index');
    }

}
