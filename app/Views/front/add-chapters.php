<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
  } );
  </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
<div class="w-full h-[80px] flex bg-sky-600 px-4 py-2 justify-between items-center ">
        <div class="m-2">
            <img class='w-[100px] h-12' src="https://logowik.com/content/uploads/images/udemy-new-20212512.jpg" class='w-[100px] p-2 h-[100px]' alt="">
        </div>
        <div class="px-4 cursor-pointer py-4 flex justify-center items-center space-x-4">
            <a href="" class="">Teacher Mode</a>
            <img class='w-8 h-8 rounded-full' src="https://yt3.googleusercontent.com/8sm3pG_G_2h28wPMWXClvrouOELVQTwtgOsV-9qB6DffXMA9ab9sUvoDDSka-Z_x1v4k3QKM1g=s900-c-k-c0x00ffffff-no-rj" alt="">
        </div>
    </div>
    <main class="flex w-full">
        <div class="bg-sky-100 cursor-pointer w-[200px] p-4  py-4 h-[560px]">
            <div class="flex items-center space-x-3 mt-[10px] mb-[10px]"><div><i class="fa fa-dashboard"></i></div><div>Browse</div></div>
            <div class="flex space-x-3"><div><i class="fa fa-address-card-o"></i></div><div>Dashboard</div></div>
        </div>
        <div class='p-3 px-5'>
       <h1>Chapters creation</h1>
       <h3>Customise your chapters</h3>
       <div class='p-3 py-5'>
       <div>
       <form method="post" action="<?= base_url('/upload-video'); ?>" enctype="multipart/form-data">
       <label for="title">Title</label>
       </div>
       <div>
       <input type='text' name='title' placeholder="Enter course Title">
       </div>
       <div class='mt-[20px]'>
       <label for="description">Description</label>
       </div>
       <div>
       <input type='text' name='description' placeholder="Enter course description">
       </div>
       <div class='mt-[20px]'>
       <label for="image">Video</label>
       </div>
       <div>
        <input type="file" name="video">
        <button type="submit">Upload Video</button>
        </form>

       </div>
       </div>
       </div>
       <section>
        <div>
            <h1>Chapters</h1>

       </section>
    </main>
</body>

<style>
    .draggable-menu {
    height: 100px; /* Set a fixed height or max-height for scrolling */
    overflow-y: auto; /* Enable vertical scrolling */
    border: 1px solid #ccc; /* Add borders for visualization */
    padding: 10px;
}

.menu-item {
    padding: 8px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
    margin-bottom: 5px;
}
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 200px; }
  #sortable li { margin: 0; padding:1.4rem; padding-left: 1.5em; font-size: 0.6em; height: 20px; }
  #sortable li span {text-align:center; position: absolute; margin-left:0; }
</style>
</html>