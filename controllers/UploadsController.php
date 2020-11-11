<?php

namespace app\controllers;

use Yii;
use app\models\Uploads;
use app\models\UploadsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UploadsController implements the CRUD actions for Uploads model.
 */
class UploadsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Uploads models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UploadsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    /**
     * Displays a single Uploads model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Uploads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
{
$model = new Uploads();
 
if ($model->load(Yii::$app->request->post())) {
$model->excelFile = UploadedFile::getInstances($model, 'excelFile');
if ($model->excelFile && $model->validate()){
if(!file_exists((Url::to('uploads/')))){
mkdir(Url::to('uploads/'), 0777, true);
}
$path =Url::to('uploads/');
foreach ($model->excelFile as $excelFile){
$excel = new Uploads();
$excel->category = $model->category;
 
$count= Uploads::find()->where(['category'=>$model->category])->count();
$fileNo = $count +1;
$excel->excelFile = $model->category.'_'.$fileNo.'.'.$excelFile->extension;
$excel->path = 'uploads/'.$excel->excelFile;
if ($excel->save()){
$excelFile->saveAs($excel->path, $excel->excelFile);
}
 
}
return $this->redirect(['index']);
}
 
}
 
return $this->render('create', [
'model' => $model,
]);
}
    /**
     * Updates an existing Uploads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Uploads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Uploads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uploads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uploads::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
