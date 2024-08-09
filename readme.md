# Aplikasi CRUD Company Profile
![enter image description here](https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white)![enter image description here](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)![enter image description here](https://img.shields.io/badge/CSS-239120?&style=for-the-badge&logo=css3&logoColor=white)![alt text](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)

Aplikasi Pemesan Tiket Wisata merupakan aplikasi pemesanan tiket wisata sederhana yang di bangun menggunakan **PHP** dan **MySQL**.

## Struktur Folder
Berikut ini merupakan Struktur Folder dari Tugas6.
```
📦ujian_jwd  
 ┣ 📂admin  
 ┃ ┣ 📜about.php  
 ┃ ┣ 📜galeri.php  
 ┃ ┣ 📜home.php  
 ┃ ┣ 📜service.php
 ┃ ┣ 📜team.php
 ┃ ┣ 📜wisata.php
 ┣ 📂assets  
 ┃ ┣ 📂css  
 ┃ ┃ ┣ 📜bootstrap-grid.css  
 ┃ ┃ ┣ 📜bootstrap-grid.css.map  
 ┃ ┃ ┣ 📜bootstrap-grid.min.css  
 ┃ ┃ ┣ 📜bootstrap-grid.min.css.map  
 ┃ ┃ ┣ 📜bootstrap-grid.rtl.css  
 ┃ ┃ ┣ 📜bootstrap-grid.rtl.css.map  
 ┃ ┃ ┣ 📜bootstrap-grid.rtl.min.css  
 ┃ ┃ ┣ 📜bootstrap-grid.rtl.min.css.map  
 ┃ ┃ ┣ 📜bootstrap-reboot.css  
 ┃ ┃ ┣ 📜bootstrap-reboot.css.map  
 ┃ ┃ ┣ 📜bootstrap-reboot.min.css  
 ┃ ┃ ┣ 📜bootstrap-reboot.min.css.map  
 ┃ ┃ ┣ 📜bootstrap-reboot.rtl.css  
 ┃ ┃ ┣ 📜bootstrap-reboot.rtl.css.map  
 ┃ ┃ ┣ 📜bootstrap-reboot.rtl.min.css  
 ┃ ┃ ┣ 📜bootstrap-reboot.rtl.min.css.map  
 ┃ ┃ ┣ 📜bootstrap-utilities.css  
 ┃ ┃ ┣ 📜bootstrap-utilities.css.map  
 ┃ ┃ ┣ 📜bootstrap-utilities.min.css  
 ┃ ┃ ┣ 📜bootstrap-utilities.min.css.map  
 ┃ ┃ ┣ 📜bootstrap-utilities.rtl.css  
 ┃ ┃ ┣ 📜bootstrap-utilities.rtl.css.map  
 ┃ ┃ ┣ 📜bootstrap-utilities.rtl.min.css  
 ┃ ┃ ┣ 📜bootstrap-utilities.rtl.min.css.map  
 ┃ ┃ ┣ 📜bootstrap.css  
 ┃ ┃ ┣ 📜bootstrap.css.map  
 ┃ ┃ ┣ 📜bootstrap.min.css  
 ┃ ┃ ┣ 📜bootstrap.min.css.map  
 ┃ ┃ ┣ 📜bootstrap.rtl.css  
 ┃ ┃ ┣ 📜bootstrap.rtl.css.map  
 ┃ ┃ ┣ 📜bootstrap.rtl.min.css  
 ┃ ┃ ┣ 📜bootstrap.rtl.min.css.map  
 ┃ ┃ ┣ 📜dashboard.css  
 ┃ ┃ ┣ 📜dashboard.rtl.css  
 ┃ ┃ ┗ 📜signin.css
 ┃ ┣ 📂img  
 ┃ ┣ 📂js  
 ┃ ┃ ┣ 📜bootstrap.bundle.js  
 ┃ ┃ ┣ 📜bootstrap.bundle.js.map  
 ┃ ┃ ┣ 📜bootstrap.bundle.min.js  
 ┃ ┃ ┣ 📜bootstrap.bundle.min.js.map  
 ┃ ┃ ┣ 📜bootstrap.esm.js  
 ┃ ┃ ┣ 📜bootstrap.esm.js.map  
 ┃ ┃ ┣ 📜bootstrap.esm.min.js  
 ┃ ┃ ┣ 📜bootstrap.esm.min.js.map  
 ┃ ┃ ┣ 📜bootstrap.js  
 ┃ ┃ ┣ 📜bootstrap.js.map  
 ┃ ┃ ┣ 📜bootstrap.min.js  
 ┃ ┃ ┣ 📜bootstrap.min.js.map  
 ┃ ┃ ┗ 📜dashboard.js  
 ┃ ┣ 📂vendor  
 ┃ ┃ ┗ 📂jquery-mask  
 ┃ ┃ ┃ ┗ 📜jquery-mask.min.js  
 ┃ ┃
 ┣ 📂config  
 ┃ ┣ 📜conn.php  
 ┃ ┗ 📜function.php  
 ┣ 📂process  
 ┃ ┣ 📜process.php  
 ┃ ┣ 📜galeri.php  
 ┃ ┣ 📜service.php  
 ┃ ┣ 📜team.php  
 ┃ ┣ 📜view_about.php
 ┃ ┣ 📜view_galeri.php
 ┃ ┣ 📜view_service.php
 ┃ ┣ 📜view_team.php
 ┃ ┣ 📜view_wisata.php 
 ┣ 📂uploads  
 ┃ ┗ 📂wisata  
 ┃ ┃ ┣ 📂cover  
 ┃ ┃ ┃ ┣ 📜Gunung Botak-20220728123151.jpeg  
 ┃ ┃ ┃ ┣ 📜Pantai Pasir Putih-20220728123226.jpeg  
 ┃ ┃ ┃ ┣ 📜Pintu Angin-20220728123246.jpeg  
 ┃ ┃ ┃ ┗ 📜Raja Ampat-20220728221710.jpeg  
 ┃ ┃ ┗ 📂gallery  
 ┃ ┃ ┃ ┗ 📜Galeri File-20220728194533.jpeg  
 ┣ ┃ ┗ 📂about
 ┃ ┃ ┗ 📂team
 ┃ 📂views  
 ┃ ┣ 📜daftar_harga.php
 ┃ ┣ 📜daftar_servis.php
 ┃ ┣ 📜detail_about.php
 ┃ ┣ 📜detail_galeri.php
 ┃ ┣ 📜detail_team.php
 ┃ ┣ 📜detail_wisata.php
 ┃ ┗ 📜home.php  
 ┣ 📜admin.php  
 ┣ 📜akun.php  
 ┣ 📜index.php  
 ┣ 📜login.php  
 ┣ 📜logout.php  
 ┗ 📜ujian_jwd.sql
```

## Prasyarat

* XAMP : PHP >= 8.0.0


## Penggunaan

Pastikan **XAMP** sudah berjalan, kemudian tuliskan **url** berikut pada browser.
```
http://localhost/ujian_jwd/index.php
```

## HASIL PROJECT

![image](https://github.com/user-attachments/assets/4dcd4d82-4875-4b6d-b8b2-04959a85f0e3)
![image](https://github.com/user-attachments/assets/531e397c-7eb4-451a-b2b3-38c6d47daf16)
![image](https://github.com/user-attachments/assets/bb30f6af-c918-4fe4-8ecb-309532fadd5c)
![image](https://github.com/user-attachments/assets/f89dafaa-0a22-402c-adf6-cbb8562568e1)
![image](https://github.com/user-attachments/assets/0355727f-ad51-4c8a-8455-5cfe2235c734)
![image](https://github.com/user-attachments/assets/c8462e97-ea55-4a73-bc7e-b1c53602cbc7)
![image](https://github.com/user-attachments/assets/c379c46b-c9d1-4a78-8c37-7b2369c93612)
![image](https://github.com/user-attachments/assets/76b1148b-c4ce-4f4c-908a-565cd505ae7d)
![image](https://github.com/user-attachments/assets/5e144f1c-27f3-4b96-b08f-088589c0cd04)
![image](https://github.com/user-attachments/assets/9d97787e-d6c3-4024-8a86-52e7b25cbafe)
![image](https://github.com/user-attachments/assets/6bf05eb5-030b-4984-91c4-6410a316d1be)
![image](https://github.com/user-attachments/assets/af92b55c-4715-40ee-891f-185ea4bc4e86)
![image](https://github.com/user-attachments/assets/176a4a35-c2b1-44a5-9959-13fefd79fcda)
![image](https://github.com/user-attachments/assets/9afce7e9-c836-44e6-865e-d8234d02757a)













