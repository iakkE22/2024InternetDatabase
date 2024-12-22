<?php

namespace app\controllers;

use app\models\Playlistcomments;
use app\models\PlaylistcommentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlaylistcommentsController implements the CRUD actions for Playlistcomments model.
 */
class PlaylistcommentsController extends Controller
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
     * Lists all Playlistcomments models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlaylistcommentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Playlistcomments model.
     * @param int $CommentID Comment ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($CommentID)
    {
        return $this->render('view', [
            'model' => $this->findModel($CommentID),
        ]);
    }

    /**
     * Creates a new Playlistcomments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Playlistcomments();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'CommentID' => $model->CommentID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Playlistcomments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $CommentID Comment ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($CommentID)
    {
        $model = $this->findModel($CommentID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CommentID' => $model->CommentID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Playlistcomments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $CommentID Comment ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($CommentID)
    {
        $this->findModel($CommentID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Playlistcomments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $CommentID Comment ID
     * @return Playlistcomments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CommentID)
    {
        if (($model = Playlistcomments::findOne(['CommentID' => $CommentID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
