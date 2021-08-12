<?php

function upload_image($path, $input_field) {
    //Membuat CI Instance 
    $CI = &get_instance();

    //Konfigurasi library upload
    $config['upload_path'] = $FCPATH.'assets/images/'.$path;
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['encrypt_name'] = TRUE;
    $config['max_size'] = 5024;

    $CI->load->library('upload', $config);
    if(!$CI->upload->do_upload($input_field)){
        return $CI->upload->display_errors();
    } else {
        //Ambil data dari gambar yang diupload
        $img = $CI->upload->data();
        
        //Cek resolusi dari image
        if($img['image_width'] != 1300 || $img['image_height'] != 900){
            //Tentukan resolusi baru untuk gambar yang telah diupload
            $config_baru['image_library'] = 'gd2';
            $config_baru['source_image'] = $img['full_path'];
            $config_baru['maintain_ratio'] = FALSE;
            $config_baru['width'] = 1300;
            $config_baru['height'] = 750;
            $config_baru['new_image'] = $img['full_path'];
            
                //Memberi watermark pada gambar
                $config_baru['wm_text'] = 'Milik @tukunang_';
                $config_baru['wm_type'] = 'text';
                $config_baru['wm_padding'] = '15';
                $config_baru['wm_vrt_alignment'] = 'top';
                $config_baru['wm_hor_alignment'] = 'center';
                $config_baru['font_size'] = '40';
            

            //Resize image dengan library image_lib
            $CI->load->library('image_lib', $config_baru);
            $CI->image_lib->resize();
            $CI->image_lib->watermark();

            //Kembalikan nama gambar yang diupload
            return $img['file_name'];
        } else {
            return $img['file_name'];
        }
    }


}