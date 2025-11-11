<?php

namespace App\Http\Controllers;

use App\Models\webcms;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class WebcmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hero Carousel
        $spotlights = webcms::where('section', 'spotlight')->orderBy('created_at', 'desc')->get();
        // Get the latest event (main event)
        $mainEvent = webcms::where('section', 'events')
            ->orderBy('created_at', 'desc')
            ->first();

        // Get the next 4 latest events (excluding the main one)
        $smallEvents = webcms::where('section', 'events')
            ->orderBy('created_at', 'desc')
            ->skip(1)
            ->take(4)
            ->get();

        $news = webcms::where('section', 'News')
                        ->orderBy('created_at', 'desc')
                        ->take(4)
                        ->get();

        $announcements = webcms::where('section', 'Announcements')
                        ->orderBy('created_at', 'desc')
                        ->take(4)
                        ->get();

        return view('landing_page.index', compact('mainEvent', 'smallEvents', 'spotlights', 'news', 'announcements'));
    }
     public function view()
    {
        $webcmsPosts = Webcms::with('user')->latest()->get();
         return view('webcms.view', compact('webcmsPosts'));

    }

    public function about()
    {
        return view('about');
    }

    public function missionvision()
    {
        return view('missionvision');
    }

    public function history()
    {
        return view('history');
    }

    public function admissions_requirements()
    {
        return view('Admission.admissions-requirements');
    }

    public function newsAndEventsView(Request $request){
        $news = webcms::where('section', 'News')
                        ->orderBy('created_at', 'desc')
                        ->get();

        $month = $request->query('month', Carbon::now()->month);
        $year = $request->query('year', Carbon::now()->year);

        $currentDate = Carbon::create($year, $month, 1);

        $events = webcms::where('section', 'events')
            ->whereYear('posted_at', $year)
            ->whereMonth('posted_at', $month)
            ->orderBy('posted_at', 'asc')
            ->get();


        return view('News_and_Events.news_and_events_view', compact('news', 'events', 'currentDate'));
    }

    public function events(Request $request)
    {
        $month = $request->query('month', Carbon::now()->month);
        $year = $request->query('year', Carbon::now()->year);

        $currentDate = Carbon::create($year, $month, 1);

        $events = webcms::where('section', 'events')
            ->whereYear('posted_at', $year)
            ->whereMonth('posted_at', $month)
            ->orderBy('posted_at', 'asc')
            ->get();

        return view('News_and_Events.events', compact('events', 'currentDate'));
    }

    public function showEvent($id)
    {
        $show_event = webcms::find($id);
        return view('News_and_events.show_event', compact('show_event'));
    }

    public function news()
    {
        $news = webcms::where('section', 'News')
                        ->orderBy('created_at', 'desc')
                        ->get();

        $announcements = webcms::where('section', 'Announcements')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('News_and_events.news', compact('news', 'announcements'));
    }

    public function showNews_and_announcements($id)
    {
        $show_news_and_announcement = webcms::findOrFail($id);

        // Get other news except the current one
        $other_news = webcms::where('section', 'news')
            ->where('id', '!=', $id)
            ->orderBy('created_at', 'desc')
            ->take(3) // change number if you want more
            ->get();

        return view('News_and_events.show_news_and_announcement', compact('show_news_and_announcement', 'other_news'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('webcms.create');
    }


    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $validated = $request->validate([
        'posted_at' => 'required|date',
        'section' => 'required|string|max:191',
        'tag' => 'required|string|max:191',
        'title' => 'required|string',
        'featured' => 'required|string',
        'body' => 'required|string',
        'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        'is_published' => 'required|boolean',
    ]);

    $path = $request->file('cover_image')->store('public/webcms');

    Webcms::create([
        'user_id' => auth()->id(),
        'is_published' => $request->is_published,
        'section' => $request->section,
        'tag' => $request->tag,
        'title' => $request->title,
        'featured' => $request->featured,
        'body' => $request->body,
        'cover_image' => basename($path),
        'slug' => \Illuminate\Support\Str::slug($request->title),
        'posted_at' => $request->posted_at,
    ]);

    return redirect()->route('webcms.view')->with('success', 'Post created successfully!');
}


    /**
     * Display the specified resource.
     */

    public function show(webcms $webcms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $webcms = Webcms::findOrFail($id);
    return view('webcms.edit', compact('webcms'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'posted_at' => 'required|date',
        'section' => 'required|string|max:191',
        'tag' => 'required|string|max:191',
        'title' => 'required|string',
        'featured' => 'required|string',
        'body' => 'required|string',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'is_published' => 'required|boolean',
    ]);

    $webcms = Webcms::findOrFail($id);

    if ($request->hasFile('cover_image')) {
        $path = $request->file('cover_image')->store('public/webcms');
        $webcms->cover_image = basename($path);
    }

    $webcms->update([
        'posted_at' => $request->posted_at,
        'section' => $request->section,
        'tag' => $request->tag,
        'title' => $request->title,
        'featured' => $request->featured,
        'body' => $request->body,
        'is_published' => $request->is_published,
        'slug' => Str::slug($request->title),
    ]);

    return redirect()->route('webcms.view')->with('success', 'Post updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    try {
        $webcms = Webcms::findOrFail($id);

        // Delete the cover image if it exists
        if ($webcms->cover_image && Storage::exists('public/webcms/' . $webcms->cover_image)) {
            Storage::delete('public/webcms/' . $webcms->cover_image);
        }

        // Delete the database record
        $webcms->delete();

        return redirect()->route('webcms.view')->with('success', 'Post deleted successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Error deleting post: ' . $e->getMessage());
    }
}

}
