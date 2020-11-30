<?php


namespace App\services;


use App\repositories\ReportingRepository;

class ReportingService
{
    /**
     * @var ReportingRepository
     */
    private $reportingRepository;

    /**
     * ReportingService constructor.
     * @param ReportingRepository $reportingRepository
     */
    public function __construct(ReportingRepository $reportingRepository)
    {
        $this->reportingRepository = $reportingRepository;
    }

    /**
     * @return \App\Models\PeopleAPI[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getHomeWorld()
    {
        return $this->reportingRepository->getHomeWorld();
    }

    /**
     * @param null $report
     * @return mixed
     */
    public function search($report = null)
    {
        return $this->reportingRepository->search($report);
    }
}