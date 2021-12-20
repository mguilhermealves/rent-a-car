<?php

namespace App\Repositories;
use App\Models\User;


/**
 * UserRepository.
 *
 * @author	Rafael Cardoso
 * @since	v0.0.1
 * @version	v1.0.0	Monday, December 20th, 2021.
 * @global
 */
class UserRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
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
    public function list()
    {
        return $this->model->all();
    }

    /**
     * store user.
     *
     * @author	Rafael Cardoso
     * @since	v0.0.1
     * @version	v1.0.0	Monday, December 20th, 2021.
     * @access	public
     * @param	mixed	$data	
     * @return	mixed
     */
    public function store($data)
    {
        return $this->model->create($data);
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
        return $this->model->find($id);
    }

    /**
     * update user.
     *
     * @author	Rafael Cardoso
     * @since	v0.0.1
     * @version	v1.0.0	Monday, December 20th, 2021.
     * @access	public
     * @param	mixed	$data	
     * @param	mixed	$id  	
     * @return	mixed
     */
    public function update($data, $id)
    {
        $this->model->find($id)->update($data);
        return $this->model->find($id);
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
        return $this->model->find($id)->delete();
    }

    /**
     * pluck.
     *
     * @author	Rafael Cardoso
     * @since	v0.0.1
     * @version	v1.0.0	Monday, December 20th, 2021.
     * @access	public
     * @return	mixed
     */
    public function pluck()
    {
        return $this->model->pluck('name', 'id');
    }
}