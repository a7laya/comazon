<?php
namespace app\cb\model;
use traits\model\SoftDelete;
use think\Model;
use think\Session;
use think\Db;

/**
 * 管理员模型
 * Class User
 * @package app\store\model
 */
class User extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

   
    public function company()
    {
        return $this->belongsTo('Company');
    }

    /**
     * 管理员登录
     * @param $data：['username'=>xxxx, 'password'=>xxxxx]
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function login($data)
    {
        $user = self::useGlobalScope(false)->where([
            'username' => $data['username'],
            'password' => shop_hash($data['password'])
        ])->find();
        // 验证用户名密码是否正确
        if (isset($user)) {
            // 保存登录状态
            Session::set('session_admin', [
                'admin' => $user['username'],
                'is_login' => true,
                'user_id' => $user['user_id'],
                'company_id' => $user['company_id'],
                'role_id' => $user['role_id']
            ]);
            return true;
        } else {
            $this->error = '登录失败, 用户名或密码错误';
            return false;
        }
    }

     /**
     * 添加
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        // 开启事务
        Db::startTrans();
        try {
            if(isset($data['password']) ) {
                $data['password'] = shop_hash($data['password']);
            }
            $data['create_time'] = date('Y-m-d H:i:s');
            // 添加
            $this->allowField(true)->save($data);

            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
        }
        return false;
    }

    public function findEmail(array $data)
    {
        if (!$user = self::useGlobalScope(false)->where([
            'email' => $data['email']
        ])->find()) {
            return false;
        }
        return true;

    }

    public function findUsername(array $data)
    {   
        $username = $data['username'];
        if (!self::useGlobalScope(false)
        ->where('username', $username)->find()) 
        {
            return false;
        }
        return true;

    }

   

    /**
     * 信息
     * @param $user_id
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail($user_id)
    {
        return self::get($user_id);
    }

    /**
     * 更新当前信息
     * @param $data
     * @return bool
     */
    public function renew($data)
    {
        if ($data['password'] !== $data['repassword']) {
            $this->error = '确认密码不正确';
            return false;
        }
        // 更新信息
        if ($this->save([
                'username' => $data['username'],
                'password' => shop_hash($data['password']),
            ]) === false) {
            return false;
        }
        // 更新session
        Session::set('shop_user.user', [
            'user_id' => $this['user_id'],
            'username' => $data['username'],
        ]);
        return true;
    }


    public function tableData(array $arr)
    {  
        $company_id = Session::get('session_admin.company_id');
        $role_id = Session::get('session_admin.role_id');
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        if ('1' == $company_id && '0' == $role_id) {
            $data     = $this->where('username|user_id', 'like', "%{$keywords}%")
                ->where('user_id', '<>', '1')
                ->order('user_id desc')
                ->limit($arr['limit'])
                ->with('company')
                ->page($arr['page'])
                ->select();
            foreach($data as $d) { 
                $d['company_name'] = $d->company->company_name;
                $d['role'] = config('role.'.$d['role_id']);
                $d['meter_id'] = '0' == $d['meter_id'] ? config('meter_id.0') : $d['meter_id'];
            }
            $res['count'] = $this->where('user_id', '<>', '1')
                ->where('username|user_id', 'like', "%{$keywords}%")->count();
        } else if ('1' == $company_id && '1' == $role_id) {
            $data     = $this->where('username|user_id', 'like', "%{$keywords}%")
                ->where('user_id', '<>', '1')
                ->where('company_id', '<>', '1')
                ->order('user_id desc')
                ->limit($arr['limit'])
                ->with('company')
                ->page($arr['page'])
                ->select();
            foreach($data as $d) { 
                $d['company_name'] = $d->company->company_name;
                $d['role'] = config('role.'.$d['role_id']);
                $d['meter_id'] = '0' == $d['meter_id'] ? config('meter_id.0') : $d['meter_id'];
            }
            $res['count'] = $this->where('user_id', '<>', '1')
                ->where('company_id', '<>', '1')
                ->where('username|user_id', 'like', "%{$keywords}%")->count();
        } else {
            $data     = $this->where('username|user_id', 'like', "%{$keywords}%")
                ->where('user_id', '<>', '1')
                ->where('role_id', '>', $role_id)
                ->where(['company_id' => $company_id])
                ->order('user_id desc')  // 列表排序
                ->limit($arr['limit'])
                ->with('company')
                ->page($arr['page'])
                ->select();
            foreach($data as $d) { 
                $d['company_name'] = $d->company->company_name;
                $d['role'] = config('role.'.$d['role_id']);
                $d['meter_id'] = '0' == $d['meter_id'] ? config('meter_id.0') : $d['meter_id'];
            }  
            $res['count'] = $this->where('user_id', '<>', '1')
            ->where('role_id', '>', $role_id)
            ->where(['company_id' => $company_id])
            ->where('username|user_id', 'like', "%{$keywords}%")->count();
        }       
        $res['code']  = 0;
        $res['msg']   = '';

        $res['data']  = $data;
        return $res;
    }

    public function tableDataBlack(array $arr)
    {   
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data     = self::onlyTrashed()->where('username|email','like',"%{$keywords}%")
                    ->order('user_id desc')  // 商品列表排序
                    ->limit($arr['limit'])
                    ->page($arr['page'])
                    ->select();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = self::onlyTrashed()->where('username|email','like',"%{$keywords}%")->count();
        $res['data']  = $data;
        return $res;
    }

}
