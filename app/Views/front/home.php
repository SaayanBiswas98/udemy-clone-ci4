<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <div>
        <div>  
        <div>Purchased</div>
    <div class='flex p-4 space-x-6'>
       <?php $i=0; foreach($courses as $course){?>
        <div>   
                <div><img  class='w-[100px] h-[100px]'src="<?php echo 'uploads/'.$course['image'];?>" alt=""></div>
                <div><?php echo $course['name'];?></div>
                <div>$<?php echo $course['price'];?></div>
                <?php echo $course['id'];?> 
                <progress id="file" value="<?php echo $course['completed'];?>" max="100"> 32% </progress>
                
                <a href="<?php echo base_url().'play/'.$course['id'];?>" class="">Go to video play</a>
                
       </div>
                <?php } ?>
        </div>
        
        </div>
       </div>
       <div>Unpurchased</div>
       <div class='flex space-x-7 py-4 px-3'>
       <?php $i=0; foreach($unpaids as $unpaid){?>
        <div>   
                <div><img  class='w-[100px] h-[100px]'src="<?php echo 'uploads/'.$unpaid['image'];?>" alt=""></div>
                <div><?php echo $unpaid['name'];?></div>
                <div>$<?php echo $unpaid['price'];?></div>
                <?php echo $unpaid['id'];?> 
                <a onclick="show()" href="<?php echo base_url().'play/'.$unpaid['id'];?>" class="">Go to video play</a>
                <a href="<?php echo 'pay/'.$unpaid['id'];?>" class=""><button class="bg-blue-800 rounded-lg p-2 text-white">Buy this course</button></a>
       </div>
                <?php } ?>
    </div>

    </div>
    </div>
    </div>
    <script>
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
    function show(){
        Toastify({
      text: "Item removed from cart! "+`${search.name}`,
      duration: 3000, // Duration in milliseconds
      gravity: "top", // Toast position: 'top', 'center', 'bottom'
      position: "right", // Toast position: 'left', 'center', 'right'
      backgroundColor: "#f7797d", // Background color
    }).showToast();
    }
</script>
</body>
</html>