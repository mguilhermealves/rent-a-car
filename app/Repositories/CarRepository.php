<?php

namespace App\Repositories;
use App\Models\Car;


/**
 * CarRepository.
 *
 * @author	Unknown
 * @since	v0.0.1
 * @version	v1.0.0	Monday, December 20th, 2021.
 * @global
 */
class CarRepository
{
    private $model;

    public function __construct(Car $model)
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
     * store car.
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
     * edit car.
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
     * update car.
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
     * delete car.
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

    public function filterAvailableCars($arrayIds)
    {
        return $this->model->whereNotIn('id', $arrayIds)->get();
    }

}