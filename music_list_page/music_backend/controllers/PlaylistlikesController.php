<?php

namespace app\controllers;

use app\models\Playlistlikes;
use app\models\PlaylistlikesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlaylistlikesController implements the CRUD actions for Playlistlikes model.
 */
class PlaylistlikesController extends Controller
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
     * Lists all Playlistlikes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlaylistlikesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Playlistlikes model.
     * @param int $PlaylistID Playlist ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($PlaylistID)
    {
        return $this->render('view', [
            'model' => $this->findModel($PlaylistID),
        ]);
    }

    /**
     * Creates a new Playlistlikes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Playlistlikes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'PlaylistID' => $model->PlaylistID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Playlistlikes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $PlaylistID Playlist ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($PlaylistID)
    {
        $model = $this->findModel($PlaylistID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'PlaylistID' => $model->PlaylistID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Playlistlikes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $PlaylistID Playlist ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($PlaylistID)
    {
        $this->findModel($PlaylistID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Playlistlikes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $PlaylistID Playlist ID
     * @return Playlistlikes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PlaylistID)
    {
        if (($model = Playlistlikes::findOne(['PlaylistID' => $PlaylistID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
