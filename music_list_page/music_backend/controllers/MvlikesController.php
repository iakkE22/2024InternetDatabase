<?php

namespace app\controllers;

use app\models\Mvlikes;
use app\models\MvlikesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MvlikesController implements the CRUD actions for Mvlikes model.
 */
class MvlikesController extends Controller
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
     * Lists all Mvlikes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MvlikesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mvlikes model.
     * @param int $MVID Mvid
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($MVID)
    {
        return $this->render('view', [
            'model' => $this->findModel($MVID),
        ]);
    }

    /**
     * Creates a new Mvlikes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Mvlikes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'MVID' => $model->MVID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Mvlikes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $MVID Mvid
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($MVID)
    {
        $model = $this->findModel($MVID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'MVID' => $model->MVID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Mvlikes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $MVID Mvid
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($MVID)
    {
        $this->findModel($MVID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mvlikes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $MVID Mvid
     * @return Mvlikes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($MVID)
    {
        if (($model = Mvlikes::findOne(['MVID' => $MVID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
