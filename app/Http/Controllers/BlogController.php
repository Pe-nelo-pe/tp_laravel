<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = new Blog;
        $blogs = $blog->selectBlogs();
    
        return view('blog.index', ['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=> 'required',
            'title_fr'=> 'required',
            'content' => 'required',
            'content_fr' => 'required',
        ]);


        $newPost = Blog::create([
            'title'=> $request->title,
            'title_fr'=> $request->title_fr,
            'content' => $request->content,
            'content_fr' => $request->content_fr,
            'user_id'=> Auth::user()->id,
        ]);

        return redirect(route('blog.show', $newPost->id)); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $blogLang = new Blog;
        $blog = $blogLang->selectBlog($blog->id);

        return view('blog.show', ['blog' => $blog[0]]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', ['blog' => $blog ]
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
         $request->validate([
            'title'=> 'required',
            'title_fr'=> 'required',
            'content' => 'required',
            'content_fr' => 'required',
        ]);
     
        $blog->update([
            'title'=> $request->title,
            'title_fr'=> $request->title_fr,
            'content' => $request->content,
            'content_fr' => $request->content_fr,
        ]);

        return redirect(route('blog.show', $blog->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect(route('blog.index'));
    }

    public function query(){

        //select * from blog_posts;
            //$query = Blog::all();
        //select CHAMPS from blog_posts; champs mis dans le select() pour plusieurs, mettre virgule
            //$query = Blog::select('title')->get();



        //WHERE (pas avec cle primaire, donc n'importe quel champs) ici tableau multi-dimensionnel (plusieurs resultats)
            // $query = Blog::select()
            //                 ->where('user_id', '>', 1) // si 2 parametre avec rien - =, sinon, ajouter le parametre > < blabla
            //                 ->get();
        


        // WHERE avec cle primaire
        // SELECT * from blog_posts where id = 1;
            //$query = Blog::find(1); // find sait que c'est cle primaire qu'on cherche, donc donne un résultat



        //AND - ajout d'un where pour chaque conditions désirées
            // $query = Blog::select()
            //                 ->where('user_id', 1)
            //                 ->where('id', 7)
            //                 ->get();



        //OR - ajout d'un orWhere pour chaque conditions secondaires
            // $query = Blog::select()
            //                 ->where('user_id', 1)
            //                 ->orWhere('id', 7)
            //                 ->get();



        //Order by
            // $query = Blog::select()
            //                 ->orderBy('title', 'desc')
            //                 ->get();

        //Peut mettre plusieurs conditions
            //  $query = Blog::select()
            //                 ->where('bla bla')
            //                 ->orderBy('title', 'desc')
            //                 ->get();



        //inner join
        //select * from blog_posts inner join users on user_id = users.id;
            // $query = Blog::select()
            //                 ->join('users', 'users.id', '=', 'user_id')
            //                 ->get();

            
            
        //outer join
        //select * from blog_posts right outer join users on user_id = users.id;
            // $query = Blog::select()
            //                 ->rightJoin('users', 'users.id', '=', 'user_id')
            //                 ->get();



        //aggregation
              //$query = Blog::count();
              //$query = Blog::max('id');
              //$query = Blog::select()
              //               ->count(); peut mettre plusieurs ensemble (genre select, inner then count)



        // raw query besoin de (use Illuminate\Support\Facades\DB;)
        //select count(*) as blogs, user_id from blog_posts group by user_id;
            // $query = Blog::select(DB::raw('count(*) as blogs, user_id '))
            //                 ->groupBy('user_id')
            //                 ->get();

        //return $query;
    }


    // public function pdf(Blog $blog){
    //     $pdf = PDF::loadView('blog.show-pdf', ['blog'=> $blog]);
    //     return $pdf->stream('blog.pdf');
    // }
}