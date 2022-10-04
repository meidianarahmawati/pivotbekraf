<?php

namespace backend\controllers;

use Yii;
use frontend\models\Unduhan;
use frontend\models\MTabel;
use common\models\User;
use backend\models\UnduhanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnduhanController implements the CRUD actions for Unduhan model.
 */
class UnduhanController extends Controller
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
     * Lists all Unduhan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UnduhanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $totalUnduhan = Unduhan::find()->count();
        $totalBulanan = Unduhan::find()->where(['year(datetime)' => 'year(now())'])->count();
        $totalTabel = MTabel::find()->count();
        $totalPengunjung = User::find()->count();

        $unduhanJanuari = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 1')->count();
        $unduhanFebruari = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 2')->count();
        $unduhanMaret = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 3')->count();
        $unduhanApril = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 4')->count();
        $unduhanMei = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 5')->count();
        $unduhanJuni = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 6')->count();
        $unduhanJuli = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 7')->count();
        $unduhanAgustus = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 8')->count();
        $unduhanSeptember = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 9')->count();
        $unduhanOktober = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 10')->count();
        $unduhanNovember = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 11')->count();
        $unduhanDesember = Unduhan::find()->where('year(datetime) = year(now()) and month(datetime) = 12')->count();
        $unduhanTotalTahun = Unduhan::find()->where('year(datetime) = year(now())')->count();

        $unduhanKeperluan1 = Unduhan::find()->joinWith('user', 'user.id = unduhan.userid')->where('user.keperluan = 1')->count();
        $unduhanKeperluan2 = Unduhan::find()->joinWith('user', 'user.id = unduhan.userid')->where('user.keperluan = 2')->count();
        $unduhanKeperluan3 = Unduhan::find()->joinWith('user', 'user.id = unduhan.userid')->where('user.keperluan = 3')->count();

        $unduhanInstansi1 = Unduhan::find()->joinWith('user', 'user.id = unduhan.userid')->where('user.instansi = 1')->count();
        $unduhanInstansi2 = Unduhan::find()->joinWith('user', 'user.id = unduhan.userid')->where('user.instansi = 2')->count();
        $unduhanInstansi3 = Unduhan::find()->joinWith('user', 'user.id = unduhan.userid')->where('user.instansi = 3')->count();
            
        $unduhanKategori1 = Unduhan::find()->joinWith('tabel', 'tabel.id = unduhan.tabelid')->where('m_tabel.kategori = 1')->count();
        $unduhanKategori2 = Unduhan::find()->joinWith('tabel', 'tabel.id = unduhan.tabelid')->where('m_tabel.kategori = 2')->count();
        $unduhanKategori3 = Unduhan::find()->joinWith('tabel', 'tabel.id = unduhan.tabelid')->where('m_tabel.kategori = 3')->count();
        $unduhanKategori4 = Unduhan::find()->joinWith('tabel', 'tabel.id = unduhan.tabelid')->where('m_tabel.kategori = 4')->count();
        $unduhanKategori5 = Unduhan::find()->joinWith('tabel', 'tabel.id = unduhan.tabelid')->where('m_tabel.kategori = 5')->count();
        $unduhanKategori6 = Unduhan::find()->joinWith('tabel', 'tabel.id = unduhan.tabelid')->where('m_tabel.kategori = 6')->count();
        $unduhanKategori7 = Unduhan::find()->joinWith('tabel', 'tabel.id = unduhan.tabelid')->where('m_tabel.kategori = 7')->count();
        $unduhanKategori8 = Unduhan::find()->joinWith('tabel', 'tabel.id = unduhan.tabelid')->where('m_tabel.kategori = 8')->count();
        $unduhanKategori9 = Unduhan::find()->joinWith('tabel', 'tabel.id = unduhan.tabelid')->where('m_tabel.kategori = 9')->count();
        

        $top55 = new \yii\db\Query();
        $result = $top55->select('m_tabel.keterangan, count(*)')->from('unduhan')->leftJoin('user', 'm_tabel.id = unduhan.tabelid')->groupBy('m_tabel.keterangan')->orderBy('count(*)')->all();

        $top55 = new \yii\db\Query();
        $result = $top55->select('m_tabel.keterangan, count(*)')->from('unduhan')->leftJoin('m_tabel', 'm_tabel.id = unduhan.tabelid')->groupBy('m_tabel.keterangan')->orderBy('count(*)')->all();

            $top5 = Unduhan::find()->select('m_tabel.keterangan')->joinWith('tabel', 'tabel.id = unduhan.tabelid')->groupBy('m_tabel.keterangan')->orderBy('count(*)')->all();

        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'totalPengunjung' => $totalPengunjung,
            'totalTabel' => $totalTabel,
            'totalBulanan' => $totalBulanan,
            'totalUnduhan' => $totalUnduhan,
            'unduhanJanuari' => $unduhanJanuari,            
            'unduhanFebruari' => $unduhanFebruari,
            'unduhanMaret' => $unduhanMaret,
            'unduhanApril' => $unduhanApril,
            'unduhanMei' => $unduhanMei,
            'unduhanJuni' => $unduhanJuni,
            'unduhanJuli' => $unduhanJuli,
            'unduhanAgustus' => $unduhanAgustus,
            'unduhanSeptember' => $unduhanSeptember,
            'unduhanOktober' => $unduhanOktober,
            'unduhanNovember' => $unduhanNovember,
            'unduhanDesember' => $unduhanDesember,
            'unduhanTotalTahun' => $unduhanTotalTahun,

            'unduhanKeperluan1' => $unduhanKeperluan1,
            'unduhanKeperluan2' => $unduhanKeperluan2,
            'unduhanKeperluan3' => $unduhanKeperluan3,

            'unduhanInstansi1' => $unduhanInstansi1,
            'unduhanInstansi2' => $unduhanInstansi2,
            'unduhanInstansi3' => $unduhanInstansi3,

            'unduhanKategori1' => $unduhanKategori1,
            'unduhanKategori2' => $unduhanKategori2,
            'unduhanKategori3' => $unduhanKategori3,
            'unduhanKategori4' => $unduhanKategori4,
            'unduhanKategori5' => $unduhanKategori5,
            'unduhanKategori6' => $unduhanKategori6,
            'unduhanKategori7' => $unduhanKategori7,
            'unduhanKategori8' => $unduhanKategori8,
            'unduhanKategori9' => $unduhanKategori9,

            'top5' => $result,
        ]);
    }

    /**
     * Displays a single Unduhan model.
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
     * Creates a new Unduhan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Unduhan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Unduhan model.
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
     * Deletes an existing Unduhan model.
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
     * Finds the Unduhan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Unduhan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Unduhan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
