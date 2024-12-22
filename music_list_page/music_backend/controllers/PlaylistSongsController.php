<?php

namespace app\controllers;

use app\models\PlaylistSongs;
use app\models\PlaylistSongsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlaylistSongsController implements the CRUD actions for PlaylistSongs model.
 */
class PlaylistSongsController extends Controller
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
     * Lists all PlaylistSongs models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlaylistSongsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PlaylistSongs model.
     * @param int $PlaylistID Playlist ID
     * @param int $SongID Song ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($PlaylistID, $SongID)
    {
        return $this->render('view', [
            'model' => $this->findModel($PlaylistID, $SongID),
        ]);
    }

    /**
     * Creates a new PlaylistSongs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PlaylistSongs();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'PlaylistID' => $model->PlaylistID, 'SongID' => $model->SongID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PlaylistSongs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $PlaylistID Playlist ID
     * @param int $SongID Song ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($PlaylistID, $SongID)
    {
        $model = $this->findModel($PlaylistID, $SongID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'PlaylistID' => $model->PlaylistID, 'SongID' => $model->SongID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PlaylistSongs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $PlaylistID Playlist ID
     * @param int $SongID Song ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($PlaylistID, $SongID)
    {
        $this->findModel($PlaylistID, $SongID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PlaylistSongs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $PlaylistID Playlist ID
     * @param int $SongID Song ID
     * @return PlaylistSongs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PlaylistID, $SongID)
    {
        if (($model = PlaylistSongs::findOne(['PlaylistID' => $PlaylistID, 'SongID' => $SongID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
