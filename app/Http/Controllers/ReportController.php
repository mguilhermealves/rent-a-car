<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarService;
use App\Http\Requests\ReportRequest;
use App\Services\ReportService;

class ReportController extends Controller
{
    protected $service;
    protected $carService;

    public function __construct(CarService $carService, ReportService $service)
    {
        $this->middleware('auth');
        $this->carService = $carService;
        $this->service = $service;
    }

    /**
     * index.
     *
     * @author	Rafael Cardoso
     * @since	v0.0.1
     * @version	v1.0.0	Monday, December 20th, 2021.
     * @access	public
     * @return	mixed
     */
    public function index()
    {   
        return view('home.reports.index')
            ->withCars($this->carService->list());
    }

    /**
     * getData.
     *
     * @author	Rafael Cardoso
     * @since	v0.0.1
     * @version	v1.0.0	Monday, December 20th, 2021.
     * @access	public
     * @param	reportrequest	$request	
     * @return	mixed
     */
    public function getData(ReportRequest $request)
    {
        return view('home.reports.index')
            ->withCars($this->carService->list())
            ->withReport($this->service->report($request));
    }
}
