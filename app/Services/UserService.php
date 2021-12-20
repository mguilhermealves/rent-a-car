<?php

namespace App\Services;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * UserService.
 *
 * @author	Rafael Cardoso
 * @since	v0.0.1
 * @version	v1.0.0	Sunday, December 19th, 2021.
 * @global
 */


class UserService
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * list users.
     *
     * @author	Rafael Cardoso
     * @since	v0.0.1
     * @version	v1.0.0	Sunday, December 19th, 2021.
     * @access	public
     * @return	mixed
     */
    public function list()
    {
        return $this->repository->list()->toJson();
    }

    /**
     * store user.
     *
     * @author	Rafael Cardoso
     * @since	v0.0.1
     * @version	v1.0.0	Sunday, December 19th, 2021.
     * @access	public
     * @param	mixed	$request	
     * @return	mixed
     */

    public function store($request)
    {
        if(isset($request->password) || is_null($request->password)){
            $password = Str::random(10);
            $request{'password'} = Hash::make($password);
        }
        return $this->repository->store($request->all());
    }

    /**
     * edit user.
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
        return $this->repository->edit($id);
    }

    /**
     * update user.
     *
     * @author	Rafael Cardoso
     * @since	v0.0.1
     * @version	v1.0.0	Sunday, December 19th, 2021.
     * @access	public
     * @param	mixed	$request	
     * @param	mixed	$id     	
     * @return	mixed
     */
    public function update($request, $id)
    {
        return $this->repository->update($request->all(), $id);
    }

    /**
     * delete user.
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
        return $this->repository->destroy($id);
    }

    public function pluck()
    {
        return $this->repository->pluck();
    }
}