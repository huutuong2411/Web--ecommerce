<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use App\Models\frontend\Rating;
use App\Models\frontend\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FE_BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getblog()
    {
        $infor = Blog::orderBy('updated_at','desc')->paginate(3);
        return view('frontend.blog.blog', compact("infor"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blogsingle($id)
    {   
        $IDuser = Auth::id();
        $infor =Blog::find($id);
        $next = Blog::where('id','>',$id)->orderBy('id','asc')->first();
        $previous = Blog::where('id','<',$id)->orderBy('id','desc')->first();
        $sao= Rating::select('vote')->where('id_blog',$id)->avg('vote');
        $sao=round($sao);
        $comment = Comment::all();
        return view('frontend.blog.blogsingle',compact("infor","next","previous","sao","comment"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rating(Request $request, $id)
    {
        $rating = new Rating();
        $rating->vote = $request->blogID;
        $rating->id_blog = $id;
        $rating->id_user = Auth::id();
        if($rating->save())  {
            return "đánh giá thành công";
        }else {
            return "đánh giá thất bại";
        }    
    }
    public function comment(Request $request, $id)
    {
        $comment = new Comment();

        $comment->id_blog = $id;
        $comment->id_user = Auth::id();
        $comment->cmt = $request->message;
        $comment->name = Auth::user()->name;
        $comment->avatar = Auth::user()->avatar;
        if($request->level){
            $comment->level=$request->level;
        }
        if($comment->save())  {
            return redirect()->route('blogsingle',$id);
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
