<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\DB;
use Auth;
use App\News;
use App\Comment;
use File;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::whereNull('deleted_at')->orderBy('id','DESC')->paginate(3);
        return view('welcome', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hinh = Input::file('hinh');
        $uploadFolder = config('custom.path_hinh');
        $filename = str_random(). '.' . $hinh->getClientOriginalExtension();
        $hinh->move(public_path() . $uploadFolder, $filename);

        $new = new News();
        $new->tieude = $request->tieude;
        $new->tomtat = $request->tomtat;
        $new->noidung = $request->noidung;
        $new->hinh = $filename;
        $new->save();

        return redirect()->route('new')->with(['msg' => 'Add new post successfull']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::find($id);
        $cmts=DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->join('news','comments.new_id','=','news.id')
            ->select('comments.noi_dung_cmt','users.name','news.noidung','users.avatar','comments.created_at')
            ->where('news.id','=',$id)
            ->get();
        return view('new.show',compact('new','cmts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::find($id);
        return view('new.edit', compact('new'));
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
        if (isset($_POST['comment'])) {
            $cmt = new Comment();
            $cmt->user_id = Auth::user()->id;
            $cmt->new_id = $id;
            $cmt->noi_dung_cmt = $request->comment;
            $cmt->save();

            return redirect()->route('new.show',['id' => $id]);
        } else {
            $new = News::find($id);
            if (Input::hasFile('hinh')) {
                $oldFile = $new->hinh;
                File::Delete($oldFile);
                $file = Input::file('hinh');
                $uploadFolder = config('custom.path_hinh');
                $filename = str_random(). '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . $uploadFolder, $filename);
            } else {
                $filename = $new->hinh;
            }
                $new->tieude = $request->tieude;
                $new->tomtat = $request->tomtat;
                $new->noidung = $request->noidung;
                $new->hinh = $filename;
                $new->save();

                return redirect()->route('new.show',['id' => $id])->with(['msg' => 'Edit post successfull']);
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
        $new = News::find($id);
        $new->delete();
        return redirect()->back()->with(['msg' => 'The member has been deleted']);
    }
}
