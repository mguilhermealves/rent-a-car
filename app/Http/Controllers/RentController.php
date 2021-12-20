<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RentRequest;
use App\Services\RentService;
use App\Services\UserService;

/**
 * RentController.
 *
 * @author	Rafael Cardoso
 * @since	v0.0.1
 * @version	v1.0.0	Monday, December 20th, 2021.
 * @see		Controller
 * @global
 */
class RentController extends Controller
{ 

   protected $service; 
   protected $userService;

   public function __construct(RentService $service, UserService $userService)
   {
        $this->middleware('auth');
       $this->service = $service;
       $this->userService = $userService;
   } 

   /**
    * list rents.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Sunday, December 19th, 2021.
    * @access	public
    * @return	mixed
    */
   public function index()
   {
        return view('home.rents.index')
            ->withRents($this->service->list());
   }

   /**
    * list.
    *
    * @author	Unknown
    * @since	v0.0.1
    * @version	v1.0.0	Monday, December 20th, 2021.
    * @access	public
    * @return	mixed
    */
   public function list(){
        return $this->service->list()->toJson();
    }

   /**
    * create rent.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Sunday, December 19th, 2021.
    * @access	public
    * @return	mixed
    */
   public function create()
   {
       return view('home.rents.create')
        ->withUsers($this->userService->pluck());
   }

   /**
    * store rent.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Sunday, December 19th, 2021.
    * @access	public
    * @param	RentRequest	$request	
    * @return	mixed
    */
   public function store(RentRequest $request)
   {
       return redirect()->route('rents.edit', $this->service->store($request))
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
    * edit rent.
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
       return view('home.rents.edit')
            ->withRent($this->service->edit($id))
            ->withUsers($this->userService->pluck());
   }

   /**
    * update rent.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Sunday, December 19th, 2021.
    * @access	public
    * @param	RentRequest	$request	
    * @param	mixed     	$id     	
    * @return	mixed
    */
   public function update(RentRequest $request, $id)
   {
       return redirect()->route('rents.edit',  $this->service->update($request, $id))
            ->with('success', 'Registro atualizado com sucesso');
   }

   /**
    * delete rent.
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
       return redirect()->route('rents.index')
            ->with('success', 'Registro Apagado com Sucesso');
   }

   /**
    * Available Cars.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Monday, December 20th, 2021.
    * @access	public
    * @param	request	$request	
    * @return	mixed
    */
   public function availableCars(Request $request)
   {
        return $this->service->availableCars($request->date)->toJson();
   }
}
