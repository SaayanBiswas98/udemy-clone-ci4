<?php

namespace App\Controllers;
use App\Models\Courses;
use App\Models\Purchased;
use App\Models\Chapter;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function browse(){
        $model=new Courses();
        $purchased=new Purchased();
        $chapter=new Chapter();
        //$completed=$chapters['track'];
        $completed=0;
        $courses=$model->where('purchased','paid')->findAll();
        
        $unpaids=$model->where('purchased','unpaid')->findAll();
        //$status=$arr['status'];
        
        $chapters=$chapter->where('view_status','open')->where('course_id',$id)->findAll();
        //$percent=$chapter['track'];
        foreach ($chapters as &$chapter) {
            // Dummy calculation: completion percentage = (completed_tasks / total_tasks) * 100
            $completed+=$chapter['track'];// Replace with your actual calculation
            //$completed=$completed/100;
        }
        
        //$data['percent']=$percent;
        //$data['status']=$status;
        $data['courses']=$courses;
        foreach ($courses as &$course) {
            // $course['completion_percentage'] = $completed/100;
             $id=$course['id'];
             $course['completed']=$completed;
             // Replace with your actual calculation
        }

        
        //$data['paid']=$paid;
        $data['unpaids']=$unpaids;
        $data['completed']=$completed;
        //$data['percent']=$percent;
        
        //print_r($paid);
        //print_r($courses[0]['id']);
        //print_r($name);
        print_r($completed);
        print_r($id);
        return view('front/home',$data);
    }
    public function course_purchased(){
        $model=new Courses();
        $purchased=new Purchased();
        $courses=$purchased->where('status','paid')->first();
        $image=$courses['name'];
        $images=$model->where('name',$image)->first();
        session()->set('id',$courses['id']);
        //$status=$arr['status'];
        //$data['status']=$status;
        $data['courses']=$courses;
        $data['image']=$images;
        
        return view('front/purchased_course',$data);
    }
    public function play($id){
        $model=new Courses();
        $chapter=new Chapter();
        $purchased=new Purchased();
        $course=$model->where('id',$id)->first();
        $name=$course['name'];
        //$all=$chapter->where('course_id',$id)->findAll();
        $chapters=$chapter->where('course_id',$id)->findAll();
        session()->set('id',$course['id']);
        session()->set('course_name',$name);
        session()->set('has_played','played');
        $play=session()->get('has_played');
        //print_r($chapters);
        print_r($course['id']);
        $db = \Config\Database::connect();
                // Example update query
        //$fetch=$model->where('id',$id)->findAll();

        $sql='UPDATE chapters 
        SET play_status= "played" WHERE id = '.$id;
        $db->query($sql);
        $videos=$chapter->where('course_id',$id)->first();

        $purchase=$purchased->where('name',$name)->first();
        $data['chapters']=$chapters;
        $data['course']=$course;
        $status=0;
        //$status=$purchase['status'];
        
            $data['videos']=$videos;
            $open=$chapter->where('view_status','open')->where('course_id',$id)->findAll();
            $all=$chapter->where('view_status','')->where('course_id',$id)->findAll();
            //$data['intro']=$intro;
            $data['open']=$open;
            $data['all']=$all;
            //$data['percent']=$percent;
            
            $data['status']=$status;
            return view('front/video',$data);
    }
    public function list(){
        $purchase=new Courses();
        $courses=$purchase->findAll();
        $data['courses']=$courses;
        return view('front/course_list',$data);

    }
    public function edit($id){
        $model=new Courses();
        $course=$model->where('id',$id)->findAll();
        $data['course']=$course;
        $chapter=new Chapter();
        $chapters=$chapter->where('course_id',$id)->findAll();
        $data['chapters']=$chapters;
        return view('front/edit',$data);
    }
    public function ajax(){
        $model=new Courses();
        $purchase=new Purchased();
        $id=$this->request->getPost('id');
        echo $id;

    }
    public function async(){
        $id=$this->request->getPost('id');
        echo $id;
        $model=new Chapter();
        $targetedchap=$model->where('id',$id)->findAll();
        session()->set('id',$id);
        echo json_encode($targetedchap);
        $db = \Config\Database::connect();
                // Example update query
        //$fetch=$model->where('id',$id)->findAll();

        $sql='UPDATE chapters 
        SET play_status= "played" WHERE course_id= '.$id;
        $db->query($sql);

    }
    public function sent(){
        $y=$this->request->getPost('y');
        $chapter=new Chapter();
        $id=session()->get('targeted_id');
        $db = \Config\Database::connect();
        session()->set('track',$y);
                // Example update query
        //$fetch=$model->where('id',$id)->findAll();

        $sql='UPDATE chapters 
        SET track= '.$y.' WHERE id= '.$id;
        $db->query($sql);
        
    }
}
