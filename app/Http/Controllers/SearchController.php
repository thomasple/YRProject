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
        $artisans_services = $this->searchRepository->index();
        //$links = str_replace('/?', '?', $artisans_services->render());
        //return view('client/result', compact('artisans_services'));//, 'links'));

// Get the current page from the url if it's not set default to 1
        $page = Input::get('page', 1);

// Number of items per page
        $perPage = 10;

// Start displaying items from this number;
        $offSet = ($page * $perPage) - $perPage; // Start displaying items from this number

// Get only the items you need using array_slice (only get 10 items since that's what you need)
        $itemsForCurrentPage = array_slice($artisans_services, $offSet, $perPage, true);

// Return the paginator with only 10 items but with the count of all items and set the it on the correct page
        $artisans_services= new LengthAwarePaginator($itemsForCurrentPage, count($artisans_services), $perPage, $page);
        return view('client/result',compact('artisans_services'));
    }
}