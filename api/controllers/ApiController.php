<?php

namespace api\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0.0",
 *         title="TMP API"
 *     )
 * )
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="basic",
 *     securityScheme="httpBasic"
 * )
 * @OA\SecurityScheme(
 *     type="oauth2",
 *     securityScheme="main",
 *     @OA\Flow(
 *         flow="password",
 *         tokenUrl="/oauth2/token",
 *         refreshUrl="/oauth2/refresh",
 *         scopes={
 *         }
 *     )
 * )
 */
class ApiController extends Controller
{

    public function actionDoc()
    {
        $directories = [
            Yii::getAlias('@api/controllers'),
//            Yii::getAlias('@api/forms'),
//            Yii::getAlias('@api/templates'),
        ];
        $openApi = \OpenApi\Generator::scan($directories);
        Yii::$app->getResponse()->format = Response::FORMAT_JSON;
        Yii::$app->getResponse()->content = $openApi->toJson();
    }

    /**
     * @OA\Get(
     *     path="/api/resource.json",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
