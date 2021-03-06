<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //

    public function index(){

        $posts = auth()->user()->posts()->paginate(10);
        // そのユーザーのPostを取ってくる & pagination

        // $posts = auth()->user()->posts;
        // そのユーザーのPostを取ってくる
        
        // $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }


    public function show($id){

        $post = Post::findOrFail($id);
    
        return view('blog-post', compact('post'));
    }


    public function create(){

        return view('admin.posts.create');
    }


    public function store(){

        $this->authorize('create', Post::class);
        // 新しいPostを作るときはまだUserが決まっておらず、基本的にはAuthenticationは必要ないが、
        // ハッカー対策としてPolicyを用意することができる。
        // 「ログインしたユーザーなら誰でもPostを作れる」というロジックをPolicy内に記述する必要あり。

        $input = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            // 'post_image' => 'mimes:jpeg,png',
            'body' => 'required'
        ]);

        if(request('post_image')){
            $input['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($input);

        // sessionでメッセージを一時的に表示させる方法② - session()を使う
        // bladeでのsessionデータの受け取り方は、posts/index.blade.php を確認
        session()->flash('post-created-message', 'Post was created. \'' . $input['title'] . '\'');
        // $input->title でやろうと思ったが、まだオブジェクトを生成する前で、inputは配列なのでできない。
        // $input['title'] とする必要あり。

        return redirect()->route('post.index');
    }


    public function edit($id){

        $post = Post::findOrFail($id);

        $this->authorize('view', $post);
        // タイトルクリック後に個別のpostを見れなくするためのfunctionを、この１行で有効化。
        // 第二引数に$postを渡さなかったら、自分のpostも見れなくなる。

        return view('admin.posts.edit', compact('post'));
    }


    public function update($id){

        $input = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            // 'post_image' => 'mimes:jpeg,png',
            'body' => 'required'
        ]);

        $post = Post::findOrFail($id);

        if(request('post_image')){
            $input['post_image'] = request('post_image')->store('images');
            $post->post_image = $input['post_image'];
        }

        $post->title = $input['title'];
        $post->body = $input['body'];

        $this->authorize('update', $post);
        // 自分のpostのみをupdateできるようにするためのfunction。
        // function自体は、PostPolicy.phpにあり、この１行をcontrollerに追加することで、有効化できる。
        // 第二引数に$postを渡さないと、自分のpostもupdateできなくなる。

        auth()->user()->posts()->save($post);

        session()->flash('post-updated-message', 'Post was updated. \'' . $input['title'] . '\'');

        return redirect()->route('post.index');
    }


    public function destroy($id){

        $post = Post::findOrFail($id);

        $this->authorize('delete', $post);

        $post->delete();

        // sessionでメッセージを一時的に表示させる方法① - Sessionクラスを使う
        // bladeでのsessionデータの受け取り方は、posts/index.blade.php を確認
        Session::flash('post-deleted-message','Post was deleted.');

        return back();
    }
}
