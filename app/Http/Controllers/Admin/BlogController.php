<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;

class BlogController extends Controller
{
  
    public function getblog()
    {
       $infor = Blog::paginate(3);
        return view('admin.blog.blog', compact("infor"));
    }

    public function getaddblog()
    {
        return view('admin.blog.addblog');
    }

  
    public function postaddblog(Request $request)
    {
        $blog = new Blog();
        $image = $request->image;
        $blog->title= $request->title ;
        $blog->description= $request->description ;
        $blog->content= $request->content ;
        if(!empty($image)) {
                $blog->image = $image->getClientOriginalName();
        }   
        if($blog->save()){
            if(!empty($image)) {
               $image->move(public_path('/admin/assets/images/blog'), $image->getClientOriginalName());
                return redirect()->route('getblog');
            }      
        } else {
            return redirect()->back()->withErrors('Update profile error');
        }
        
    }

    public function deleteblog($id)
    {
        Blog::destroy($id);
        return redirect()->route('getblog');
    }


    public function geteditblog($id)
    {
        $infor = Blog::find($id);
        return view('admin.blog.editblog', compact("infor"));
    }



     public function posteditblog(Request $request, $id)
    {
        $blog = Blog::find($id);
        
        $image = $request->image;

        $blog->title= $request->title ;
        $blog->description= $request->description ;
        $blog->content= $request->content ;
        if(!empty($image)) {
                $blog->image = $image->getClientOriginalName();
        } 
        if($blog->save()){
            if(!empty($image)) {
            $image->move(public_path('/admin/assets/images/blog'), $image->getClientOriginalName());
            return redirect()->route('getblog'); }   
        } else {
            return redirect()->back()->withErrors('Update profile error');
        }
        
    }



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
    public function update(Request $request, $id)
    {
        //
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
