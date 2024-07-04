<?php
ob_start();
session_start();
include "db.php";


if ($_GET['notsil'] == "ok") {

    $not_id = $_GET['id'];


    $not = $db->prepare("DELETE FROM notlar where not_id=:id");

    $sil = $not->execute(
        [
            'id' => $not_id
        ]

    );

    if ($sil) {
        header("Location:../index.php?notsil=ok");
        exit;
    } else {
        header("Location:../index.php?notsil=no");
        exit;
    }

}


if (isset($_POST['kullanici_kayit'])) {

    $email = htmlspecialchars($_POST['email']);

    $passwordone = md5($_POST['passwordone']);

    $passwordtwo = md5($_POST['passwordtwo']);

    $ad = htmlspecialchars($_POST['ad']);




    if ($passwordone == $passwordtwo) {

        $password = $passwordone;



        $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");

        $kullanicisor->execute(
            [
                'mail' => $email
            ]
        );

        $kullanicivarmi = $kullanicisor->rowCount();



        if ($kullanicivarmi <= 0) {

            $kullanici = $db->prepare("INSERT INTO kullanici set
            
            
            kullanici_mail=:mail,
            kullanici_password=:password,
            kullanici_yetki=:yetki,
            kullanici_ad=:ad

            
            ");


            $kaydet = $kullanici->execute([
                'mail' => $email,
                'password' => $password,
                'yetki' => 1,
                'ad' => $ad,

            ]);




            if ($kaydet) {

                header("Location:../register.php?durum=basarili");
                exit;
            } else {

                header("Location:../register.php?durum=basarisiz");
                exit;
            }



        } else {

            header("Location:../register.php?durum=varolankullanici");
            exit;

        }


    } else {
        header("Location:../register.php?durum=farklisifre");
        exit;
    }




}




if (isset($_POST['adminhesapkayit'])) {

    $email = htmlspecialchars($_POST['email']);

    $passwordone = md5($_POST['passwordone']);

    $passwordtwo = md5($_POST['passwordtwo']);

    $ad = htmlspecialchars($_POST['ad']);
    $yetki = htmlspecialchars($_POST['kullanici_yetki']);


    if ($passwordone == $passwordtwo) {

        $password = $passwordone;



        $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");

        $kullanicisor->execute(
            [
                'mail' => $email
            ]
        );

        $kullanicivarmi = $kullanicisor->rowCount();



        if ($kullanicivarmi <= 0) {

            $kullanici = $db->prepare("INSERT INTO kullanici set
            
            
            kullanici_mail=:mail,
            kullanici_password=:password,
            kullanici_yetki=:yetki,
            kullanici_ad=:ad

            
            ");


            $kaydet = $kullanici->execute([
                'mail' => $email,
                'password' => $password,
                'yetki' => $yetki,
                'ad' => $ad,

            ]);




            if ($kaydet) {

                header("Location:../login.php?durum=basarili");
                exit;
            } else {

                header("Location:../register.php?durum=basarisiz");
                exit;
            }



        } else {

            header("Location:../register.php?durum=varolankullanici");
            exit;

        }


    } else {
        header("Location:../register.php?durum=farklisifre");
        exit;
    }


}



if (isset($_POST['kullanici_giris'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = md5($_POST['password']);
    $beni_hatirla = isset($_POST['beni_hatirla']) ? $_POST['beni_hatirla'] : '';

    if ($password && $email != " ") {
        $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password");
        $kullanicisor->execute([
            'mail' => $email,
            'password' => $password,
        ]);
        $say = $kullanicisor->rowCount();

        if ($say >= 1) {
            $password = $_POST['password'];

            $_SESSION['kullanici'] = $email;

            $_SESSION['pass'] = $password;


            if ($beni_hatirla == "on") {
                setcookie("email", $email, strtotime("+1 day"), "/", "", false, true); // Örnek olarak HttpOnly ve Secure flag'leri eklenmiştir
                setcookie("pass", $password, strtotime("+1 day"), "/", "", false, true); // Örnek olarak HttpOnly ve Secure flag'leri eklenmiştir
            } else {
                setcookie("email", $email, strtotime("-1 day"), "/", "", false, true); // Örnek olarak HttpOnly ve Secure flag'leri eklenmiştir
                setcookie("pass", $password, strtotime("-1 day"), "/", "", false, true); // Örnek olarak HttpOnly ve Secure flag'leri eklenmiştir

            }

            header("Location:../index.php?durum=ok");
            exit;



        } else {
            header("Location:../login.php?durum=no");
            exit;
        }
    }
}


if ($_GET['pagesil'] == "ok") {

    $id = $_GET['id'];

    $pagesil = $db->prepare("DELETE FROM pages WHERE id=:id");


    $silindi = $pagesil->execute(

        [
            'id' => $id
        ]
    );


    if ($silindi) {


        header("Location:../index.php?silinme=ok");
        exit;


    } else {
        header("Location:../index.php?silinme=no");
        exit;

    }

}



if ($_GET['kullanicisil']) {

    $id = $_GET['id'];

    $kullanicisil = $db->prepare("DELETE FROM kullanici WHERE kullanici_id=:id");


    $silindi = $kullanicisil->execute(

        [
            'id' => $id
        ]


    );


    if ($silindi) {


        header("Location:../tables.php?silinme=ok");
        exit;


    } else {
        header("Location:../tables.php?silinme=no");
        exit;

    }






}


if (isset($_POST['tumnotlarsil'])) {



    $tumnotlarsil = $db->prepare("DELETE FROM notlar");

    $silindi = $tumnotlarsil->execute();



    if ($silindi) {

        header("Location:../index.php?durum=allnotesdeleted");
        exit;
    }







}




if (isset($_POST['not_ekle'])) {

    $description = $_POST['not_description'];

    $name = $_POST['not_name'];
    /* 
        $company = $_POST['not_company']; */

    $date = $_POST['not_date'];

    $sira = $_POST['not_sira'];

    $kullanici_id = $_POST['not_kullanici'];

    $parent = $_POST['option_kul_id'];

    $kisi = $_POST['not_kisi'];


    $not = $db->prepare("INSERT INTO notlar
    (not_name, not_description, /* not_company,  not_sira, */ not_date, not_kullanici , not_kisi , not_parent)
    VALUES
    (:not_name, :not_description, /* :not_company,  :not_sira, */ :not_date, :not_kullanici , :not_kisi , :not_parent)");

    $kaydet = $not->execute(
        array(
            'not_name' => $name,
            'not_description' => $description,
            /* 'not_company' => $company, */
            /* 'not_sira' => $sira, */
            'not_date' => $date,
            'not_kullanici' => $kullanici_id,
            'not_parent' => $parent,
            'not_kisi' => $kisi
        )
    );

    if ($kaydet) {
        header("Location:../index.php?not=ok");
        exit;
    } else {
        header("Location:../index.php?not=no");
        exit;
    }

}



if ($_GET['guvenlicikis'] == "ok") {
    unset($_SESSION['kullanici']);


    header("Location:../login.php");
    exit;

}




if (isset($_POST['notyapildi'])) {
    $tests = $_POST['test'];

    foreach ($tests as $test) {
        $notlar = $db->prepare("SELECT not_id FROM notlar WHERE not_id = :test_id");
        $notlar->execute(['test_id' => $test]);
        $not = $notlar->fetch();

        if ($not) {
            $notyap = $db->prepare("UPDATE notlar SET not_yapildi = :yapildi, not_yapankisi=:yapankisi WHERE not_id = :test_id ");
            $update = $notyap->execute([
                'yapildi' => 1,
                'test_id' => $not['not_id'],
                'yapankisi' => $_POST['not_yapankisi']

            ]);

            if (!$update) {
                header("Location:../index.php?notguncelle=no");
                exit;
            }
        }
    }

    header("Location:../index.php?notguncelle=ok");
    exit;
}



if (isset($_POST['siteekle'])) {



    if (!empty($_POST['page_yetkiliiki'] && !empty($_POST['page_yetkiliiki']))) {

        $sql = $db->prepare("INSERT INTO pages SET
    

        page_name=:page_name,
        page_musteribir=:page_musteribir,
        page_yetkili=:page_yetkili,
        page_yetkilitel=:page_yetkilitel,
        page_musteriiki=:page_musteriiki,
        page_yetkiliiki=:page_yetkiliiki,
        page_yetkiliikitel=:page_yetkiliikitel
    
    
        
        ");

        $insert = $sql->execute([
            'page_name' => $_POST['page_name'],
            'page_yetkili' => $_POST['page_yetkili'],
            'page_musteribir' => $_POST['page_musteribir'],
            'page_yetkilitel' => $_POST['page_yetkilitel'],
            'page_musteriiki' => $_POST['page_musteriiki'],
            'page_yetkiliiki' => $_POST['page_yetkiliiki'],
            'page_yetkiliikitel' => $_POST['page_yetkiliikitel']
        ]);
    } else {

        $sql = $db->prepare("INSERT INTO pages SET
    

        page_name=:page_name,
        page_yetkili=:page_yetkili,
        page_musteribir=:page_musteribir,
        page_yetkilitel=:page_yetkilitel
    
    
        
        ");

        $insert = $sql->execute([
            'page_name' => $_POST['page_name'],
            'page_yetkili' => $_POST['page_yetkili'],
            'page_musteribir' => $_POST['page_musteribir'],
            'page_yetkilitel' => $_POST['page_yetkilitel'],
        ]);

    }






    if ($insert) {

        header("Location:../index.php?sitekle=ok");
        exit;


    } else {

        header("Location:../index.php?sitekle=no");
        exit;
    }





}


if (isset($_POST['useroptionschange'])) {

    $userid = $_POST["kullanici_id"];


    $sql = $db->prepare("UPDATE kullanici SET kullanici_ad = :kullanici_ad , kullanici_yetki=:kullanici_yetki WHERE kullanici_id = :id");

    $save = $sql->execute([

        "id" => $userid,
        "kullanici_ad" => $_POST['kullanici_ad'],
        "kullanici_yetki" => $_POST['kullanici_yetki']


    ]);



    if ($save) {

        header("Location:../tables.php?durum=successfulchange");
        exit;

    } else {


        header("Location:../tables.php?durum=error");
        exit;

    }





}



?>