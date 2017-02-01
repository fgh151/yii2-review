<?php
namespace fgh151\review\controllers;

use yii;
use fgh151\review\models\ReviewSearch;
use fgh151\review\models\Review;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ReviewController  extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ReviewSearch();
        $dataProvider = $searchModel->search(yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Review;

        if ($model->load(yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['review/update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionAdd()
    {
        $model = new Review();
        $model->active = 'no';
        $model->date = date('Y-m-d H:i:s');
        $model->userId = yii::$app->user->id;
        
        if ($model->load(yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('reviewOnModerate', 'Спасибо за отзыв! Он появится сразу после проверки.');
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            \Yii::$app->session->setFlash('reviewAddFail', 'Не удалось проверить отзыв. Проверьте, все ли данные заполнены корректно.');
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    protected function findModel($id)
    {
        if (($model = Review::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested review does not exist.');
        }
    }
}
