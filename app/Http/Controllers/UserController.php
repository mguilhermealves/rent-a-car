<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

/**
 * UserController.
 *
 * @author	Rafael Cardoso
 * @since	v0.0.1
 * @version	v1.0.0	Monday, December 20th, 2021.
 * @see		Controller
 * @global
 */
class UserController extends Controller
{ 

   protected $service; 

   public function __construct(UserService $service)
   {
        $this->middleware('auth');
       $this->service = $service;
   } 

   /**
    * list users.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Monday, December 20th, 2021.
    * @access	public
    * @return	mixed
    */
   public function index()
   {
       return view('home.users.index');
   }


   /**
    * list.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Monday, December 20th, 2021.
    * @access	public
    * @return	mixed
    */
   public function list(){
       return $this->service->list();
   }

   /**
    * create user.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Monday, December 20th, 2021.
    * @access	public
    * @return	mixed
    */
   public function create()
   {
       return view('home.users.create');
   }

   /**
    * store user.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Monday, December 20th, 2021.
    * @access	public
    * @param	userrequest	$request	
    * @return	mixed
    */
   public function store(UserRequest $request)
   {
       return redirect()->route('users.edit', $this->service->store($request))
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
    * edit user.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Monday, December 20th, 2021.
    * @access	public
    * @param	mixed	$id	
    * @return	mixed
    */
   public function edit($id)
   {
       return view('home.users.edit')
            ->withUser($this->service->edit($id));
   }


   /**
    * update user.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Monday, December 20th, 2021.
    * @access	public
    * @param	userrequest	$request	
    * @param	mixed      	$id     	
    * @return	mixed
    */
   public function update(UserRequest $request, $id)
   {
       return redirect()->route('users.edit',  $this->service->update($request, $id))
            ->with('success', 'Registro atualizado com sucesso');
   }

   /**
    * delete user.
    *
    * @author	Rafael Cardoso
    * @since	v0.0.1
    * @version	v1.0.0	Monday, December 20th, 2021.
    * @access	public
    * @param	mixed	$id	
    * @return	mixed
    */
   public function destroy($id)
   {
       $this->service->destroy($id);
       return redirect()->route('users.index')
            ->with('success', 'Registro Apagado com Sucesso');
   }
}
