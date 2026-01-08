<?php
namespace frontend\modules\rate\controllers;

use frontend\modules\rate\models\RateReview;
use frontend\modules\rate\models\RateReviewSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ReviewController implements the CRUD actions for RateReview model.
 */
class ReviewController extends Controller
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
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                /*
                'access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'rules' => [
                        'allow'   => true,
                        'actions' => ['create'],
                        'roles'   => ['@'],
                    ],
                    [
                        'allow'   => true,
                        'actions' => ['update'],
                        'roles'   => ['@'],
                    ],
                    [
                        'allow'   => true,
                        'actions' => ['delete'],
                        'roles'   => ['Staff'],
                    ],
                ],
                */
            ]
        );
    }

/**
 * Lists all RateReview models.
 *
 * @return string
 */
    public function actionIndex()
    {
        $email = \Yii::$app->user->identity->email;
        // the session var is set in index.php
        $pid = \Yii::$app->session->get("$email");
        \Yii::$app->session->remove("$email");

        return $this->redirect(['indexa', 'RateReviewSearch[product_id]' => $pid]);

    }
    public function actionIndexa()
    {
        $searchModel  = new RateReviewSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('indexa', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

/**
 * Displays a single RateReview model.
 * @param int $id ID
 * @return string
 * @throws NotFoundHttpException if the model cannot be found
 */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

/**
 * Creates a new RateReview model.
 * If creation is successful, the browser will be redirected to the 'view' page.
 * @return string|\yii\web\Response
 */
    public function actionCreate()
    {
        $model = new RateReview();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

/**
 * Updates an existing RateReview model.
 * If update is successful, the browser will be redirected to the 'view' page.
 * @param int $id ID
 * @return string|\yii\web\Response
 * @throws NotFoundHttpException if the model cannot be found
 */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

/**
 * Deletes an existing RateReview model.
 * If deletion is successful, the browser will be redirected to the 'index' page.
 * @param int $id ID
 * @return \yii\web\Response
 * @throws NotFoundHttpException if the model cannot be found
 */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

/**
 * Finds the RateReview model based on its primary key value.
 * If the model is not found, a 404 HTTP exception will be thrown.
 * @param int $id ID
 * @return RateReview the loaded model
 * @throws NotFoundHttpException if the model cannot be found
 */
    protected function findModel($id)
    {
        if (($model = RateReview::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}