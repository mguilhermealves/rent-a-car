<?php

namespace App\Services;
use App\Repositories\CarRepository;


/**
 * CarService.
 *
 * @author	Rafael Cardoso
 * @since	v0.0.1
 * @version	v1.0.0	Sunday, December 19th, 2021.
 * @global
 */


class CarService
{
    private $repository;

    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;

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
    public function list()
    {
        return $this->repository->list();
    }

    /**
     * store car.
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
        return $this->repository->store($request->all());
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
        return $this->repository->edit($id);
    }

    /**
     * update car.
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
        return $this->repository->destroy($id);
    }

}