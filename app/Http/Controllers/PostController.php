<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $posts = Post::latest()->paginate(5);
        $user = Auth::user();
        $posts = Post::with(['comments' => function ($query)
            {
                $query->orderBy('id', 'desc');
            }])
            ->orderBy('id', 'desc')
            ->get();



            return match ($request->community) {
                'counselor' => view('counselor.community_forum',compact('user','posts')),
                'admin' => view('admin.community_forum',compact('user','posts')),
                default => view('doctor.community_forum',compact('user','posts')),
            };

        // return view('doctor.community_forum',compact('user','posts'));
        // return view('pages.community',compact('user','posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>['required','string', 'min:5','max:100'],
            'description'=>['required','string', 'min:5'],
        ]);

        $user = Auth::user();
        $user->post()->create($request->all());

        // return redirect()->back()->with('success','Post created successfully');
        return response()->json(['success'=>'Post created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return $post;

        // $post->delete();
        // return redirect()->back()->with('success','Post deleted successfully');


    }

    // community forum section
    // public function show_community_forum(){

    // }

    // public function create_post(Request $request){

    // }


    // post comments
    public function store_comment(Request $request){
        $request->validate([
            'comment'=>['required','string', 'min:5'],
            'post_id'=>['required','integer'],
        ]);

        $post = Post::find($request->post_id);

        $post->comments()->create($request->all());
        $latestComment = $post->comments()->latest()->first();

        // return redirect()->back()->with('success','Post created successfully');
        return response()->json(['success'=>'Comment posted','comment'=>$latestComment]);
    }

    public function delete_post(Request $request){

        $post = Post::find($request->id);
        $post->comments()->delete();
        $post->delete();
        return response()->json(['success'=>'Post deleted successfully']);
    }

    // delete_comment
    public function delete_comment(Request $request){
        $comment = Comment::find($request->id);
        $comment->delete();
        return response()->json(['success'=>'Comment deleted successfully']);
    }
}
