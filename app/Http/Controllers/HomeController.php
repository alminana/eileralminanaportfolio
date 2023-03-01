<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Contact;
use App\Mail\ContactMail;
use App\Models\Information;

use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{

    private $rules = [
        'first_name' => 'required|max:200',
        'last_name' => 'required|max:200',
        'email' => 'required|max:1000',
        'subject' => 'required|max:200',
        'message' => 'required|max:200',

    ];

    public function store(Request $request)
    // {
    //     $data = array();
    //     $data['success'] = 0;
    //     $data['errors'] = [];
    //     $rules = [
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required',
    //         'subject' => 'nullable|min:1|max:50',
    //         'message' => 'required|min:1|max:500'
    //     ];
    //     $validated = Validator::make(request()->all(), $rules);

    //     if($validated->fails())
    //     {

    //         $data['errors']['first_name'] = $validated->errors()->first('first_name');
    //         $data['errors']['last_name'] = $validated->errors()->first('last_name');
    //         $data['errors']['email'] = $validated->errors()->first('email');
    //         $data['errors']['subject'] = $validated->errors()->first('subject');
    //         $data['errors']['message'] = $validated->errors()->first('message');
    //     }
    //     else 
    //     {
    //         $attributes = $validated->validated();
    //         Contact::create($attributes);

    //         Mail::to( env('ADMIN_EMAIL') )->send(new ContactMail(
    //             $attributes['first_name'], 
    //             $attributes['last_name'], 
    //             $attributes['email'], 
    //             $attributes['subject'], 
    //             $attributes['message']
    //         ));
    //         $data['success'] = 1;
    //         $data['message'] = 'Thank you for contacting with us';
    //     }
    //     return view('home');
    // }
    {
        $validated = $request->validate($this->rules);
        $contact = Contact::create($validated);
        $posts = Post::latest()
        ->approved()
        // ->where('approved', 1)
        ->withCount('comments')->paginate(10);

        $recent_posts = Post::latest()->take(5)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        $tags = Tag::latest()->take(50)->get();
        return view('home', [
            'posts' => $posts,
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }


    public function index(Information $information)
    {
        $posts = Post::latest()
        ->approved()
        // ->where('approved', 1)
        ->withCount('comments')->paginate(10);
        
        $information = Information::latest()->take(10)->get();

        $recent_posts = Post::latest()->take(5)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        $tags = Tag::latest()->take(50)->get();

        return view('home', [
            'posts' => $posts,
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags,
            'information' => $information
        ]);
    }
}