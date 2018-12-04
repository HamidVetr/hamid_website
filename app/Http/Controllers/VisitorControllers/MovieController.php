<?php

namespace App\Http\Controllers\VisitorControllers;

use App\Helpers\Pagination;
use App\Models\Movie;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|string
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $title = str_replace(' ', '+', htmlspecialchars($input['title']));
        $page = Pagination::validatePage(isset($input['page']) ? $input['page'] : 1);

        $client = new Client();
//        $uri = env('OMDB_API_URL') . "?t=" . $title . "&apikey=" . env('OMDB_API_KEY');
        $uri = env('OMDB_API_URL') . "?s=" . $title . "&page=" . $page . "&apikey=" . env('OMDB_API_KEY');
        $results = json_decode($client->get($uri)->getBody()->getContents(), true);

        return view('home', compact('results'));
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
    public function show($id)
    {
        //
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

    public function addMovieToWatched($imdbId)
    {
        $re = '/[0-9]+/m';
        $client = new Client();
        $uri = env('OMDB_API_URL') . "?i=" . $imdbId . "&apikey=" . env('OMDB_API_KEY');
        $result = json_decode($client->get($uri)->getBody()->getContents(), true);

        if(isset($result['Runtime'])) {
            preg_match_all($re, $result['Runtime'], $matches, PREG_SET_ORDER, 0);
            $runtime = $matches[0][0];
        }else{
            $runtime = 0;
        }

        $movie = Movie::create([
            'imdb_id' => $imdbId,
            'title' => isset($result['Title']) ? $result['Title'] : null,
            'year' => isset($result['Year']) ? $result['Year'] : null,
            'rated' => isset($result['Rated']) ? $result['Rated'] : null,
            'released' => isset($result['Released']) ? $result['Released'] : null,
            'runtime' => $runtime,
            'plot' => isset($result['Plot']) ? $result['Plot'] : null,
            'awards' => isset($result['Awards']) ? $result['Awards'] : null,
            'poster' => isset($result['Poster']) ? $result['Poster'] : null,
            'ratings' => isset($result['Ratings']) ? json_encode($result['Ratings']) : null,
            'meta_score' => isset($result['Metascore']) ? $result['Metascore'] : null,
            'imdb_rating' => isset($result['imdbRating']) ? $result['imdbRating'] : null,
            'imdb_votes' => isset($result['imdbVotes']) ? $result['imdbVotes'] : null,
            'type' => isset($result['Type']) ? $result['Type'] : null,
            'dvd_release_date' => isset($result['DVD']) ? $result['DVD'] : null,
            'box_office' => isset($result['BoxOffice']) ? $result['BoxOffice'] : null,
            'production' => isset($result['Production']) ? $result['Production'] : null,
            'website' => isset($result['Website']) ? $result['Website'] : null,
        ]);

        auth()->user()->movies()->attach($movie->id);

        return redirect(route('home'));
    }
}
