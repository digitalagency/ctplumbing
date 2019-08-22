<?php
namespace App\Http\Controllers;

use App\Post;
use App\Option;
use App\Page;
use App\Team;
use App\Feature;
use App\Testimonial;
use App\Category;
use App\CategoryPost;
use App\Topic;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Contact;
use Illuminate\Contracts\Validation\Validator;
use App\Career;


class InnerPageController extends Controller
{

    public function index()
    {

        $topics = Topic::orderBy('id', 'desc')->get();

        $options_data = Option::all()->toArray();
        foreach ($options_data as $value) {
            $options[$value['option_key']] = $value['option_value'];
        }

        $teams = Team::where(array('status' => 'publish', 'homepage' => '1'))->orderBy('order', 'ASC')->get();

        $testomonials = Testimonial::where(array('status' => 'publish'))->orderBy('order', 'ASC')->get();
        $feature = Feature::where(array('status' => 'publish', 'homepage' => '1'))->orderBy('order', 'ASC')->get();
        $post1 = Post::get();

        return view('home', compact('options', 'feature', 'post1', 'pages', 'topics', 'teams', 'testomonials'));
    }

    public function get_in_touch(Request $request, Contact $contact)
    {

        // if (empty($request->email)) {
        //     return response()->json([
        //         'error' => '1',
        //         'message' => 'already registered'
        //     ]);
        // }
        $prev = Contact::where('con_email', $request->email)->first();
        if (isset($prev->con_email)) {
            return response()->json([
                'error' => '1',
                'message' => 'your email alredy registered.'
            ]);
        } elseif (empty($request->email)) {
            return response()->json([
                'error' => '1',
                'message' => 'please enter Email.'
            ]);
        }
        // $validator = \Validator::make($request->all(), [
        //     'email' => 'required'
        // ]);
        // echo"here".$request->email; die();
        $contact->con_email = $request->email;
        $contact->con_name = 'sad';
        $contact->con_phone = 'sasd';
        $save = $contact->save();
        if ($save) {
            return response()->json([
                'error' => '0',
                'message' => 'success'
            ]);

        }


        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()->all()]);
        // }
        // return response()->json(['success' => 'Record is successfully added']);

    }

    public function get_our_info_pack(Request $request, Contact $contact)
    {
        if (empty($request->email)) {
            return response()->json([
                'error' => '1',
                'message' => 'please enter Email.'
            ]);
        }
        else if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
            'error' => '1',
            'message' => 'enter a valid email.'
            ]);
        }

        //echo"here".$request->email; die();
        $prev = Contact::where('con_email', $request->email)->first();

        if (isset($prev->con_email)) {
            return response()->json([
                'error' => '1',
                'message' => 'your email alredy registered.'
            ]);
        }


        $contact->con_email = $request->email;
        $contact->con_name = '';
        $contact->con_phone = '';
        $save = $contact->save();
        if ($save) {
            return response()->json([
                'error' => '0',
                'message' => 'Successfully registered.'
            ]);
        }
        return redirect()->route('home.index');
    }


    public function about()
    {
        $options_data = Option::all()->toArray();
        foreach ($options_data as $value) {
            $options[$value['option_key']] = $value['option_value'];
        }

        $page_detail = array();
        $page_title = 'About us';

        $pager = Page::where('id', '1')->get()->first();
        if (!empty($pager)) {
            $page_detail = $pager;
            $page_title = $pager->title;
        }
        $teams = Team::where(array('status' => 'publish', 'homepage' => '1'))->orderBy('order', 'ASC')->get();


        return view('about', compact('page_title', 'options', 'teams', 'page_detail'));
    }

    public function gallery()
    {

        $page_title = 'Gallery';
        $gallery = Gallery::find(1);
        return view('gallery', compact('page_title', 'gallery'));
    }



    public function services()
    {
        $options_data = Option::all()->toArray();
        $page_title = 'Services';

        $feature = Feature::where(array('status' => 'publish'))->orderBy('order', 'ASC')->get();

        $posts = Category::find(3);
        return view('services', compact('page_title', 'options', 'feature', 'posts'));
    }

    public function crs()
    {
        $page_title = 'CSR  ';
        $post1 = Category::find(2);

        return view('crs', compact('page_title', 'post1'));
    }

    public function careers()
    {
        $page_title = 'Careers';
        return view('careers', compact('page_title'));
    }

    public function action2(Request $request, career $career)
    {
        // dd($request);
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:doc,docx,pdf|max:50000',
        ]);

        $fileNameToStore ='';
        if ($request->hasFile('cv')) {
            //echo"here"; exit;
            $file = $request->cv;
            $fileNameWithExt = $request->file('cv')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cv')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $upload_paths = $request->file('cv')->storeAs('files', $fileNameToStore, 'public_upload');
            $upload_path = 'uploads' . '/' . $upload_paths;
        }

        $career->fullname = $request->name;
        $career->email = $request->email;
        $career->phone = $request->phone;
        $career->file_path = $fileNameToStore;
        $career->description = '';
        $career->save();

        if ($validator->fails()) {
            return response()->json(['success'=>'0','msg' => $validator->errors()->all()]);
        }
        return response()->json(['success'=>'1','msg' => 'Your cv is successfully send.']);
    }

    public function contact()
    {
        $page_title = 'Contact Us ';
        return view('contact', compact('page_title'));
    }

    public function career_form(Request $request)
    {
        dd($request);
    }



    public function blog()
    {

        $options_data = Option::all()->toArray();
        foreach ($options_data as $value) {
            $options[$value['option_key']] = $value['option_value'];
        }
        $posts = Post::orderBy('id', 'desc')->paginate(2);
        $recentposts = Post::orderBy('id', 'desc')->take(3)->get();
        $popularposts = Post::orderByRaw('RAND()')->take(3)->get();
        return view('blog', compact('posts', 'recentposts', 'popularposts', 'options'));

    }

    public function posts($slug)
    {

        // $options_data = Option::all()->toArray();
        // foreach ($options_data as $value) {
        //   $options[$value['option_key']] = $value['option_value'];
        // }
        $current_posts = Post::where('slug', $slug)->firstOrFail();
        $page_title = $current_posts->title;;
        //dd($current_posts);
        return view('posts-single', compact('page_title', 'current_posts'));

    }

    public function services_single($slug)
    {

        // $options_data = Option::all()->toArray();
        // foreach ($options_data as $value) {
        //   $options[$value['option_key']] = $value['option_value'];
        // }
        ///echo $slug; exit;
        $posts = Feature::where('slug', $slug)->firstOrFail();
        $page_title = $posts->title;;
        //dd($post);
        return view('services-single', compact('page_title', 'posts'));

    }



    public function blogDetail($slug)
    {

        $recentposts = Post::orderBy('id', 'desc')->take(3)->get();
        $popularposts = Post::orderBy('views', 'desc')->take(3)->get();
        $post = Post::where('slug', $slug)
            ->firstOrFail();
        $blogKey = 'blog_' . $post->id;

        $post->increment('views');

        $options_data = Option::all()->toArray();
        foreach ($options_data as $value) {
            $options[$value['option_key']] = $value['option_value'];
        }



        return view('blogdetail', compact('post', 'recentposts', 'popularposts', 'options'));


    }





}
