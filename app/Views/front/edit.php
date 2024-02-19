<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
        #progressbar {
            width: 50%;
            margin-top: 30px;
        }
    </style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type='text/css' href="<?php echo base_url().'css/styles.css';?>">
</head>
<body>
    <div class="w-full h-[80px] flex bg-sky-600 px-4 py-2 justify-between items-center ">
        <div class="m-2">
            <img class='w-[100px] h-12' src="https://logowik.com/content/uploads/images/udemy-new-20212512.jpg" class='w-[100px] p-2 h-[100px]' alt="">
        </div>
        <div class="px-4 cursor-pointer py-4 flex justify-center items-center space-x-4">
            <a href="<?php echo base_url().'courses_list';?>" class="">Teacher Mode</a>
            <img class='w-8 h-8 rounded-full' src="https://yt3.googleusercontent.com/8sm3pG_G_2h28wPMWXClvrouOELVQTwtgOsV-9qB6DffXMA9ab9sUvoDDSka-Z_x1v4k3QKM1g=s900-c-k-c0x00ffffff-no-rj" alt="">
        </div>
    </div>
    <div class='flex'>
    <div class="bg-sky-100 cursor-pointer w-[200px] p-4  py-4 h-[560px]">
            <div class="flex items-center space-x-3 mt-[10px] mb-[10px]"><div><i class="fa fa-dashboard"></i></div><div>Browse</div></div>
            <div class="flex space-x-3"><div><i class="fa fa-address-card-o"></i></div><div>Dashboard</div></div>
        </div>
    <div>
    <main class="flex">
        <div class='p-2 ml-[20px]  flex space-x-5'>
            <div class='p-2 flex bg-white w-[180px] h-[50px] rounded-xl border-2 border-black'>
                <div><img class='w-[40px] h-[20px]' src="https://media.istockphoto.com/id/1489426820/vector/business-growth-chart-logo-with-arrow-bar-and-line-chart-diagram.jpg?s=612x612&w=0&k=20&c=6NH63NrBxJB5moBJDnvpR_wfvEzcifFmxqStbObZi14=" alt="" class="">
                </div>
                <div>Vlogging</div>
            </div>
            <div class='p-2 flex  bg-white w-[180px] h-[50px] rounded-xl border-2 border-black'>
            <div><img class='w-[40px] h-[20px]' src="https://t4.ftcdn.net/jpg/03/02/12/83/360_F_302128359_q6aCwgAvdYZBPF4XSwxXddLPE0h3Kor1.jpg" alt="" class="">
                </div>
                <div>Sports</div>
            </div>
        </div>
    </main>
    <div class='p-3 py-5'>
       <div>
       <form method="post" action="<?= base_url('/course-add'); ?>" enctype="multipart/form-data">
       <label for="name">Title</label>
       </div>
       <div>
       <input type='text' value='<?php echo $course[0]['name'];?>' name='name' placeholder="Enter course Title">
       </div>
       <div class='mt-[20px]'>
       <label for="description">Description</label>
       </div>
       <div>
       <input type='text' value='<?php echo $course[0]['description'];?>' name='description' placeholder="Enter course description">
       </div>
       <div class='mt-[20px]'>
       <label for="price">Price</label>
       </div>
       <div>
       <input type='text' value='<?php echo $course[0]['price'];?>' name='price' placeholder="Enter course description">
       </div>
       <div class='mt-[20px]'>
       <label for="image">Images</label>
       </div>
       <div>
       <input type='file' name='image' placeholder="Enter course image">
       <button type='submit'>Upload</button>
       </form>
       </div>
       </div>
       </div>
       <section>
        <div class="">
            chapters
            <a href="<?php echo base_url().'/add-chapters';?>" class="">Add Chapter</a>
            <?php foreach($chapters as $chapter){?>
                <?php echo $chapter['title'];?>
            <?php }?>
        </div>
    </scection>
  
    </div>
    </div>
    <script >
	$(function() {
        // Initialize progressbar
        $("#progressbar").progressbar({
            value: false // Start with no value
        });

        // AJAX request to update progress
        $.ajax({
            url: "<?php echo base_url('progress/updateProgress'); ?>",
            success: function(data) {
                // Update progress bar value based on response
                $("#progressbar").progressbar("option", "value", parseInt(data));
            }
        });
    });
</script>
</body>
</html>