<?php
require_once APP_PATH . '/app/config/router.php';
class Loader{
	private $moduleName;
	private $controllerName;
	private $actionName;
	private $routers = [];
	private $urlParams = [];

	function __construct(){
		$this->setRouter();

		$this->mapURL();
	}

	public function load(){
		//load module, controller, action
		$controllerFile = APP_PATH . '/app/' . $this->moduleName . '/controllers/' . $this->controllerName . ".php";
		if (file_exists($controllerFile)) {
		 	require_once $controllerFile;
		 	$controller = new $this->controllerName;
		 	if (method_exists($controller, $this->actionName)) {
		 		$controller->loadModel($this->moduleName, $this->controllerName);
		 		$controller->setView($this->moduleName);
		 		//$controller->{$this->actionName}();
		 		call_user_func_array(
		 			[$controller, $this->actionName], 
		 			$this->urlParams
		 		);
				$controller->verify();
		 	}else{
		 		$this->notFound();
		 	}
		}else{
			$this->notFound();
		}
	}

	public function notFound(){
		require_once APP_PATH . '/app/default/controllers/errors.php';
		$errors = new Errors();
		$errors->notFound();
	}

	private function mapURL(){
		$method = $_SERVER['REQUEST_METHOD'];

		$url = 'index.php';
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
		}

		$url = rtrim($url, '/');

		$url = ($url == 'index.php') ? '/' : ('/' . $url);

		foreach ($this->routers as $router) {
			if ($router['method'] == "ANY" || $method == $router['method']) {
				$flagMapURL = false;
				if ($url == $router['url']) {
					$flagMapURL = true;
				}else{
					$urlParams = explode('/', $url);
					$routerParams = explode('/', $router['url']);

					if (count($urlParams) == count($routerParams)) {
						$flagMapParams = false;
						foreach ($urlParams as $key => $urlParam) {
							if (preg_match('/^{\w+}$/', $routerParams[$key])) {
								//lưu giá trị tham số lại
								$this->urlParams[] = $urlParam;
								$flagMapParams = true;
							}else{
								if ($urlParam == $routerParams[$key]) {
									$flagMapParams = true;
								}else{
									$flagMapParams = false;
									break;
								}
							}
						}

						if ($flagMapParams) {
							$flagMapURL = true;
						}							
					}
				}

				if ($flagMapURL) {
					$this->moduleName = $router['routing']['module'];
					$this->controllerName = $router['routing']['controller'];
					$this->actionName = $router['routing']['action'];
					break;
				}
			}
		}
	}

	private function setRouter(){
		$router = new Router();

		//Đăng nhập
		$router->any('/login',
			[
				'module'	=> 'admin',
				'controller'=> 'user',	
				'action'	=> 'login'
			]
		);
		//Đăng xuất
		$router->any('/logout',
			[
				'module'	=> 'admin',
				'controller'=> 'user',
				'action'	=> 'logout'
			]
		);

		//Đăng ký
		$router->any('/register',
			[
				'module'	=> 'default',
				'controller'=> 'user',
				'action'	=> 'register'
			]
		);
		//Thông tin sản phẩm và giá
		$router->any('/products',
			[
				'module'	=> 'default',
				'controller'=> 'product',
				'action'	=> 'product_info'
			]
		);
		//Thông tin chi tiết sản phẩm
		$router->any('/product-detail',
			[
				'module'	=> 'default',
				'controller'=> 'product',
				'action'	=> 'product_detail'
			]
		);
		//Giới thiệu
		$router->any('/intro',
			[
				'module'	=> 'default',
				'controller'=> 'intro',
				'action'	=> 'index'
			]
		);
		//Liên hệ
		$router->any('/contact',
			[
				'module'	=> 'default',
				'controller'=> 'contact',
				'action'	=> 'index'
			]
		);

		//tin tức
		$router->any('/news',
			[
				'module'	=> 'default',
				'controller'=> 'news',
				'action'	=> 'index'
			]
		);


		//Giỏ hàng
		$router->any('/cart',
			[
				'module'	=> 'default',
				'controller'=> 'cart',
				'action'	=> 'index'
			]
		);

		//Đơn hàng
		$router->any('/saleorder',
			[
				'module'	=> 'default',
				'controller'=> 'saleorder',
				'action'	=> 'index'
			]
		);


		//Thông tin thanh toán
		$router->any('/payment',
			[
				'module'	=> 'default',
				'controller'=> 'showfb',
				'action'	=> 'showfb'
			]
		);

		//Thay đổi thông tin cá nhân
		$router->any('/userinfo',
			[
				'module'	=> 'default',
				'controller'=> 'userinfo',
				'action'	=> 'index'
			]
		);


		//quên mật khẩu
		$router->any('/forgotpass',
			[
				'module'	=> 'default',
				'controller'=> 'user',
				'action'	=> 'forgotpass'
			]
		);

		//Bình luận, đánh giá
		$router->any('/feedback',
			[
				'module'	=> 'default',
				'controller'=> 'feedback',
				'action'	=> 'feedback'
			]
		);


		//Trang chủ
		$router->any('/',
			[
				'module'	=> 'default',
				'controller'=> 'home',
				'action'	=> 'index'
			]
		);


		$router->any('/admin',
			[
				'module'	=> 'admin',
				'controller'=> 'home',
				'action'	=> 'index'
			]
		);
		$router->any('/admin/user',
			[
				'module'	=> 'admin',
				'controller'=> 'user',
				'action'	=> 'index'
			]
		);
		$router->get('/admin/feedback',
			[
				'module'	=> 'admin',
				'controller'=> 'feedback',
				'action'	=> 'index'
			]
		);
		$router->any('/admin/products',
			[
				'module'	=> 'admin',
				'controller'=> 'products',
				'action'	=> 'index'
			]
		);
		$router->any('/admin/posts',
			[
				'module'	=> 'admin',
				'controller'=> 'posts',
				'action'	=> 'index'
			]
		);
		$router->get('/admin/resource',
			[
				'module'	=> 'admin',
				'controller'=> 'resource',
				'action'	=> 'index'
			]
		);
		$router->any('/admin/orders',
			[
				'module'	=> 'admin',
				'controller'=> 'orders',
				'action'	=> 'index'
			]
		);
		$this->routers = $router->routers;
	}
}