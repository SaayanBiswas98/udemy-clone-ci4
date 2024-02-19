<?php

namespace App\Controllers;
use App\Models\Chapter;
use App\Models\Courses;

class Videocontroller extends BaseController
{
    public function index(){
        return view('front/courses');
    }
    public function chapter_create(){
        return view('front/add-chapters');
    }
    public function courseview(){
        return view('front/courses');
    }
    public function course_create(){
        $model = new Courses();
        $name=$this->request->getPost('name');
        $description=$this->request->getPost('description');
        $price=$this->request->getPost('price');
        session()->set('course_name',$name);

        // Data to be inserted
        $imageFile = $this->request->getFile('image');

        // Move the uploaded file to the writable/uploads directory
        $newName = $imageFile->getRandomName();
        $imageFile->move(ROOTPATH . 'public/uploads', $newName);

        // Save the image path to the database
        $imagePath = 'uploads/' . $newName;
        $data = [
            'name' => $name,
            'description'=>$description,
            'image'=>$newName,
            'price'=>$price ,
            'purchased'=>'unpaid'
        ];
        $model->insert($data);
    }
    public function upload()
    {
        $model = new Chapter();
        $coursemodel=new Courses();
        $title=$this->request->getPost('title');
        $description=$this->request->getPost('description');
        $id=$this->request->getGet('id');
        $course_name=session()->get('course_name');
        $data=$coursemodel->where('name',$course_name)->first();
        $id=$data['id'];
        session()->set('id',$id);
        echo $id;
        // Data to be inserted
        
       
        if ($this->request->getMethod() === 'post' && $this->validate(['video' => 'uploaded[video]|max_size[video,1024000]'])) {
            $videoFile = $this->request->getFile('video');
            $newName = $videoFile->getRandomName();
            $videoFile->move(ROOTPATH . 'public/uploads', $newName);

            // Your logic after successful upload
            // e.g., save the file name in the database
        }
        if($title=='introduction'){
            $data = [
                'title' => $title,
                'description'=>$description,
                'video'=>$newName,
                'course_id'=>$id,
                'view_status'=>'open' 
            ];
        }else{
        $data = [
            'title' => $title,
            'description'=>$description,
            'video'=>$newName,
            'course_id'=>$id,
            'view_status'=>'' 
        ];
    }
        $model->insert($data);
        return redirect()->to('/chapter-create');
    }
    public function index_bar()
    {
        return view('progress_view');
    }

    public function updateProgress()
    {
        // Simulate progress update (you would replace this with actual processing logic)
        for ($i = 0; $i <= 100; $i += 10) {
            echo $i; // Send progress percentage
            sleep(1); // Simulate processing time
            ob_flush();
            flush();
        }
    }
    public function targetedvideo($id){
        $model=new chapter();
        $course=new Courses();
        $chapter=$model->where('id',$id)->first();
        $title=$chapter['title'];
        $video=$chapter['video'];
        session()->set('targeted_id',$id);
        $course=session()->get('course_name');
        $data['title']=$title;
        $data['video']=$video;
        $data['course']=$course;
        return view('front/show',$data);
    }
}