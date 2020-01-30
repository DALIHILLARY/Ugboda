<?php

namespace App\Http\Controllers;

use App\DataTables\BodaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBodaRequest;
use App\Http\Requests\UpdateBodaRequest;
use App\Repositories\BodaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BodaController extends AppBaseController
{
    /** @var  BodaRepository */
    private $bodaRepository;

    public function __construct(BodaRepository $bodaRepo)
    {
        $this->bodaRepository = $bodaRepo;
    }

    /**
     * Display a listing of the Boda.
     *
     * @param BodaDataTable $bodaDataTable
     * @return Response
     */
    public function index(BodaDataTable $bodaDataTable)
    {
        return $bodaDataTable->render('bodas.index');
    }

    /**
     * Show the form for creating a new Boda.
     *
     * @return Response
     */
    public function create()
    {
        return view('bodas.create');
    }

    /**
     * Store a newly created Boda in storage.
     *
     * @param CreateBodaRequest $request
     *
     * @return Response
     */
    public function store(CreateBodaRequest $request)
    {
        $input = $request->all();

           //change all input to capital letters
           $token = array_values($input)[0];
           $input = array_flip($input);
           $input = array_change_key_case($input,CASE_UPPER);
           $input = array_flip($input);
           $input["_token"]= $token;


        $boda = $this->bodaRepository->create($input);

        Flash::success('Boda saved successfully.');

        return redirect(route('bodas.index'));
    }

    /**
     * Display the specified Boda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $boda = $this->bodaRepository->find($id);

        if (empty($boda)) {
            Flash::error('Boda not found');

            return redirect(route('bodas.index'));
        }

        return view('bodas.show')->with('boda', $boda);
    }

    /**
     * Show the form for editing the specified Boda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $boda = $this->bodaRepository->find($id);

        if (empty($boda)) {
            Flash::error('Boda not found');

            return redirect(route('bodas.index'));
        }

        return view('bodas.edit')->with('boda', $boda);
    }

    /**
     * Update the specified Boda in storage.
     *
     * @param  int              $id
     * @param UpdateBodaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBodaRequest $request)
    {
        $boda = $this->bodaRepository->find($id);

        if (empty($boda)) {
            Flash::error('Boda not found');

            return redirect(route('bodas.index'));
        }

        $boda = $this->bodaRepository->update($request->all(), $id);

        Flash::success('Boda updated successfully.');

        return redirect(route('bodas.index'));
    }

    /**
     * Remove the specified Boda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $boda = $this->bodaRepository->find($id);

        if (empty($boda)) {
            Flash::error('Boda not found');

            return redirect(route('bodas.index'));
        }

        $this->bodaRepository->delete($id);

        Flash::success('Boda deleted successfully.');

        return redirect(route('bodas.index'));
    }
}
