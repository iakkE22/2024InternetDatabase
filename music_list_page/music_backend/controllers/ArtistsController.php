<?php

/**
 * Team: Chillguys
 * Coding by Luojin 2213912,20241220
 * Auto generated
 */

namespace app\controllers;

use app\models\Artists;
use app\models\ArtistsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArtistsController implements the CRUD actions for Artists model.
 */
class ArtistsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Artists models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArtistsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Artists model.
     * @param int $ArtistID Artist ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ArtistID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ArtistID),
        ]);
    }

    /**
     * Creates a new Artists model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Artists();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ArtistID' => $model->ArtistID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Artists model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ArtistID Artist ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ArtistID)
    {
        $model = $this->findModel($ArtistID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ArtistID' => $model->ArtistID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Artists model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ArtistID Artist ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ArtistID)
    {
        $this->findModel($ArtistID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Artists model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ArtistID Artist ID
     * @return Artists the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ArtistID)
    {
        if (($model = Artists::findOne(['ArtistID' => $ArtistID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
