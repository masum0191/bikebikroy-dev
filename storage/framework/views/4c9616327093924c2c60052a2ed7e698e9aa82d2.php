<?php $__env->startSection('page-style'); ?>
<style>

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="chat-section">
    <div class="container">
        <div class="main-chat">
            <div class="chat_box">
          <div class="head">
              <div class="user">
                  <div class="avatar">
                      <img src="https://picsum.photos/g/40/40" />
                  </div>
                  <div class="name"><?php echo e(Auth::user()->fullname); ?></div>
              </div>
              <ul class="bar_tool">

                  <li><span class="alink"><i class="fas fa-ellipsis-v"></i></span></li>
              </ul>
          </div>
          <div class="body chat-body">
              <?php $__currentLoopData = @$Chatinfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if(Auth::id() !==@$chat->user_id): ?>
              <div class="incoming">
                <div class="bubble">
                    <p class="mb-0"><?php echo e(@$chat->message); ?></p>
                </div> <br>
            </div>
           <?php else: ?>
              <div class="outgoing">
                  <div class="bubble">
                      <p class="mb-0"><?php echo e(@$chat->message); ?></p>
                  </div> <br>
              </div>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          <div class="foot">
            <input type="text" placeholder="Type message here.." class="form-control message mb-0" id="message">
                
          </div>
      </div>
        </div>
    </div>
</section>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script>
      $(document).ready(function () {
              $("#message").focus();
        $('#message').keypress((e) => {
    if (e.which === 13) {
    if ($("#message").val() == '') {
                  alert('Please Type some Text');
                    $("#message").focus();
                    return false;

                }
                $.ajax({

                    url: url + '/user/chattext',
                    method: "POST",
                    type: "POST",
                    data: {
                        message: $("#message").val(),
                        chatuser_id: '<?php echo e($Bikeinfo->user_id); ?>',
                    },
                    success: function(d) {

                        if (d) {
                            $("#message").focus();
                           location.reload();

                        } else {
                            $.each(d.errors, function(key, value) {
                                $("#collection").focus();
                                toastr.warning(value);
                            });
                        }

                    },
                    error: function(d) {

                        alert('Message Not Send');
                    }
                });

  }
});
      
});


</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/user/chat/singlechat.blade.php ENDPATH**/ ?>