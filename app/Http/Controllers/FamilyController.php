<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index()
    {
// багато до багато
//        $post = Post::find(15);
//        $tag = Tag::find(1);
//        dd($tag->posts);

// один до багатьох
//            $category = Category::find(2);
//            $post = Post::find(13);
//
//
//
//
//           // $posts = Post::where('category_id', $category->id)->get();
//            dd($category->posts);


//$category = Category::find(1);
//dd($category->posts);

        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
//    public function top(){
//        $post = Post::find(1);
//        dump($post);
//        dump($post->age);
//    }

//    public function top(){
//        $posts = Post::all();
//        dump($posts);
//
//    }
//    public function top(){
//        $posts = Post::all();
//        foreach ($posts as $post){
//            dump($post->name);
//        }
//        dd('end');
//    }

//    public function top(){
//        $post = Post::where('age',38)->first();
//        dump($post->name);
// //       dd('end');
//    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
//        $postArr = [
//            [
//                'name' => 'Taras',
//                'age' => '41',
//            ],
//            [
//                'name' => 'OLga',
//                'age' => '38',
//            ]
//        ];
//        foreach($postArr as $item){
//            // dd($item);
//            Post::create($item);
//        }
//       // dd('created ok');
    }

    public function store()
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

    public function show(Post $post)
    {

        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'name' => 'string',
            'age' => 'string',
            'category_id' => '',
        ]);
        $post->update($data);
        return redirect()->route('family.show', $post->id);
//        $post = Post::find(4);
//        //dd($post->name);
//        $post->update([
//            'name' => 'Барсік',
//            'age' => '2',
//        ]);
//        dd('update ok');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('family.index');
    }

    public function delete()
    {
        $post = Post::find(6);
        $post->delete();
        dd('deleted 6');
    }

    //firstOrCreate
    //updateOrCreated

    public function firstOrCreate()
    {

//        $anotherPost = [
//            'name' => 'katya',
//            'age' => '50',
//        ];

        $post = Post::firstOrCreate([
            'name' => 'Katya',
        ], [
            'name' => 'Katya',
            'age' => '50',
        ]);

        dump($post->age);
        dd('finished');

    }

    public function updateOrCreate()
    {

        $anotherPost = [
            'name' => 'katya',
            'age' => '50',
        ];

        $post = Post::updateOrCreate([
            'name' => 'Katya',
        ], [
            'name' => 'katya',
            'age' => 'update 50',
        ]);
        dump($post->name);
        dd('end end');

    }

}
