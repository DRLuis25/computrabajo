<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioAPIRequest;
use App\Http\Requests\API\UpdateAnuncioAPIRequest;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AnuncioController
 * @package App\Http\Controllers\API
 */

class AnuncioAPIController extends AppBaseController
{
    /**
     * Display a listing of the Anuncio.
     * GET|HEAD /anuncios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Anuncio::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $anuncios = $query->get();

        return $this->sendResponse($anuncios->toArray(), 'Anuncios retrieved successfully');
    }

    /**
     * Store a newly created Anuncio in storage.
     * POST /anuncios
     *
     * @param CreateAnuncioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Anuncio $anuncio */
        $anuncio = Anuncio::create($input);

        return $this->sendResponse($anuncio->toArray(), 'Anuncio saved successfully');
    }

    /**
     * Display the specified Anuncio.
     * GET|HEAD /anuncios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Anuncio $anuncio */
        $anuncio = Anuncio::find($id);

        if (empty($anuncio)) {
            return $this->sendError('Anuncio not found');
        }

        return $this->sendResponse($anuncio->toArray(), 'Anuncio retrieved successfully');
    }

    /**
     * Update the specified Anuncio in storage.
     * PUT/PATCH /anuncios/{id}
     *
     * @param int $id
     * @param UpdateAnuncioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioAPIRequest $request)
    {
        /** @var Anuncio $anuncio */
        $anuncio = Anuncio::find($id);

        if (empty($anuncio)) {
            return $this->sendError('Anuncio not found');
        }

        $anuncio->fill($request->all());
        $anuncio->save();

        return $this->sendResponse($anuncio->toArray(), 'Anuncio updated successfully');
    }

    /**
     * Remove the specified Anuncio from storage.
     * DELETE /anuncios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Anuncio $anuncio */
        $anuncio = Anuncio::find($id);

        if (empty($anuncio)) {
            return $this->sendError('Anuncio not found');
        }

        $anuncio->delete();

        return $this->sendSuccess('Anuncio deleted successfully');
    }
}
