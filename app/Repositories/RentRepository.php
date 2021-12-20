<?php

namespace App\Repositories;
use App\Models\RentedCar;


/**
 * RentRepository.
 *
 * @author	Unknown
 * @since	v0.0.1
 * @version	v1.0.0	Monday, December 20th, 2021.
 * @global
 */
class RentRepository
{
    private $model;

    public function __construct(RentedCar $model)
    {
        $this->model = $model;
    }

    /**
     * list cars.
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
     * store rent.
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
     * edit rent.
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
     * update rent.
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
     * delete rent.
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
     * Unavailable Cars.
     *
     * @author	Rafael Cardoso
     * @since	v0.0.1
     * @version	v1.0.0	Monday, December 20th, 2021.
     * @access	public
     * @param	mixed	$date	
     * @return	mixed
     */
    public function unavailableCars($date)
    {
        return $this->model->where('booked_in', $date)
            ->get();
    }

    public function report($data)
    {
        return $this->model->where('car_id', $data['car_id'])->where('booked_in', $data['date'])->get();
    }
}