<?php

namespace app\controllers;

use app\models\Developers;
use app\models\DevelopersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DevelopersController implements the CRUD actions for Developers model.
 */
class DevelopersController extends Controller
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
     * Lists all Developers models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DevelopersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Developers model.
     * @param int $DeveloperID Developer ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($DeveloperID)
    {
        return $this->render('view', [
            'model' => $this->findModel($DeveloperID),
        ]);
    }

    /**
     * Creates a new Developers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Developers();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'DeveloperID' => $model->DeveloperID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Developers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $DeveloperID Developer ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($DeveloperID)
    {
        $model = $this->findModel($DeveloperID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'DeveloperID' => $model->DeveloperID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Developers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $DeveloperID Developer ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($DeveloperID)
    {
        $this->findModel($DeveloperID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Developers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $DeveloperID Developer ID
     * @return Developers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($DeveloperID)
    {
        if (($model = Developers::findOne(['DeveloperID' => $DeveloperID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
