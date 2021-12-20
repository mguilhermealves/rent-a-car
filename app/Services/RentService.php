<?php

namespace App\Services;
use App\Repositories\RentRepository;
use App\Repositories\CarRepository;
use App\Events\StoreLogUser;

/**
 * CarService.
 *
 * @author	Rafael Cardoso
 * @since	v0.0.1
 * @version	v1.0.0	Sunday, December 19th, 2021.
 * @global
 */


class RentService
{
    private $repository;
    private $carRepository;

    public function __construct(RentRepository $repository, CarRepository $carRepository)
    {
        $this->repository = $repository;
        $this->carRepository = $carRepository;

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
    public function list()
    {
        return $this->repository->list();
    }

    /**
     * store rent.
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
        $rented = $this->repository->store($request->all());
        StoreLogUser::dispatch($rented);
        return $rented;
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
        return $this->repository->edit($id);
    }

    /**
     * update rent.
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
        return $this->repository->destroy($id);
    }

    public function availableCars($date)
    {
        $unavailables = $this->repository->unavailableCars($date);
        $result = [];

        foreach($unavailables as $unavailable){
            $result[] = $unavailable->id;
        }
        return count($result) ? $this->carRepository->filterAvailableCars($result) : $this->carRepository->list();
    }


}