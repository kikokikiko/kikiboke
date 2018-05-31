<?php
namespace app\index\controller;

use think\Controller; 

use app\common\model\Teacher;//1

class TeacherController extends Controller{  //2继承
	public function index()
	{
	   $teachers= model('Teacher')->getAllTeacher();
	  //$this->assign('teachers',$teachers);
      //return $this->fetch();
	   return $this->fetch('',['teachers'=>$teachers]);
	}
	public function hi()//index.html
	{
		return $this->fetch('test@test/hello');
	}
	public function add(){
		return $this->fetch();
	}
	public function save(){
		//模型实例化  字段赋值  save
		
		$data=[
			'name'=>'张三4',
			'username'=>'zhangsan4',
			'password'=>md5('123456'),
		];
/*		$teacher=new Teacher;
        $teacher->data($data);*/
       // $teacher=new Teacher($data);
       
		//$teacher->save();
		$teacher=new Teacher;
        $teacher->save($data);

		if($teacher->id){
			$this->success('增加成功',url('teacher/index'));
		}
		else{
			$this->error('失败');
		}
	}
}