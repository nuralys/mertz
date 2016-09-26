<?php 

class Product extends AppModel{
	public $belongsTo = array(
		'Category'=>array(
			'className' => 'Category'
		),
		
	);
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название'
		),
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите текст'
		),
		'img' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
				'message' => 'Ошибка загрузки картинки'
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '2MB'),
				'message' => 'Максимальный размер картинки 2MB'
			),
			'customUploadImg' => array(
				'rule' => 'customUploadImg',
				'message' => 'Ошибка обработки обработки картинки'
			)
		),
		'mini_img' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
				'message' => 'Ошибка загрузки картинки'
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '1MB'),
				'message' => 'Максимальный размер картинки 1MB'
			),
			'customUploadMiniImg' => array(
				'rule' => 'customUploadMiniImg',
				'message' => 'Ошибка обработки обработки картинки'
			)
		)
	);

	public function customUploadImg($file = array()){
		/*ws begin*/
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['img']['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'img/product/' . $fileName;
		$path_th = WWW_ROOT . 'img/product/thumbs/' . $fileName;
		copy($file['img']['tmp_name'], $path);
		copy(WWW_ROOT . trim($this->data[$this->alias]["imgcrop"], '/'), $path_th);
		unlink($file['img']['tmp_name']);
		unlink(WWW_ROOT . trim($this->data[$this->alias]["imgcrop"]));
		/*ws end*/
		$this->data[$this->alias]['img'] = $fileName;
		return true;
	}

	public function customUploadMiniImg($file = array()){
		if(!is_uploaded_file($file['mini_img']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['mini_img']['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'img/product/' . $fileName;
		$path_th = WWW_ROOT . 'img/product/thumbs/' . $fileName;
		if(!move_uploaded_file($file['mini_img']['tmp_name'], $path)){
			return false;
		}
		$this->resizeImg($path, $path_th, 52, 52, $ext);
		$this->data[$this->alias]['mini_img'] = $fileName;
		return true;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/product/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}
	public function genNameFileMini($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/product/' . $name)){
			$name = $this->genNameFileMini($ext);
		}
		return $name;
	}
	public function resizeImg($target, $dest, $wmax = 647, $hmax = 647, $ext){
		/*
		$target - путь к оригинальному файлу
		$dest - путь сохранения обработанного файла
		$wmax - максимальная ширина
		$hmax - максимальная высота
		$ext - расширение файла
		*/
		list($w_orig, $h_orig) = getimagesize($target);
		$ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

		if(($wmax / $hmax) > $ratio){
			$wmax = 275;
		}else{
			$hmax = 342;
		}
		
		$img = "";
		// imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
		switch($ext){
			case("gif"):
				$img = imagecreatefromgif($target);
				break;
			case("png"):
				$img = imagecreatefrompng($target);
				break;
			default:
				$img = imagecreatefromjpeg($target);    
		}
		$newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
		
		if($ext == "png"){
			imagesavealpha($newImg, true); // сохранение альфа канала
			$transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
			imagefill($newImg, 0, 0, $transPng); // заливка  
		}
		
		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
		switch($ext){
			case("gif"):
				imagegif($newImg, $dest);
				break;
			case("png"):
				imagepng($newImg, $dest);
				break;
			default:
				imagejpeg($newImg, $dest);    
		}
		imagedestroy($newImg);
	}

	public function resizeImgMini($target, $dest, $wmax = 647, $hmax = 647, $ext){
		/*
		$target - путь к оригинальному файлу
		$dest - путь сохранения обработанного файла
		$wmax - максимальная ширина
		$hmax - максимальная высота
		$ext - расширение файла
		*/
		list($w_orig, $h_orig) = getimagesize($target);
		$ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

		if(($wmax / $hmax) > $ratio){
			$wmax = $hmax * $ratio;
		}else{
			$hmax = $wmax / $ratio;
		}
		
		$img = "";
		// imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
		switch($ext){
			case("gif"):
				$img = imagecreatefromgif($target);
				break;
			case("png"):
				$img = imagecreatefrompng($target);
				break;
			default:
				$img = imagecreatefromjpeg($target);    
		}
		$newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
		
		if($ext == "png"){
			imagesavealpha($newImg, true); // сохранение альфа канала
			$transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
			imagefill($newImg, 0, 0, $transPng); // заливка  
		}
		
		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
		switch($ext){
			case("gif"):
				imagegif($newImg, $dest);
				break;
			case("png"):
				imagepng($newImg, $dest);
				break;
			default:
				imagejpeg($newImg, $dest);    
		}
		imagedestroy($newImg);
	}
}