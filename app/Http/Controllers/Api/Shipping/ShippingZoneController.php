<?php
namespace GetCandy\Http\Controllers\Api\Shipping;

use GetCandy\Http\Controllers\Api\BaseController;
use GetCandy\Http\Requests\Api\Shipping\Zones\CreateRequest;
use GetCandy\Http\Requests\Api\Shipping\Zones\UpdateRequest;
use GetCandy\Http\Transformers\Fractal\Shipping\ShippingZoneTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShippingZoneController extends BaseController
{
    /**
     * Returns a listing of channels
     * @return Json
     */
    public function index(Request $request)
    {
        $orders = app('api')->shippingZones()->getPaginatedData($request->per_page, $request->page);
        return $this->respondWithCollection($orders, new ShippingZoneTransformer);
    }

    /**
     * Handles the request to show a channel based on it's hashed ID
     * @param  String $id
     * @return Json
     */
    public function show($id)
    {
        try {
            $channel = app('api')->shippingZones()->getByHashedId($id);
        } catch (ModelNotFoundException $e) {
            return $this->errorNotFound();
        }
        return $this->respondWithItem($channel, new ShippingZoneTransformer);
    }

    /**
     * Handles the request to create a new channel
     * @param  CreateRequest $request
     * @return Json
     */
    public function store(CreateRequest $request)
    {
        $result = app('api')->shippingZones()->create($request->all());
        return $this->respondWithItem($result, new ShippingZoneTransformer);
    }

    public function update($id, UpdateRequest $request)
    {
        try {
            $result = app('api')->shippingZones()->update($id, $request->all());
        } catch (NotFoundHttpException $e) {
            return $this->errorNotFound();
        }
        return $this->respondWithItem($result, new ShippingZoneTransformer);
    }
}
