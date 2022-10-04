<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

use frontend\models\MWilayah;
use frontend\models\MProvinsi;
use frontend\models\MSubsektor;
use frontend\models\MTabel;
use backend\models\MtabelSearch;
use frontend\models\MJoin;
use frontend\models\MTipenilaiTransaksiProvinsi;
use frontend\models\TProvinsi;
use frontend\models\MKategori;


use frontend\models\MInstansi;
use frontend\models\MKeperluan;
use frontend\models\Unduhan;

use yii\helpers\ArrayHelper; // load classes
use yii\helpers\Json;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionDaftartabel()
    {
        $searchModel = new MtabelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $datakategori = MKategori::find()->where(['flag' => 1])->all();
        $kategori2 = ArrayHelper::map($datakategori, 'id', 'kategori');

        return $this->render('daftartabel', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
                'kategori2' => $kategori2,
        ]);
        //return $this->render('daftartabel');
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionTabeldinamis()
    {
        $query = new \yii\db\Query();
        $query->select(['m_tabel.id id', 'm_tabel.keterangan keterangan', 'm_kategori.kategori kategori'])
            ->from('m_tabel')
            ->leftjoin('m_kategori', 'm_kategori.id=m_tabel.kategori')
            ->where('m_kategori.flag = 1');
        $command = $query->createCommand();
        $data = $command->queryAll();
        $searchModel = new MtabelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $items = ArrayHelper::map($data, 'id', 'keterangan', 'kategori');
        $datakategori = MKategori::find()->where(['flag' => 1])->all();
        $kategori2 = ArrayHelper::map($datakategori, 'id', 'kategori');
        /*$kategori2 = ArrayHelper::setValue($datakategori, 'label', 'kategori');
        $kategori2 = ArrayHelper::setValue($datakategori, 'option.id', 'id');
        $kategori2 = ArrayHelper::toArray($datakategori,[
                'label' => 'kategori',
                'option'=>['id'=>'id'],
        ]);*/
        $i=0;$filterkat="";
        foreach ($datakategori as $r){
            $kategori[$i]['label']=$r['kategori'];
            $kategori[$i]['options']['id']=$r['id'];
            if($i>0){$filterkat.=" else ";}
            $filterkat.="if($(\"li.dropdown-header.selected\").attr('id') == '".$r['id']."'){
                $(\".select2-results__option[aria-label='".$r['kategori']."']\").show();
                $(\".select2-results__option[aria-label='".$r['kategori']."']\").siblings().hide();
            }";
            $i++;
        }
        //print_r($kategori);
        /*$kate = "[";
        foreach ($kategori as $key => $value) {
            # code...
            $kate = $kate."['label' => '".$value."',  'options' => ['id' => '".$key."']],
            ";
        }
        $kate = $kate."]";
echo $kate;*/
        if (Yii::$app->request->post()!=null) {
            $data = $this->getdata(Yii::$app->request->post('id'));
            $datajson = $this->getjsondata(Yii::$app->request->post('id'));
            return $this->render('tabeldinamis', [
                'id' => Yii::$app->request->post('id'),
                'kat' => Yii::$app->request->post('kat'),
                'items' => $items,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'data' => $data['tabel'],
                'datajson' => $datajson,
                'kategori' => $kategori,
                'kategori2' => $kategori2,
                'filterkat' => $filterkat,
                'konfig' => $data['konfig']
            ]);
        }
        else{            
            $data = $this->getdata("1");
            $datajson = $this->getjsondata("1");
            return $this->render('tabeldinamis', [
                'id' => "1",
                'kat' => "5",
                'items' => $items,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'data' => $data['tabel'],
                'datajson' => $datajson,
                'kategori' => $kategori,
                'kategori2' => $kategori2,
                'filterkat' => $filterkat,
                'konfig' => $data['konfig']
            ]);

        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionTabelbykategori($kategori="6"){
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $kategori=$parents[0];
                $query = new \yii\db\Query();
                $query->select(['m_tabel.id id', 'm_tabel.keterangan keterangan', 'm_kategori.kategori kategori'])
                    ->from('m_tabel')
                    ->where(['m_tabel.kategori' => $kategori])
                    ->leftjoin('m_kategori', 'm_kategori.id=m_tabel.kategori');
                $command = $query->createCommand();
                $out = $command->queryAll();
                /*$out = MTabel::find()
                    ->select(['id', 'keterangan', 'kategori'])
                    ->where(['kategori' => $kategori])
                    ->asArray()
                    ->all();*/
                /*print_r($out);*/
                echo json_encode(['output'=>$out,'selected'=>'']);
                return;
                //;
            }
        }
        echo json_encode(['output'=>'','selected'=>'']);

    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionTabelbyvalue(){
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $valuename=$parents[0];
                $out = MTabel::getTabelByValueName($valuename);
                return json_encode(['output'=>$out,'selected'=>'']);
                //;
            }
        }
        echo json_encode(['output'=>'','selected'=>'']);
    }

    /**
     * fungsi untuk mendapatkan data dalam format tabel
     *
    **/
    private function getdata($table_id){
        $model = MTabel::findOne($table_id);
        //print_r($model);
        //$model = MTabel::findOne($table_id)->attributes;
        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="'.$table_id.'"');
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){

            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }

        $result = $que->all();
        //print_r($result);
        $table = '<table id="input" >';
        $all_field = array();
        if (count($result)>0) {
         $table.="<thead><tr>";
         /* pakai cara ini, kalau current result valuenya nol, key nya ga dianggap
         while($field = current($result[0])) {
            $table.="<th>".key($result[0])."</th>";
            echo $field." ".key($result[0])."<br/>";
            array_push($all_field, key($result[0]));
            next($result[0]);
         }
         */
         //ini cara penggantinya
         $all_field=array_keys($result[0]);
         foreach ($all_field as $item) {
            $table.='<th>' . $item . '</th>'; //get fieldname
         }
         $table.="</tr></thead><tbody>";
         foreach($result as $row) {
            $table.="<tr>";
            foreach ($all_field as $item) {
                $table.='<td>' . $row[$item] . '</td>'; //get items using property value
            }
            $table.='</tr>';
         }
         $table.='</tbody>'; 
        } else {
         return "No Results Found.";
        }
        $table.='</table>';

        if($model["value"]=="Jumlah Tenaga Kerja" || $model["value"]=="Jumlah Usaha"){
            $format="intFormat";
        }else{
            $format="";
        }
        
        if (strpos($model["keterangan"], 'Persentase') !== false) {
            $agg='"Rata-rata": function(){return tpl.average()(["'.$model["value"].'"])}';
        }else{
            $agg='"Jumlah": function(){return tpl.sum('.$format.')(["'.$model["value"].'"])}';
        }

        $konfig='{
            rows: '.$model["setrow"].',
            cols: '.$model["setcol"].',
            hiddenAttributes: ["'.$model["value"].'"],
            renderers: renderers,
            aggregators: {
                '.$agg.'
            }
        }';

        $hasil["tabel"]=$table;
        $hasil["konfig"]=$konfig;
        return $hasil;
    }


    /**
     * fungsi untuk mendapatkan data dalam format tabel
     *
    **/
    private function getjsondata($table_id){

        $model = MTabel::findOne($table_id)->attributes;
        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="'.$table_id.'"');
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //echo json_encode($result);
        return $result;
        //return json_encode($result);

    }

    /**
     * fungsi untuk export tabel dalam excel
     *
    **/
    public function actionExport(){    
        $file="data-".Yii::$app->request->post('table_id').".xls";
        $data = $this->getdata(Yii::$app->request->post('table_id'));
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        \Yii::$app->response->data  =  $data["tabel"];
    }

    /**
     * fungsi untuk export tabel hasil dragdrop pivot dalam excel
     *
    **/
    public function actionExport2(){    


        $model = new Unduhan();
        $model->tabelid = Yii::$app->request->post('dataid');
        $model->userid = Yii::$app->user->identity->id;
        $model->ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');
//$this->get_client_ip();
        $model->country = ""; //json_decode(file_get_contents("http://ipinfo.io/{$model->ip}/json"));
        $model->datetime = date("Y-m-d H:i:s");
        $model->flag = 0;
        $model->save();

        //print_r($model);

        $file="data-".Yii::$app->request->post('dataid').".xls";
        $data = Yii::$app->request->post('hasil');
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        \Yii::$app->response->data  =  $data;
    }

    // Function to get the client IP address
    private function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays infografis page.
     *
     * @return mixed
     */
    public function actionInfografis()
    {
        return $this->render('infografis');
    }

    /**
     * Displays infografis jchartfx page.
     *
     * @return mixed
     */
    public function actionInfografis2()
    {
        //$this->layout = 'mainside';
        //velocity dropdown
        $items = ArrayHelper::map(MWilayah::find()->all(), 'id', 'keterangan');
        
        if (Yii::$app->request->post()!=null) {
            $datajson = $this->getsubsektorperwilayah(Yii::$app->request->post('id'));
            return $this->render('infografis-echart', [
                'id' => Yii::$app->request->post('id'),
                'items' => $items,
                'datajson' => $datajson,
            ]);
        }
        else{            
            $datajson = $this->getsubsektorperwilayah("1");
            return $this->render('infografis-echart', [
                'id' => "1",
                'items' => $items,
                'datajson' => $datajson,
            ]);
        }

    }

    private function getsubsektorperwilayah($wil){

        $model = MTabel::findOne("1")->attributes;
        $que = new \yii\db\Query();
        $que->select('m_subsektor.img64 imagepath, m_subsektor.name imagename, '.$model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="1" and wilayah="'.$wil.'"');
        $que->orderBy("jumlahusaha desc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();

        $hasil["tabel"]=json_encode($result);
        $hasil["subsektor"]=array_column($result, 'Subsektor');
        $hasil["jml"]=array_column($result, 'Jumlah Usaha');
        $hasil["iname"]=array_column($result, 'imagename');
        $hasil["ipath"]=array_column($result, 'imagepath');
        return $hasil;

    }

    /**
     * Displays infografis jchartfx page.
     *
     * @return mixed
     */
    public function actionWatercontent()
    {
        //$this->layout = 'mainside';
        //velocity dropdown
        $items = ArrayHelper::map(MWilayah::find()->all(), 'id', 'keterangan');
        
        /*if (Yii::$app->request->post()!=null) {
            $datajson = $this->getkelompokumurwanitapertahun(Yii::$app->request->post('id'));
            return $this->render('watercontent', [
                'id' => Yii::$app->request->post('id'),
                'items' => $items,
                'datajson' => $datajson,
            ]);
        }
        else{  */          
            $datajson2016 = $this->getkelompokumurwanitapertahun("6");
            $datajson2015 = $this->getkelompokumurwanitapertahun("5");
            $datajson2014 = $this->getkelompokumurwanitapertahun("4");
            $datajson2013 = $this->getkelompokumurwanitapertahun("3");
            $datajson2012 = $this->getkelompokumurwanitapertahun("2");
            $datajson2011 = $this->getkelompokumurwanitapertahun("1");
            return $this->render('watercontent', [
                'id' => "1",
                'items' => $items,
                'data2016' => $datajson2016,
                'data2015' => $datajson2015,
                'data2014' => $datajson2014,
                'data2013' => $datajson2013,
                'data2012' => $datajson2012,
                'data2011' => $datajson2011,

            ]);
        /*}*/

    }

    private function getkelompokumurwanitapertahun($thn){

        $model = MTabel::findOne("15")->attributes;
        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="15" and jeniskelamin="2" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();

        $hasil["tabel"]=json_encode($result);
        $hasil["kelompokumur"]=array_column($result, 'Kelompok Umur Tenaga Kerja');
        $hasil["jml"]=array_column($result, 'Jumlah Tenaga Kerja');
        return $hasil;

    }

    /**
     * Displays infografis page.
     *
     * @return mixed
     */
    public function actionMultichart()
    {
        //$this->layout = 'mainside';
        $items = ArrayHelper::map(MWilayah::find()->all(), 'id', 'keterangan');
        $data = array(
        2016 => $this->getkelompokumurpertahun("6"),
        2015 => $this->getkelompokumurpertahun("5"),
        2014 => $this->getkelompokumurpertahun("4"),
        2013 => $this->getkelompokumurpertahun("3"),
        2012 => $this->getkelompokumurpertahun("2"),
        2011 => $this->getkelompokumurpertahun("1"));
        //print_r($data);
        //echo $data[2016]["kelompokumurdesa"];
        //echo $data[2016]["kelompokumurdesa"];
        foreach($data as $year=>$year_value)
        /*{
            $val = $year.":[";
            foreach($year_value["jmlkota"] as $value)
                $val = $val.$value.",";
            $val = substr($val, 0, -1);
            $val = $val."], ";
            echo $val;
        }*/
        
                    
        return $this->render('multichart', [
            'id' => "1",
            'items' => $items,
            'data' => $data,
        ]);
    }

    private function getkelompokumurpertahun($thn){

        $model = MTabel::findOne("16")->attributes;
        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="1" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["desa"]=json_encode($result);        
        $hasil["jmldesa"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurdesa"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));

        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="2" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["kota"]=json_encode($result);        
        $hasil["jmlkota"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurkota"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));
        
        //print_r($hasil);
        //echo "<br><br>nnn<br>";
        return $hasil;

    }


    /**
     * Displays infografis page.
     *
     * @return mixed
     */
    public function actionBaricon()
    {
        //$this->layout = 'mainside';
        $items = ArrayHelper::map(MWilayah::find()->all(), 'id', 'keterangan');
        $data = array(
        2016 => $this->getkelompokumurpertahun("6"),
        2015 => $this->getkelompokumurpertahun("5"),
        2014 => $this->getkelompokumurpertahun("4"),
        2013 => $this->getkelompokumurpertahun("3"),
        2012 => $this->getkelompokumurpertahun("2"),
        2011 => $this->getkelompokumurpertahun("1"));
        //print_r($data);
        //echo $data[2016]["kelompokumurdesa"];
        //echo $data[2016]["kelompokumurdesa"];
        foreach($data as $year=>$year_value)
        /*{
            $val = $year.":[";
            foreach($year_value["jmlkota"] as $value)
                $val = $val.$value.",";
            $val = substr($val, 0, -1);
            $val = $val."], ";
            echo $val;
        }*/
        
                    
        return $this->render('baricon', [
            'id' => "1",
            'items' => $items,
            'data' => $data,
        ]);
    }

    private function getBaricondata($thn){

        $model = MTabel::findOne("16")->attributes;
        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="1" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["desa"]=json_encode($result);        
        $hasil["jmldesa"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurdesa"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));

        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="2" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["kota"]=json_encode($result);        
        $hasil["jmlkota"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurkota"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));
        
        //print_r($hasil);
        //echo "<br><br>nnn<br>";
        return $hasil;

    }


    /**
     * Displays infografis page.
     *
     * @return mixed
     */
    public function actionBarmaxicon()
    {
        //$this->layout = 'mainside';
        $items = ArrayHelper::map(MWilayah::find()->all(), 'id', 'keterangan');
        $data = array(
        2016 => $this->getkelompokumurpertahun("6"),
        2015 => $this->getkelompokumurpertahun("5"),
        2014 => $this->getkelompokumurpertahun("4"),
        2013 => $this->getkelompokumurpertahun("3"),
        2012 => $this->getkelompokumurpertahun("2"),
        2011 => $this->getkelompokumurpertahun("1"));
        //print_r($data);
        //echo $data[2016]["kelompokumurdesa"];
        //echo $data[2016]["kelompokumurdesa"];
        foreach($data as $year=>$year_value)
        /*{
            $val = $year.":[";
            foreach($year_value["jmlkota"] as $value)
                $val = $val.$value.",";
            $val = substr($val, 0, -1);
            $val = $val."], ";
            echo $val;
        }*/
        
                    
        return $this->render('barmaxicon', [
            'id' => "1",
            'items' => $items,
            'data' => $data,
        ]);
    }

    private function getBarmaxicondata($thn){

        $model = MTabel::findOne("16")->attributes;
        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="1" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["desa"]=json_encode($result);        
        $hasil["jmldesa"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurdesa"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));

        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="2" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["kota"]=json_encode($result);        
        $hasil["jmlkota"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurkota"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));
        
        //print_r($hasil);
        //echo "<br><br>nnn<br>";
        return $hasil;

    }

    
    /**
     * Displays infografis page.
     *
     * @return mixed
     */
    public function actionPiesubsektor()
    {
        //$this->layout = 'mainside';
        $items = ArrayHelper::map(MWilayah::find()->all(), 'id', 'keterangan');
        $data = array(
        2016 => $this->getkelompokumurpertahun("6"),
        2015 => $this->getkelompokumurpertahun("5"),
        2014 => $this->getkelompokumurpertahun("4"),
        2013 => $this->getkelompokumurpertahun("3"),
        2012 => $this->getkelompokumurpertahun("2"),
        2011 => $this->getkelompokumurpertahun("1"));
        //print_r($data);
        //echo $data[2016]["kelompokumurdesa"];
        //echo $data[2016]["kelompokumurdesa"];
        foreach($data as $year=>$year_value)
        /*{
            $val = $year.":[";
            foreach($year_value["jmlkota"] as $value)
                $val = $val.$value.",";
            $val = substr($val, 0, -1);
            $val = $val."], ";
            echo $val;
        }*/
        
                    
        return $this->render('piesubsektor', [
            'id' => "1",
            'items' => $items,
            'data' => $data,
        ]);
    }

    private function getPiesubsektordata($thn){

        $model = MTabel::findOne("16")->attributes;
        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="1" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["desa"]=json_encode($result);        
        $hasil["jmldesa"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurdesa"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));

        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="2" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["kota"]=json_encode($result);        
        $hasil["jmlkota"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurkota"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));
        
        //print_r($hasil);
        //echo "<br><br>nnn<br>";
        return $hasil;

    }

    
    /**
     * Displays infografis page.
     *
     * @return mixed
     */
    public function actionMultipie()
    {
        //$this->layout = 'mainside';
        $items = ArrayHelper::map(MWilayah::find()->all(), 'id', 'keterangan');
        $data = array(
        2016 => $this->getkelompokumurpertahun("6"),
        2015 => $this->getkelompokumurpertahun("5"),
        2014 => $this->getkelompokumurpertahun("4"),
        2013 => $this->getkelompokumurpertahun("3"),
        2012 => $this->getkelompokumurpertahun("2"),
        2011 => $this->getkelompokumurpertahun("1"));
        //print_r($data);
        //echo $data[2016]["kelompokumurdesa"];
        //echo $data[2016]["kelompokumurdesa"];
        foreach($data as $year=>$year_value)
        /*{
            $val = $year.":[";
            foreach($year_value["jmlkota"] as $value)
                $val = $val.$value.",";
            $val = substr($val, 0, -1);
            $val = $val."], ";
            echo $val;
        }*/
        
                    
        return $this->render('multipie', [
            'id' => "1",
            'items' => $items,
            'data' => $data,
        ]);
    }

    private function getMultipie($thn){

        $model = MTabel::findOne("16")->attributes;
        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="1" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["desa"]=json_encode($result);        
        $hasil["jmldesa"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurdesa"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));

        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="2" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["kota"]=json_encode($result);        
        $hasil["jmlkota"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurkota"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));
        
        //print_r($hasil);
        //echo "<br><br>nnn<br>";
        return $hasil;

    }

    
    /**
     * Displays infografis page.
     *
     * @return mixed
     */
    public function actionMultibar()
    {
        //$this->layout = 'mainside';
        $items = ArrayHelper::map(MWilayah::find()->all(), 'id', 'keterangan');
        $data = array(
        2016 => $this->getkelompokumurpertahun("6"),
        2015 => $this->getkelompokumurpertahun("5"),
        2014 => $this->getkelompokumurpertahun("4"),
        2013 => $this->getkelompokumurpertahun("3"),
        2012 => $this->getkelompokumurpertahun("2"),
        2011 => $this->getkelompokumurpertahun("1"));
        //print_r($data);
        //echo $data[2016]["kelompokumurdesa"];
        //echo $data[2016]["kelompokumurdesa"];
        foreach($data as $year=>$year_value)
        /*{
            $val = $year.":[";
            foreach($year_value["jmlkota"] as $value)
                $val = $val.$value.",";
            $val = substr($val, 0, -1);
            $val = $val."], ";
            echo $val;
        }*/
        
                    
        return $this->render('multibar', [
            'id' => "1",
            'items' => $items,
            'data' => $data,
        ]);
    }

    private function getMultibar($thn){

        $model = MTabel::findOne("16")->attributes;
        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="1" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["desa"]=json_encode($result);        
        $hasil["jmldesa"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurdesa"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));

        $que = new \yii\db\Query();
        $que->select($model["pilihkolom"]);
        $que->from($model["lokasi"].' a')->where('tabel="16" and kotadesa="2" and a.tahun="'.$thn.'"');
        $que->orderBy("kelompokumur_tenagakerja asc");
        $myArray = explode(',', $model["kolommaster"]);
        foreach($myArray as $kolom){
            $adajoin=MJoin::findOne(['kolom' => trim($kolom)]);
            if ($adajoin!=null) {
                $mjoin=$adajoin->attributes;
                $que->leftjoin($mjoin["tabel"], $mjoin["kondisijoin"]);
            }            
        }
        $result = $que->all();
        
        //$hasil["kota"]=json_encode($result);        
        $hasil["jmlkota"]=array_column($result, 'Jumlah Tenaga Kerja');
        $hasil["kelompokumurkota"]=json_encode(array_column($result, 'Kelompok Umur Tenaga Kerja'));
        
        //print_r($hasil);
        //echo "<br><br>nnn<br>";
        return $hasil;

    }


    /**
     * Displays infografis page.
     *
     * @return mixed
     */
    public function actionMaps2()
    {
        //$this->layout = 'mainside';
        return $this->render('maps2');
    }

    /**
     * Displays infografis page.
     *
     * @return mixed
     */
    public function actionJchart1()
    {
        //$this->layout = 'mainside';
        return $this->render('infografis-jchartfx1');
    }

    /**
     * Displays infografis page.
     *
     * @return mixed
     */
    public function actionJchart2()
    {
        //$this->layout = 'mainside';
        return $this->render('infografis-jchartfx2');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {

        $instansi = ArrayHelper::map(MInstansi::find()->all(), 'id', 'nama_instansi');
        $keperluan = ArrayHelper::map(MKeperluan::find()->all(), 'id', 'keperluan');

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'instansi' => $instansi,
            'keperluan' => $keperluan
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Displays homepage on dropdownlist change.
     *
     * @return mixed
     */
    public function actionSelectdata()
    {
        if(isset($_POST))
        $items = ArrayHelper::map(MTabel::find()->all(), 'id', 'keterangan');
        $model = MTabel::find()->all();
        return $this->render('tabeldinamis', [
            'model' => $model,
            'items' => $items,
        ]);
    }


    /**
     * Coming Soon Page
     *
     * @return mixed
     */
    public function actionComingsoon()
    {
        //$this->layout = 'mainside';
        return $this->render('comingsoon');
    }
}
