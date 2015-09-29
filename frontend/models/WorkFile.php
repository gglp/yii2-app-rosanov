<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class WorkFile extends Model
{
    /**
     * @var file Загружаемый файл
     */
    public $textFile;

    /**
     * @var string Имя загружаемого файла
     */
    public $filename;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['textFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt, md']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'textFile' => 'Название файла'
        ];
    }

    /**
     * @inheritdoc
     */
    public function upload()
    {
        if ($this->validate()){
            $filePath = Yii::getAlias('@frontend/web/media/books/');
            $fileName = $this->textFile->baseName.'.'.$this->textFile->extension;
            $this->textFile->saveAs($filePath.$fileName);
            $this->filename = $fileName;
            return true;
        } else {
            return false;
        }
    }
}
