<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Services\CarService;

/**
 * CarController.
 *
 * @author	Rafael Cardoso
 * @since	v0.0.1
 * @version	v1.0.0	Monday, December 20th, 2021.
 * @see		Controller
 * @global
 */
class CarController extends Controller
{ 

   protected $service; 

   public function __construct(CarService $service)
   {
        $this->middleware('auth');
       $this->service = $service;
   } 

   /**
    * list cars.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Sunday, December 19th, 2021.
    * @access	public
    * @return	mixed
    */
   public function index()
   {
        return view('home.cars.index');
   }

   public function list(){
        return $this->service->list()->toJson();
    }

   /**
    * create car.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Sunday, December 19th, 2021.
    * @access	public
    * @return	mixed
    */
   public function create()
   {
       return view('home.cars.create');
   }

   /**
    * store car.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Sunday, December 19th, 2021.
    * @access	public
    * @param	carrequest	$request	
    * @return	mixed
    */
   public function store(CarRequest $request)
   {
       return redirect()->route('cars.edit', $this->service->store($request))
           ->with('success', 'Registro criado com sucesso');
   }

   /**
    * return method list.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Monday, December 20th, 2021.
    * @access	public
    * @return	mixed
    */
    public function show()
    {
        return $this->list();
    }


   /**
    * edit car.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Sunday, December 19th, 2021.
    * @access	public
    * @param	mixed	$id	
    * @return	mixed
    */
   public function edit($id)
   {
       return view('home.cars.edit')
            ->withCar($this->service->edit($id));
   }

   /**
    * update car.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Sunday, December 19th, 2021.
    * @access	public
    * @param	carrequest	$request	
    * @param	mixed     	$id     	
    * @return	mixed
    */
   public function update(CarRequest $request, $id)
   {
       return redirect()->route('cars.edit',  $this->service->update($request, $id))
            ->with('success', 'Registro atualizado com sucesso');
   }

   /**
    * delete car.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Sunday, December 19th, 2021.
    * @access	public
    * @param	mixed	$id	
    * @return	mixed
    */
   public function destroy($id)
   {
       $this->service->destroy($id);
       return redirect()->route('cars.index')
            ->with('success', 'Registro Apagado com Sucesso');
   }
}
