<?php
class ApplicationsController extends MF_Controller{
	
	public function _init(){
		//$this->bridge = new ApplicationsBridge();
	}
	public function indexAction(){
		//$this->view->javascript = "show_shared_apps();";
	}
	public function getDataAction(){
	}
	
	public function listSharesProfileAction(){
		$this->disableLayout();
		$request = MF_Request::getInstance();
		$args = array();
		$args['user'] = $request->getParam( 'user', 'me' );
		$response = MF_ApiCaller::call('Application', 'listShares', $args);
		//var_dump($response);
		$this->view->response= $response ;
	}
	public function listFavoritesProfileAction(){
		$this->disableLayout();
		$request = MF_Request::getInstance();
		$args = array();
		$args['user_id'] = $request->getParam( 'user', 'me' );
		$response = MF_ApiCaller::call('Application', 'listFavorites', $args);
		$this->view->response= $response ;
	}
	public function shareAction(){
		$this->disableLayout();
		$request = MF_Request::getInstance();
		$args = array();
		$args['package_name'] = $request->getParam( 'package_name', false );
		$args['application_name'] = $request->getParam( 'application_name', false );
		$response = MF_ApiCaller::call('Application', 'share', $args);
		$this->view->response= $response ;
	}
	public function unshareAction(){
		$this->disableLayout();
		$request = MF_Request::getInstance();
		$args = array();
		$args['package_name'] = $request->getParam( 'package_name', false );
		$response = MF_ApiCaller::call('Application', 'unshare', $args);
		$this->view->response= $response ;
	}
	public function favoriteAction(){
		$this->disableLayout();
		$request = MF_Request::getInstance();
		$args = array();
		$args['shared_id'] = $request->getParam( 'shared_id', false );
		$args['favorite'] = $request->getParam( 'favorite', false );
		//var_dump($args);
		$response = MF_ApiCaller::call('Favorite', 'changeStatus', $args);
		//var_dump($response);
		$this->renderJSON( $response );
	}
}