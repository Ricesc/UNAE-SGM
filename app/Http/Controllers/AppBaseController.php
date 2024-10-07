<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response as FacadesResponse;
use InfyOm\Generator\Utils\ResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return FacadesResponse::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return FacadesResponse::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return FacadesResponse::json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
