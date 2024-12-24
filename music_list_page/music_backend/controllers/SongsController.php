<?php
/**
 * Team: Chillguys
 * Coding by Luojin 2213912,20241220
 * Auto generated
 */
namespace app\controllers;

use app\models\Songs;
use app\models\SongsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SongsController implements the CRUD actions for Songs model.
 */
class SongsController extends Controller
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
     * Lists all Songs models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SongsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Songs model.
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
     * Creates a new Songs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Songs();

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
     * Updates an existing Songs model.
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
     * Deletes an existing Songs model.
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
     * Finds the Songs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $SongID Song ID
     * @return Songs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($SongID)
    {
        if (($model = Songs::findOne(['SongID' => $SongID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
