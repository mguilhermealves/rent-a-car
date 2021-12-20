<?php

namespace App\Services;
use App\Repositories\RentRepository;


/**
 * CarService.
 *
 * @author	Rafael Cardoso
 * @since	v0.0.1
 * @version	v1.0.0	Sunday, December 19th, 2021.
 * @global
 */


class ReportService
{
    private $repository;

    public function __construct(RentRepository $repository)
    {
        $this->repository = $repository;

    }

    public function report($request)
    {
        return $this->repository->report($request->all());
    }

}