<?php
/**
 * 备份数据库的扩展类
*/
namespace org;

class Baksql {
    private $config=[];
    private $handler;
    private $tables = array();//需要备份的表
    private $begin; //开始时间
    private $error;//错误信息

    public function __construct($config) {
        $config['path']=ROOT_PATH . 'public' . DS .'static'. DS .'data/'; //默认目录
        $config["sqlbakname"]=date("Y-m-d_His",time()).".sql";//默认保存文件
        $config['hostport'] = $config['hostport'] ? $config['hostport'] : '3306';
        $this->config = $config;
        
        $this->begin = microtime(true);
        header("Content-type: text/html;charset=utf-8");
        $this->connect();
    } 
    //首次进行pdo连接
    private function connect() {
        try{
           $this->handler =new \PDO("{$this->config['type']}:host={$this->config['hostname']};port={$this->config['hostport']};dbname={$this->config['database']};",
                $this->config['username'],
                $this->config['password'], 
                array(
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$this->config['charset']};",
                    \PDO::ATTR_ERRMODE =>  \PDO::ERRMODE_EXCEPTION, 
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                )); 
        }catch (PDOException $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        
    }
     /**
     * 查询
     * @param string $sql
     * @return mixed
     */
    private function query($sql = '')
    {
        $stmt = $this->handler->query($sql);
        $stmt->setFetchMode(\PDO::FETCH_NUM);
        $list = $stmt->fetchAll();
        return $list;
    }
     /**
     * 获取全部表
     * @param string $dbName
     * @return array
     */
    private function get_dbtable($dbTable = '*') {
        
        // $sql = 'SHOW TABLES'; 这个语句会把视图也查询出来(edit by laya)

        $sql = "SELECT TABLE_NAME
                FROM information_schema.TABLES
                WHERE table_type = 'BASE TABLE'
                AND table_schema = DATABASE ();";
        $list = $this->query($sql);
        $tables = array();
        foreach ($list as $value)
        {   
            $tables[] = $value[0];
        }
        return $tables;        
    }

     /**
     * 获取全部视图
     * @param string $dbView
     * @return array
     * @auther laya
     * @date 2019-05-30
     */
    private function get_dbview($dbView = '*') {
        
        // $sql = 'SHOW TABLES'; 这个语句会把视图也查询出来(edit by laya)

        $sql = "SELECT TABLE_NAME
                FROM information_schema.TABLES
                WHERE table_type = 'VIEW'
                AND table_schema = DATABASE ();";
        $list = $this->query($sql);
        $views = array();
        foreach ($list as $value)
        {   
            $views[] = $value[0];
        }
        return $views;        
    }
    /**
     * 获取表定义语句
     * @param string $table
     * @return mixed
     */
    private function get_dbtable_head($table = '')
    {   
        // 获取表的构建语句ddl
        $sql = "SHOW CREATE TABLE `{$table}`";
        $ddl = $this->query($sql)[0][1] . ';';
        return $ddl;
    }
    /**
     * 获取视图定义语句
     * @param string $view
     * @return mixed
     * @auther laya
     * @date 2019-05-30
     */
    private function get_dbview_head($view = '')
    {   
        // 获取表的构建语句ddl
        $sql = "SHOW CREATE VIEW `{$view}`";
        $ddl = $this->query($sql)[0][1] . ';';
        return $ddl;
    }
    /**
     * 获取表数据
     * @param string $table
     * @return mixed
     */
    private function get_dbdata($table = '')
    {   
        // 下面注释掉的这几行都是多余的 (edit by laya)
        // $sql = "SHOW COLUMNS FROM `{$table}`";
        // $list = $this->query($sql);
        //字段
        // $columns = '';

        //需要返回的SQL
        $query = '';

        // foreach ($list as $value)
        // {
        //     $columns .= "`{$value[0]}`,";
        // }
        // $columns = substr($columns, 0, -1);

        $data = $this->query("SELECT * FROM `{$table}`");
        foreach ($data as $value)
        {
            $dataSql = '';
            foreach ($value as $v)
            {   
                // 改成判断是不是null，不然date类型的字段会被还原成0000-00-00 00:00:00 (edit by laya)
                if(!is_null($v)) {
                    // 用addslashes函数将反斜杠保留（不做此处理上传的图片还原后将不能显示 add by laya）
                    $v = addslashes($v);
                    $dataSql .= "'{$v}',";
                } else {
                    $dataSql .= "NULL,";
                }
            }
            $dataSql = substr($dataSql, 0, -1);
            $query .= "INSERT INTO `{$table}` VALUES ({$dataSql});\r\n";
        }
        return $query;
    }
    /**
     * 写入文件
     * @param array $tables
     * @param array $ddl
     * @param array $data
     */
    private function writeToFile($tables = array(), $ddl_table = array(), $data_table = array(), $views = array(), $ddl_view = array())
    {
        $str = "/*\r\n MySQL Database Backup Tools\r\n";
        $str .= "\r\n Source Host     : {$this->config['hostname']}:{$this->config['hostport']}\r\n";
        $str .=     " Source Type     : {$this->config['type']}\r\n";
        $str .=     " Source Database : {$this->config['database']}\r\n";
        $str .= "\r\n Date: " . date('Y-m-d H:i:s', time()) . "\r\n*/\r\n";
        $str .= "\r\nSET NAMES utf8mb4;\r\n";
        $str .= "SET FOREIGN_KEY_CHECKS = 0;\r\n\r\n";
        $i = 0;
        foreach ($tables as $table)
        {
            $str .= "-- ----------------------------\r\n";
            $str .= "-- Table structure for {$table}\r\n";
            $str .= "-- ----------------------------\r\n";
            $str .= "DROP TABLE IF EXISTS `{$table}`;\r\n";
            $str .= $ddl_table[$i] . "\r\n\r\n";
            $str .= "-- ----------------------------\r\n";
            $str .= "-- Records of {$table}\r\n";
            $str .= "-- ----------------------------\r\n";
            $str .= $data_table[$i] . "\r\n\r\n";
            $i++;
        }

        // 写入视图 - (add by laya)
        $j = 0;
        foreach ($views as $view)
        {
            $str .= "-- ----------------------------\r\n";
            $str .= "-- View structure for {$view}\r\n";
            $str .= "-- ----------------------------\r\n";
            $str .= "DROP VIEW IF EXISTS `{$view}`;\r\n";
            $str .= $ddl_view[$j] . "\r\n\r\n";
            $j++;
        }
              
        if(!file_exists($this->config['path'])){mkdir($this->config['path']);}
        return file_put_contents($this->config['path'].$this->config['sqlbakname'], $str) ? '备份成功!花费时间' . round(microtime(true) - $this->begin,2) . 'ms' : '备份失败!';
    }
    /**
     * 设置要备份的表
     * @param array $tables
     */
    private function setTables($tables = array())
    {
        if (!empty($tables) && is_array($tables))
        {
            //备份指定表
            $this->tables = $tables;
            $this->views = $views; // add by laya
        }
        else
        {
            //备份全部表
            $this->tables = $this->get_dbtable();
            $this->views = $this->get_dbview(); // add by laya
        }
    }
    /**
     * 备份
     * @param array $tables
     * @return bool
     */
    public function backup($tables = array())
    {
        //存储表定义语句的数组
        $ddl_table = array();
        $ddl_view = array();
        //存储数据的数组
        $data_table = array();
        $this->setTables($tables);
        if (!empty($this->tables))
        {
            foreach ($this->tables as $table)
            {
                $ddl_table[] = $this->get_dbtable_head($table);
                $data_table[] = $this->get_dbdata($table);
            }

            foreach ($this->views as $view)
            {
                $ddl_view[] = $this->get_dbview_head($view);
            }

            
            //开始写入
            return $this->writeToFile($this->tables, $ddl_table, $data_table, $this->views, $ddl_view);
        }
        else
        {
            $this->error = '数据库中没有表!';
            return false;
        }
    }
    /**
     * 错误信息
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    
    /**
     * 还原数据
     * @param array $tables
     * @return bool
     */
    public function restore($filename = '')
    {   
        // 还原前先备份
        $this->config["sqlbakname"]=date("Y-m-d_His",time())."还原前的备份.sql";
        $this->backup();
        $path=$this->config['path'].$filename;
        if (!file_exists($path))
        {
            $this->error('SQL文件不存在!');
            return false;
        }
        else
        {
            $sql = $this->parseSQL($path);
            //dump($sql);die;
            try
            {
                $this->handler->exec($sql);
                echo '还原成功!花费时间', round(microtime(true) - $this->begin,2) . 'ms';
            }
            catch (PDOException $e)
            {
                $this->error = $e->getMessage();
                return false;
            }
        }
    }
 
    /**
     * 解析SQL文件为SQL语句数组
     * @param string $path
     * @return array|mixed|string
     */
    private function parseSQL($path = '')
    {
        $sql = file_get_contents($path);
        $sql = explode("\r\n", $sql);
        //先消除--注释
        $sql = array_filter($sql, function ($data)
        {
            if (empty($data) || preg_match('/^--.*/', $data))
            {
                return false;
            }
            else
            {
                return true;
            }
        });
        $sql = implode('', $sql);
        //删除/**/注释
        $sql = preg_replace('/\/\*.*\*\//', '', $sql);

        
        return $sql;
    }
    /**
     * 下载备份
     * @param string $fileName
     * @return array|mixed|string
     */
    public function downloadFile($fileName) {
        $fileName=$this->config['path'].$fileName;
        if (file_exists($fileName)){
            ob_end_clean();
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Length: ' . filesize($fileName));
            header('Content-Disposition: attachment; filename=' . basename($fileName));
            readfile($fileName);
        }else{
            $this->error="文件有错误！";
        }

    }
    /**
     * 获取文件时间
     * @param string $file
     * @return string
     */
    private function getfiletime($file){
        $path=$this->config['path'].$file;
        $a = filemtime($path);
        $time = date("Y-m-d H:i:s", $a);
        return $time;
    }
    /**
     * 获取文件大小
     * @param string $file
     * @return string
     */
    private function getfilesize($file){
        $perms=stat($this->config['path'].$file);
        $size = $perms['size'];
        $a    = ['B', 'KB', 'MB', 'GB', 'TB'];
        $pos  = 0;
        while ($size >= 1024) {
            $size /= 1024;
            $pos++;
        }
        return round($size, 2). $a[$pos];
    }
    
    /**
     * 获取文件列表
     * @param string $Order 级别
     * @return array
     */
    public function get_filelist($Order = 0) {
        $FilePath=$this->config['path'];
        // print_r($FilePath);die;
        $FilePath = opendir($FilePath);
        // $FilePath = scandir($FilePath);
        $FileAndFolderAyy=array();
        $i=1;
        while (false !== ($filename = readdir($FilePath))) {
            if ($filename!="." && $filename!=".."){
                $i++;
                $FileAndFolderAyy[$i]['name'] = $filename;
                $FileAndFolderAyy[$i]['time'] = $this->getfiletime($filename);
                $FileAndFolderAyy[$i]['size'] = $this->getfilesize($filename);
            }
            
        }
        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }
    public function delfilename($filename){
        $path=$this->config['path'].$filename; 
        if (@unlink($path)) {return '删除成功';}
    }
}

?>