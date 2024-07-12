<?php

    //membuat koneksi ke database
    $koneksi = mysqli_connect('localhost', 'root', '', 'poliklinik');

    //menangkap variabel yang diketik oleh user
    $cari   = $_GET['search'];


    //jika tidak ada data yang dicari
    if($cari == null){
        echo "data kosong";
    
    //jika ada data yang dicari
    }else{
        //cari sesuai kata yang diketik
        $data   = mysqli_query($koneksi, "select * from obat where nama_obat like '%$cari%'");

        $list = array();
        $key=0;

        //lakukan looping untuk menampilkan data yang sesuai
        while($row = mysqli_fetch_assoc($data)) {
            // $list[$key]['text'] = $row['nama_obat']; 
            // $list[$key]['text'] = $row['harga']; 
            $list[$key]['text'] = $row['id'];
            $list[$key]['id'] = $row['id'];
            $key++;
        }

        //data ditampilkan dalam bentuk json
        echo json_encode($list);
    }