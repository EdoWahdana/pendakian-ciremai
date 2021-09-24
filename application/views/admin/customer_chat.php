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
    width: 100%;
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

<div class="container">
    <a href="<?= base_url('c_dashboard/chat') ?>" class="btn btn-info btn-sm my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="chat-group">
            <?php foreach ($chat as $key => $value) { ?>
                    
                <?php if($value['id_admin'] != 0) { ?>
                    <div class="d-flex flex-row ml-auto p-3">
                        <div class="chat ml-auto p-3"><span class="text-muted dot" id="text-admin"><?= $value['pesan'] ?></span></div>
                    </div>
                <?php } else if($value['id_admin'] == 0) { ?>
                    <div class="d-flex flex-row p-3 mr-3"> <img src="<?= base_url('assets/icon/user-green.png') ?> " width="50" height="5">
                        <div class="chat mr-auto bg-black p-3"><span class="text-muted" id="text-user"><?= $value['pesan'] ?></span></div>
                    </div>
                <?php } ?>
            <?php } ?>
            </div>
            <form action="<?= base_url('c_chat/admin_chat') ?>" method="post">
                <div class="chat-form"> 
                    <input type="hidden" name="id_customer" value="<?= $_GET['id_customer'] ?>">
                    <input type="hidden" name="id_admin" value="<?= $_SESSION['id'] ?>">
                    <div class="form-group px-3"> <textarea class="form-control" name="pesan" rows="2" placeholder="Tulis pesan anda..."></textarea> </div>
                    <button type="submit" id="send-chat" class="btn btn-success btn-block">Kirim Pesan</button> 
                </div>
            </form>
        </div>
    </div>
</div>
