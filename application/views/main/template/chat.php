<style>
.adiv {
    background: #04CB28;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    font-size: 12px;
    height: 46px
}
.chat-btn {
    position: fixed;
    right: 40px;
    bottom: 40px;
    cursor: pointer
}

.chat-btn .close {
    display: none
}

.chat-btn i {
    transition: all 0.9s ease
}

#check:checked~.chat-btn i {
    display: block;
    pointer-events: auto;
    transform: rotate(180deg)
}

#check:checked~.chat-btn .comment {
    display: none
}

.chat-btn i {
    font-size: 22px;
    color: #fff !important
}

.chat-btn {
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
    background-color: #ffc107;
    color: #fff;
    font-size: 15px;
    border: none;
    box-shadow: 2px 2px 10px #1716165e;
    z-index: 1;
}

.wrapper {
    position: fixed;
    right: 20px;
    bottom: 100px;
    width: 300px;
    height: 400px;
    overflow: auto;
    background-color: #ffffff;
    border-radius: 5px;
    opacity: 0;
    transition: all 0.4s;
    z-index: 1;
    box-shadow: 5px 5px 20px black;
}

#check:checked~.wrapper {
    opacity: 1
}

.chat-form {
    display: block;
    position: relative;
    bottom: 0px;
    padding: 20px;
}

.chat-form input,
textarea,
button {
    margin-bottom: 10px;
    font-size: 15px;
}

.chat-form textarea {
    resize: none
}

.form-control:focus,
.btn:focus {
    box-shadow: none
}

#check {
    display: none !important
}

.card {
    width: 300px;
    border: none;
    border-radius: 15px
}

.chat {
    border: none;
    background: #E2FFE8;
    font-size: 10px;
    border-radius: 20px
}
</style>

<?php if (isset($_SESSION['id'])) { ?>
<input type="hidden" id="id_customer" value="<?= $_SESSION['id'] ?>">
<input type="checkbox" id="check"> <label class="chat-btn" for="check"> <i class="fa fa-commenting-o comment"></i></label>
<div class="wrapper">
<div class="d-flex justify-content-center">
    <div class="card">
        <div class="d-flex flex-row justify-content-between p-3 adiv text-white"> <span class="pb-3">Chat Admin</span></div>
            <div class="chat-group"></div>
            <div class="chat-form"> 
                <input type="hidden" id="id_customer" value="<?= $_SESSION['id'] ?>">
                <input type="hidden" id="timestamp" value="<?= now() ?>">
                <div class="form-group px-3"> <textarea class="form-control" id="pesan" rows="2" placeholder="Tulis pesan anda..."></textarea> </div>
                <button type="submit" id="send-chat" class="btn btn-success btn-block">Kirim Pesan</button> 
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $(document).on('click', '#send-chat', function() {
        var id_customer = $('#id_customer').val();
        var timestamp = $('#timestamp').val();
        var pesan = $('#pesan').val();
        $.ajax({
            url: "<?= base_url('c_chat/customer_chat') ?>",
            method: "POST",
            data: {
                id_customer: id_customer,
                timestamp: timestamp,
                pesan: pesan
            },
            success: function(data) {
                $('#check').prop('checked', false);
                $('#pesan').val('');
            } 
        });
    });

    $(document).on('click', '#check', function() {        
        $('.chat-group').empty();
        $.ajax({
            url: "<?= base_url('c_chat/customer_chat_by_id') ?>",
            method: "POST",
            data: {id_customer: $('#id_customer').val()},
            dataType: 'json',
            success: function(data) {
                $.each(data, function(index, item) {
                    if(item.id_admin != 0) {
                        $('.chat-group').append(`<div class="d-flex flex-row p-3"> <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="5">
                        <div class="chat mr-auto bg-black p-3"><span class="text-muted" id="text-admin">${item.pesan}</span></div>
                        </div>`)
                    }   
                    else if(item.id_admin == 0) {
                        $('.chat-group').append(`<div class="d-flex flex-row p-3"> 
                        <div class="chat ml-auto p-3"><span class="text-muted dot" id="text-admin">${item.pesan}</span></div>
                        </div>`)
                    }
                });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("error : " + textStatus);
            }
        });
    });
});
    
</script>

<?php } ?>