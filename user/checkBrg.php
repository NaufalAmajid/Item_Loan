<?php
    require_once "config.inc.php";

    if($_GET['checkJml']){
        $idBrg = $_GET['id'];
        $jml = $_GET['jml'] == "" ? 0 : $_GET['jml'];

        $query = $mysqli->query("SELECT stok_brg FROM barang WHERE id_brg = '$idBrg'");
        $row = $query->fetch_assoc();
        $jmlBrg = $row['stok_brg'];

        if($jmlBrg == $jml || $jml > $jmlBrg){
            $res = array(
                'status' => 'error',
                'msg' => 'Jumlah barang tidak mencukupi'
            );
        }else{
            if($jml == 0){
                $res = array(
                    'status' => 'warning',
                    'msg' => 'Jumlah barang tidak boleh 0'
                );
            }else{
                $res = array(
                    'status' => 'success',
                    'msg' => 'Jumlah barang mencukupi'
                );
            }
        }

        echo json_encode($res);
    }
?>