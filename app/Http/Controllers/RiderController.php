<?php

namespace App\Http\Controllers;

use App\DataTables\RiderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRiderRequest;
use App\Http\Requests\UpdateRiderRequest;
use App\Repositories\RiderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RiderController extends AppBaseController
{
    /** @var  RiderRepository */
    private $riderRepository;

    public function __construct(RiderRepository $riderRepo)
    {
        $this->riderRepository = $riderRepo;
    }

    /**
     * Display a listing of the Rider.
     *
     * @param RiderDataTable $riderDataTable
     * @return Response
     */
    public function index(RiderDataTable $riderDataTable)
    {
        return $riderDataTable->render('riders.index');
    }

    /**
     * Show the form for creating a new Rider.
     *
     * @return Response
     */
    public function create()
    {
        return view('riders.create');
    }

    /**
     * Store a newly created Rider in storage.
     *
     * @param CreateRiderRequest $request
     *
     * @return Response
     */
    public function store(CreateRiderRequest $request)
    {
        $input = $request->all();

        $rider = $this->riderRepository->create($input);

        Flash::success('Rider saved successfully.');

        return redirect(route('riders.index'));
    }

    /**
     * Display the specified Rider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rider = $this->riderRepository->find($id);

        if (empty($rider)) {
            Flash::error('Rider not found');

            return redirect(route('riders.index'));
        }

        return view('riders.show')->with('rider', $rider);
    }

    /**
     * Show the form for editing the specified Rider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rider = $this->riderRepository->find($id);

        if (empty($rider)) {
            Flash::error('Rider not found');

            return redirect(route('riders.index'));
        }

        return view('riders.edit')->with('rider', $rider);
    }

    /**
     * Update the specified Rider in storage.
     *
     * @param  int              $id
     * @param UpdateRiderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRiderRequest $request)
    {
        $rider = $this->riderRepository->find($id);

        if (empty($rider)) {
            Flash::error('Rider not found');

            return redirect(route('riders.index'));
        }

        $rider = $this->riderRepository->update($request->all(), $id);

        Flash::success('Rider updated successfully.');

        return redirect(route('riders.index'));
    }

    /**
     * Remove the specified Rider from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rider = $this->riderRepository->find($id);

        if (empty($rider)) {
            Flash::error('Rider not found');

            return redirect(route('riders.index'));
        }

        $this->riderRepository->delete($id);

        Flash::success('Rider deleted successfully.');

        return redirect(route('riders.index'));
    }
}
