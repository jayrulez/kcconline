<?php

class UserController extends AdminController
{
	public function init()
	{
		parent::init();
		Layout::addBlock('sidebar.left', array(
			'id'=>'admin_user',
			'content'=>$this->renderPartial('_admin_user', array(), true),
		));
		Layout::addBlock('sidebar.left', array(
				'id'=>'profile_sidebar',
				'content'=>$this->widget('ProfileWidget', array('userModel'=>Yii::app()->getUser()->getModel()), true),
		));
	}
	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
		$model->country_code = 'JM';
		$model->scenario = 'create';
		$model->image_url = 'blank_profile.jpg';

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			var_dump($model->active);die();
			$image=CUploadedFile::getInstance($model,'image_url');
			if(!$image->getHasError())
			{
				$model->image_url = $model->user_id.'.'.$image->extensionName;
			}
			if($model->save())
			{
				$image->saveAs('C:/wamp/www'.Yii::app()->baseUrl.'/images/profile/'.$model->image_url);
				$this->redirect(array('index'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model->scenario = 'update';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{			
			$model->attributes=$_POST['User'];
			$image=CUploadedFile::getInstance($model,'image_url');
			if(!$image->getHasError())
			{
				$model->image_url = $model->uid.'.'.$image->extensionName;
			}
			if($model->save())
			{
				$image->saveAs('C:/wamp/www'.Yii::app()->baseUrl.'/images/profile/'.$model->image_url);
				$this->redirect(array('view','id'=>$model->uid));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
