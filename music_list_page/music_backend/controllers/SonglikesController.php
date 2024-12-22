<?php

namespace app\controllers;

use app\models\Songlikes;
use app\models\SonglikesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SonglikesController implements the CRUD actions for Songlikes model.
 */
class SonglikesController extends Controller
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
     * Lists all Songlikes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SonglikesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Songlikes model.
     * @param int $SongID Song ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($SongID)
    {
        return $this->render('view', [
            'model' => $this->findModel($SongID),
        ]);
    }

    /**
     * Creates a new Songlikes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Songlikes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'SongID' => $model->SongID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Songlikes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $SongID Song ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($SongID)
    {
        $model = $this->findModel($SongID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'SongID' => $model->SongID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Songlikes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $SongID Song ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($SongID)
    {
        $this->findModel($SongID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Songlikes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $SongID Song ID
     * @return Songlikes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($SongID)
    {
        if (($model = Songlikes::findOne(['SongID' => $SongID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
