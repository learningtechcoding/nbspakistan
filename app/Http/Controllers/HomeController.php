<?php

namespace App\Http\Controllers;

use App\Models\CentralCabinet;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Leadership;
use App\Models\News;
use App\Models\Slide;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    private $wings_data = [
        'membership-and-notifications' => [
            'Associated Wings - Membership & Notifications',
            "In any organization, documentation is retained records of appointment and organization actions and events as required by legal mandates and organization policy. The best HR practices involve maintaining both formal and informal records about each member of the organization.<br />
            Notification &   Membership Authority is a team that handles all types of documentation work, maintains records, and issues membership notifications or policy letters for the organization. ",
        ],
        'advisory-board' => [
            'Associated Wings - Advisory Board',
            'An advisory board is a body that provides non-binding strategic advice to the management of an organization, The informal nature of an advisory board gives greater flexibility in structure and management compared to the all other respective domains and central cabinets as well.',
        ],
        'universities-council' => [
            'Associated Wings - Universities Council',
            "State Youth Parliament Universities Council is formed with an aim to gather the students (schools, colleges, universities) of Pakistan at a platform giving them an opportunity to come forward and take a stand for the dignity of their motherland & religion Islam. There is a number of institutes in which hundreds of students and represent SYP at every platform & express their views, motivating other students to join and play their role in this noble cause. Whether it is any conference, simple event, any protest, or rally these students are at the front line to defend the ideology of Pakistan and Islam.
            <br /> \"Welcoming all the amazing minds and the passionate souls to join this platform and represent their institutes  in all the best possible ways.\"",
        ],
        'speaker-forum' => [
            "Associated Wings - Speaker's Forum",
            "Speaker Forum is a place where a motivational speaker delivers speeches with the intention of motivating or inspiring people in the audience. A motivational speaker who delivers speeches designed to inspire and motivate people in the audience. Also known as \"inspirational speakers,\" these individuals are gifted in the art of persuasion. Speaker Forum positively presents their ideas and encourage others to follow their way of thinking.",
        ],
        'literature-forum' => [
            'Associated Wings - Literature Forum',
            'The Literary Forum is a platform for writers, poets, philosophers, and artists across cultures and languages to celebrate creativity, beauty, and harmony in all forms and expressions. Members of the forum motivate the public to Islamic ideology and boundaries through their writings and philosophy as well. ',
        ],
        'women-wing' => [
            'Associated Wings - Women Wing',
            "Empowering women is essential to the social development of societies, communities, and nations. When women are contribute their skills to the workforce and can make them strong and effective societies and help in building the moral character of the coming generation.
            <br /> Women Wing in the State Youth Parliament covey and motivate the other females to understand the theory of ideology, that can help them to raise the new generation to Islamic Laws. ",
        ],
        'lawyer-forum' => [
            'Associated Wings - s Forum',
            "In organization legal issues are important to handle through the proper channels keeping the laws of the state in consideration. Deal with state or any other governmental issues is managed by the organizational lawyers. 
            <br /> State Youth Parliament has a lawyer wing in every City, tehsil, district, province Level as well. ",
        ],
    ];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slides = Slide::all();
        $news = News::orderBy('date', 'desc')
            ->limit(3)
            ->get();
        $galleries = Gallery::latest()
            ->limit(6)
            ->get();
        return view('home', [
            'slides' => $slides,
            'news' => $news,
            'galleries' => $galleries,
        ]);
    }

    public function centralCabinets()
    {
        $cc = CentralCabinet::where('cabinets_type', 'cc')->get();
        $coc = CentralCabinet::where('cabinets_type', 'coc')->get();
        return view('central-cabinets', ['cc' => $cc, 'coc' => $coc]);
    }
    public function associatedWings()
    {
        return view('associated-wings');
    }
    public function leadership()
    {
        return view('leadership');
    }
    public function leaderships($main, $submain)
    {
        $data = Leadership::where(
            'leadership_province_subtype',
            $submain
        )->get();
        return view('leadership-detail', [
            'submain' => $submain,
            'data' => $data,
        ]);
    }
    public function newsEvents()
    {
        $news = News::latest()->get();
        return view('news-events', ['news' => $news]);
    }
    public function newsEvent($id)
    {
        $news = News::findOrFail($id);
        return view('detail.news', ['news' => $news]);
    }

    public function homeGallery()
    {
        $galleries = Gallery::latest()->get();
        return view('home', ['galleries' => $galleries]);
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        return view('gallery', ['galleries' => $galleries]);
    }

    public function wings($slug)
    {
        if (key_exists($slug, $this->wings_data)) {
            return view('wing', [
                'title' => $this->wings_data[$slug][0],
                'data' => $this->wings_data[$slug][1],
            ]);
        } else {
            return redirect('/associated-wings');
        }
    }

    public function about()
    {
        $about = Storage::get('/private/about-page.txt');
        return view('about', ['about' => $about]);
    }
    public function privacy()
    {
        $name = 'SYP Privacy Policy';
        $privacy = Storage::get('/private/privacy-page.txt');
        return view('page', ['data' => $privacy, 'name' => $name]);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required'],
        ]);
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->save();
        return redirect()
            ->back()
            ->with(
                'success',
                'We recieve your query and try to contact with you soon on email you provided in contact form. Thanks!'
            );
    }

    public function trackSecretariat(Request $request)
    {
        return view('secretariat');
    }
}
