<?php
namespace App\Http\Controllers;
use App\Http\Requests\SearchRequest;
use App\Repositories\SearchRepository;
use Input;
use Illuminate\Pagination\LengthAwarePaginator;
class SearchController extends Controller
{
    protected $searchRepository;
    protected $nbrPerPage=10;
    public function  __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository=$searchRepository;
    }
    public function getForm()
    {
        return view('client/search');
    }
    public function postForm(SearchRequest $request)
    {
        $this->searchRepository->service=$request['service'];
        $this->searchRepository->sex=$request['sex'];
        $this->searchRepository->first_name=$request['first_name'];
        $this->searchRepository->last_name=$request['last_name'];
        $this->searchRepository->specialty=$request['specialty'];
        $this->searchRepository->salon=$request['salon'];
        $this->searchRepository->date=$request['date'];
        $this->searchRepository->beginning=$request['beginning'];
        $this->searchRepository->end=$request['end'];
        $artisans = $this->searchRepository->index();
        //$links = str_replace('/?', '?', $artisans_services->render());
        //return view('client/result', compact('artisans_services'));//, 'links'));
        return view('client/result',compact('artisans'));
    }
    public function show($id)
    {
        $artisan = $this->searchRepository->getById($id);

        return view('client/showArtisan', compact('artisan'));
    }
}