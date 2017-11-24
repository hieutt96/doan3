<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\Company;
class CommentController extends Controller
{
   public function postComment($id,Request $request){
       $idDoanhNghiep = $id;
       $doanhnghiep = Company::find($id);
       $comment = new Comment();
       $comment->company_id = $idDoanhNghiep;
       $comment->user_id = Auth::user()->id;
       $comment->noi_dung = $request->NoiDung;
       //$comment->created_at = date('d-m-Y',time());
       $comment->save();
       return back()->with('thongbao','Bạn đã 
       bình luận cho công ty này');

   }

}
