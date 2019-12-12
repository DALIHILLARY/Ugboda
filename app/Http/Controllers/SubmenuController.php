<?php

namespace App\Http\Controllers;

use App\DataTables\SubmenuDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSubmenuRequest;
use App\Http\Requests\UpdateSubmenuRequest;
use App\Repositories\SubmenuRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SubmenuController extends AppBaseController
{
    /** @var  SubmenuRepository */
    private $submenuRepository;

    public function __construct(SubmenuRepository $submenuRepo)
    {
        $this->submenuRepository = $submenuRepo;
    }

    /**
     * Display a listing of the Submenu.
     *
     * @param SubmenuDataTable $submenuDataTable
     * @return Response
     */
    public function index(SubmenuDataTable $submenuDataTable)
    {
        return $submenuDataTable->render('submenus.index');
    }

    /**
     * Show the form for creating a new Submenu.
     *
     * @return Response
     */
    public function create()
    {
        return view('submenus.create');
    }

    /**
     * Store a newly created Submenu in storage.
     *
     * @param CreateSubmenuRequest $request
     *
     * @return Response
     */
    public function store(CreateSubmenuRequest $request)
    {
        $input = $request->all();

        $submenu = $this->submenuRepository->create($input);

        Flash::success('Submenu saved successfully.');

        return redirect(route('submenus.index'));
    }

    /**
     * Display the specified Submenu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $submenu = $this->submenuRepository->find($id);

        if (empty($submenu)) {
            Flash::error('Submenu not found');

            return redirect(route('submenus.index'));
        }

        return view('submenus.show')->with('submenu', $submenu);
    }

    /**
     * Show the form for editing the specified Submenu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $submenu = $this->submenuRepository->find($id);

        if (empty($submenu)) {
            Flash::error('Submenu not found');

            return redirect(route('submenus.index'));
        }

        return view('submenus.edit')->with('submenu', $submenu);
    }

    /**
     * Update the specified Submenu in storage.
     *
     * @param  int              $id
     * @param UpdateSubmenuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubmenuRequest $request)
    {
        $submenu = $this->submenuRepository->find($id);

        if (empty($submenu)) {
            Flash::error('Submenu not found');

            return redirect(route('submenus.index'));
        }

        $submenu = $this->submenuRepository->update($request->all(), $id);

        Flash::success('Submenu updated successfully.');

        return redirect(route('submenus.index'));
    }

    /**
     * Remove the specified Submenu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $submenu = $this->submenuRepository->find($id);

        if (empty($submenu)) {
            Flash::error('Submenu not found');

            return redirect(route('submenus.index'));
        }

        $this->submenuRepository->delete($id);

        Flash::success('Submenu deleted successfully.');

        return redirect(route('submenus.index'));
    }
}
