<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
</head>
<body>
    <!------------Header------------->
    <div class="w-full flex h-[70px] px-3 py-4 justify-between items-center">
        <div class="">
            <?php echo $course['name'];?>
        </div>
        <div class="flex space-x-5 ">
            <div class="">Exit</div>
            <img src="https://yt3.googleusercontent.com/8sm3pG_G_2h28wPMWXClvrouOELVQTwtgOsV-9qB6DffXMA9ab9sUvoDDSka-Z_x1v4k3QKM1g=s900-c-k-c0x00ffffff-no-rj" alt="" class=" rounded-full w-8 h-8"/>
        </div>
    </div>
    <!----------Header ends----->
    <div class="px-3 py-4 flex">
        <div class="w-[300px] h-[560px]">
            <div class="">
                <?php if(empty($status)){?>
                <?php foreach($chapters as $chapter){?>
                <div>
                    <?php echo $chapter['view_status']=='open' ? '🔓':'🔒';?>
                    <a href="<?php echo base_url().'targetedvideo/'.$chapter['id'];?>"><?php echo $chapter["title"];?></div></a>
                <?php }  ?>
                <?php }?>
            </div>
        </div>
        <div class="p-4 mb-8">
                <div class="mb-4">
  <video id="player" class="video-js"
    controls preload="auto" width="440" height="264"
    poster="">
  <source src="<?php echo base_url('uploads/'.$videos['video']);?>" type="video/mp4">
</video>
                </div>
</div>
         </div>
    </div>
    <script src='https://vjs.zencdn.net/7.4.1/video.js'></script>
    <script>
	// You can use either a string for the player ID (i.e., `player`), 
	// or `document.querySelector()` for any selector
    const player = videojs('player');
const trackingPoint = 10;
let totalTime = 0;
let tempTotalTime = 0;
let startTime = 0;

player.on('pause', function () {
  totalTime += tempTotalTime;
});

player.on('play', function () {
  startTime = player.currentTime();
});

player.on('timeupdate', function () {
  if (player.paused()) {
    return;
  }
  let currentTime = player.currentTime();
  tempTotalTime = currentTime - startTime;
  let tmptotalTime = totalTime + tempTotalTime;
  let playbackRate = tmptotalTime / player.duration() * 100;
  console.log(Math.floor(playbackRate) + ' %');
});

function played(id){
    alert('clicked');
    alert(id);
    let url='<?php echo base_url('async');?>';
    $.ajax({
        url:url,
        method:'POST',
        dataType:'json',
        data:{id:id},
        success:function(response){
            console.log(response);
        }
    })
}
</script>
</body>
</html>