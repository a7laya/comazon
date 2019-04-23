<?php
namespace app\index\controller;
use think\Session;

class Base extends \think\Controller
{
        /* @var array $user 登录信息 */
        protected $user;

        /* @var string $route 当前控制器名称 */
        protected $controller = '';
    
        /* @var string $route 当前方法名称 */
        protected $action = '';
    
        /* @var string $route 当前路由uri */
        protected $routeUri = '';
    
        /* @var string $route 当前路由：分组名称 */
        protected $group = '';
    
        /* @var array $allowAllAction 登录验证白名单 */
        protected $allowAllAction = [
            // 登录页面
            'passport/signin',
        ];
    
        /* @var array $notLayoutAction 无需全局layout */
        protected $notLayoutAction = [
            // 登录页面
            'passport/signin',
        ];
    
        /**
         * 后台初始化
         */
        public function _initialize()
        {
            // 登录信息
            $this->user = Session::get('shop_user');
            // 当前路由信息
            $this->getRouteinfo();
            // // 验证登录
            // $this->checkLogin();
            // 全局layout
            $this->layout();
        }
    
        /**
         * 全局layout模板输出
         */
        protected function layout()
        {
            // // 验证当前请求是否在白名单
            // if (!in_array($this->routeUri, $this->notLayoutAction)) {
                // 输出到view
                $this->assign([
                    'shop_user' => $this->user ? $this->user : ['user' => ["username" => "请登录"]] ,                       // 登录信息
                ]);
            // }
        }
    
        /**
         * 解析当前路由参数 （分组名称、控制器名称、方法名）
         */
        protected function getRouteinfo()
        {
            // 控制器名称
            $this->controller = toUnderScore($this->request->controller());
            // 方法名称
            $this->action = $this->request->action();
            // 控制器分组 (用于定义所属模块)
            $groupstr = strstr($this->controller, '.', true);
            $this->group = $groupstr !== false ? $groupstr : $this->controller;
            // 当前uri
            $this->routeUri = $this->controller . '/' . $this->action;
        }
    
    
        /**
         * 验证登录状态
         */
        private function checkLogin()
        {
            // 验证当前请求是否在白名单
            if (in_array($this->routeUri, $this->allowAllAction)) {
                return true;
            }
            // 验证登录状态
            if (empty($this->store)
                || (int)$this->store['is_login'] !== 1
            ) {
                $this->redirect('passport/signin');
                return false;
            }
            return true;
        }
    
        /**
         * 返回封装后的 API 数据到客户端
         * @param int $code
         * @param string $msg
         * @param string $url
         * @param array $data
         * @return array
         */
        protected function renderJson($code = 1, $msg = '', $url = '', $data = [])
        {
            return compact('code', 'msg', 'url', 'data');
        }
    
        /**
         * 返回操作成功json
         * @param string $msg
         * @param string $url
         * @param array $data
         * @return array
         */
        protected function renderSuccess($msg = 'success', $url = '', $data = [])
        {
            return $this->renderJson(1, $msg, $url, $data);
        }
    
        /**
         * 返回操作失败json
         * @param string $msg
         * @param string $url
         * @param array $data
         * @return array
         */
        protected function renderError($msg = 'error', $url = '', $data = [])
        {
            return $this->renderJson(0, $msg, $url, $data);
        }
    
        /**
         * 获取post数据 (数组)
         * @param $key
         * @return mixed
         */
        protected function postData($key)
        {
            return $this->request->post($key . '/a');
        }
    

}