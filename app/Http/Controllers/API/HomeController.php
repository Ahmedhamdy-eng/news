<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\Comment;
class HomeController extends Controller
{
	#function to get News 
    public function getNews()
    {	
    	$news = News::all();
    	return response()->json([ 'news' => $news ]);
    }

    #function to get Parent Category with Child
    public function getCategory()
    {
    	$cat = Category::with('child')->get();
        return response()->json( [ 'cat' => $cat ] );
    }
    #function to get News With Category and Categories Details
    public function getCategoryNews($id)
    {   
        $categoryDetails = Category::find($id);
        $categoryNews = News::where('category_id' , $id)
        ->get();
        return response()->json( [ 'categoryNews' => $categoryNews , 'categoryDetails'=> $categoryDetails] );
    }
    #function to get news With Comments
    public function getComments($id)
    {
        $comments = Comment::find($id);
        $news = $comments->news ;
        return response()->json(['news'=>$news,'comments'=>$comments]);
    }
    #function to send Comment 
     public function sendComments(request $request , $id)
    {
        $this->validate($request,[
            'comment'  =>  'required|max:200',

        ]);
        $news = News::findOrFail($id);
        $comments = new Comment();
        $comments->comment = $request->comment ;
        $comments->news_id = $news->id ;
        $comments->user_id = auth()->user()->id ;
        $comments->save();

        return response()->json(['message'=>'comment Added']);
    }
  
  

}
