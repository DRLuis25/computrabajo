<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCriterioAPIRequest;
use App\Http\Requests\API\UpdateCriterioAPIRequest;
use App\Models\Criterio;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CriterioController
 * @package App\Http\Controllers\API
 */

class CriterioAPIController extends AppBaseController
{
    /**
     * Display a listing of the Criterio.
     * GET|HEAD /criterios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Criterio::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $criterios = $query->get();

        return $this->sendResponse($criterios->toArray(), 'Criterios retrieved successfully');
    }

    /**
     * Store a newly created Criterio in storage.
     * POST /criterios
     *
     * @param CreateCriterioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCriterioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Criterio $criterio */
        $criterio = Criterio::create($input);

        return $this->sendResponse($criterio->toArray(), 'Criterio saved successfully');
    }

    /**
     * Display the specified Criterio.
     * GET|HEAD /criterios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Criterio $criterio */
        $criterio = Criterio::find($id);

        if (empty($criterio)) {
            return $this->sendError('Criterio not found');
        }

        return $this->sendResponse($criterio->toArray(), 'Criterio retrieved successfully');
    }

    /**
     * Update the specified Criterio in storage.
     * PUT/PATCH /criterios/{id}
     *
     * @param int $id
     * @param UpdateCriterioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCriterioAPIRequest $request)
    {
        /** @var Criterio $criterio */
        $criterio = Criterio::find($id);

        if (empty($criterio)) {
            return $this->sendError('Criterio not found');
        }

        $criterio->fill($request->all());
        $criterio->save();

        return $this->sendResponse($criterio->toArray(), 'Criterio updated successfully');
    }

    /**
     * Remove the specified Criterio from storage.
     * DELETE /criterios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Criterio $criterio */
        $criterio = Criterio::find($id);

        if (empty($criterio)) {
            return $this->sendError('Criterio not found');
        }

        $criterio->delete();

        return $this->sendSuccess('Criterio deleted successfully');
    }
}
