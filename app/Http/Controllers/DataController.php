<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\giangvien;
use App\sinhvien;
use App\khoa;
use App\lop;
use App\detai;
use App\sukien;
use App\source;
use App\thamkhao;
use App\tiendo;
use App\thanhvien;
use App\nghiemthu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Session;

class DataController extends Controller
{
    public function defaultdata(){
        user::insert([ 
            ['email' => 'admin@gmail.com','level'=>1,'password'=> bcrypt('hung0403')],
            ['email' => 'daoleduyhung04@gmail.com','level'=>1,'password'=> bcrypt('hung0403')],
            
            ['email' => 'phanthanhson@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'vuvancanh@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'hoangvanlong@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenvanhoan@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'caomanhhung@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'tranthanhtung@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'phungbatam@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'tranthimyhien@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'dinhvanthe@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'dovantuan@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenthanhhai@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'phamduytrung@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'truongphiho@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'lethithanhhang@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'trantrunghieu@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'longthilanh@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            
            ['email' => 'honhathoang@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenlephong@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenanh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'caotrungthanh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'phamnhatthinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'vunhathoang@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenthituyetminh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'hoangthimyduyen@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'lethithuhien@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenhuyhoang@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'tranquoctoan@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'phungthevinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenthinin@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'phanquangnam@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'phamninhdung@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'vugiabao@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'lenhatnam@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyencongthanh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'vuducanh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenngochien@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'daoleduyhung@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'vantanlong@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'truongngocanh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'tranhoanganh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nhugiahoang@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyendinhquy@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'huynhthihuyentrinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenthitramy@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'tranphuoctan@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenquanglinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenngocthang@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'trinhphuctam@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'vutanhung@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenhuukhang@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'hoangtienthanh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'dangngocthang@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'levantung@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenngocthien@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'phamcongdanh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'tranvinhkhang@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'yhuybol@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyentrongnghia@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'hoangthienphu@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'doquangminh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'lekhalinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenhunghao@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyengiakhanhtung@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'hoangtrananhtuan@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'daotuthuan@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'dangquocbao@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'diepthaibao@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'tranthithanhkieu@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'lythibichlien@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'chaubavinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'tranminhan@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'lyphunam@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'hoanghuyhung@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenquangbaominh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenvanduy@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenthanhcong@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyencaohalinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'phamvanmanh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenphuongquynh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'lungthilinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
        ]);
        khoa::insert([
            ['tenkhoa' => 'CNTT'],
            ['tenkhoa' => 'ĐTVT']
        ]);
        lop::insert([
            ['tenlop' => 'ĐHCN1','idkhoa'=>1],
            ['tenlop' => 'ĐHCN2D','idkhoa'=>1],
            ['tenlop' => 'ĐHCN3A','idkhoa'=>1],
            ['tenlop' => 'ĐHCN3B','idkhoa'=>1],
            ['tenlop' => 'ĐHCN3C','idkhoa'=>1],
            ['tenlop' => 'ĐHVT3A','idkhoa'=>2],
            ['tenlop' => 'ĐHVT3B','idkhoa'=>2],
            ['tenlop' => 'ĐHVT3C','idkhoa'=>2]
        ]);
        giangvien::insert([
            ['ho' => 'Phan Thanh','ten'=>'Sơn','idusers'=>3,'idkhoa'=>1,'hocvi'=>'Tiến sĩ','gioitinh'=>1],
            ['ho' => 'Vũ Văn','ten'=>'Cảnh','idusers'=>4,'idkhoa'=>1,'hocvi'=>'Thạc sĩ','gioitinh'=>1],
            ['ho' => 'Hoàng Văn','ten'=>'Long','idusers'=>5,'idkhoa'=>1,'hocvi'=>'Kỹ sư','gioitinh'=>1],
            ['ho' => 'Nguyễn Văn','ten'=>'Hoàn','idusers'=>6,'idkhoa'=>1,'hocvi'=>'Thạc sĩ','gioitinh'=>1],
            ['ho' => 'Cao Mạnh','ten'=>'Hùng','idusers'=>7,'idkhoa'=>1,'hocvi'=>'Thạc sĩ','gioitinh'=>1],
            ['ho' => 'Trần Thanh','ten'=>'Tùng','idusers'=>8,'idkhoa'=>1,'hocvi'=>'Thạc sĩ','gioitinh'=>1],
            ['ho' => 'Phùng Bá','ten'=>'Tâm','idusers'=>9,'idkhoa'=>1,'hocvi'=>'Thạc sĩ','gioitinh'=>1],
            ['ho' => 'Trần Thị Mỹ','ten'=>'Hiền','idusers'=>10,'idkhoa'=>1,'hocvi'=>'Thạc sĩ','gioitinh'=>2],
            ['ho' => 'Đinh Văn','ten'=>'Thế','idusers'=>11,'idkhoa'=>1,'hocvi'=>'Thạc sĩ','gioitinh'=>1],
            ['ho' => 'Đỗ Văn','ten'=>'Tuấn','idusers'=>12,'idkhoa'=>1,'hocvi'=>'Thạc sĩ','gioitinh'=>1],
            ['ho' => 'Nguyễn Thanh','ten'=>'Hải','idusers'=>13,'idkhoa'=>1,'hocvi'=>'Thạc sĩ','gioitinh'=>1],
            ['ho' => 'Phạm Duy','ten'=>'Trung','idusers'=>14,'idkhoa'=>1,'hocvi'=>'Kỹ sư','gioitinh'=>1],
            ['ho' => 'Trương Phi','ten'=>'Hồ','idusers'=>15,'idkhoa'=>1,'hocvi'=>'Kỹ sư','gioitinh'=>1],
            ['ho' => 'Lê Thị Thanh','ten'=>'Hằng','idusers'=>16,'idkhoa'=>2,'hocvi'=>'Thạc sĩ','gioitinh'=>2],
            ['ho' => 'Trần Trung','ten'=>'Hiếu','idusers'=>17,'idkhoa'=>2,'hocvi'=>'Tiến sĩ','gioitinh'=>1],
            ['ho' => 'Long Thị','ten'=>'Lanh','idusers'=>18,'idkhoa'=>2,'hocvi'=>'Kỹ sư','gioitinh'=>2]
        ]);
        sinhvien::insert([
            ['ho' => 'Hồ Nhật','ten'=>'Hoàng','idusers'=>19,'idlop'=>1,'gioitinh'=>1],
            ['ho' => 'Nguyễn Lê','ten'=>'Phong','idusers'=>20,'idlop'=>2,'gioitinh'=>1],
            ['ho' => 'Nguyễn','ten'=>'Anh','idusers'=>21,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Cao Trung','ten'=>'Thành','idusers'=>22,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Phạm Nhật','ten'=>'Thịnh','idusers'=>23,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Vũ Nhật','ten'=>'Hoàng','idusers'=>24,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Nguyễn Thị Tuyết','ten'=>'Minh','idusers'=>25,'idlop'=>4,'gioitinh'=>2],
            ['ho' => 'Hoàng Thị Mỹ','ten'=>'Duyên','idusers'=>26,'idlop'=>4,'gioitinh'=>2],
            ['ho' => 'Lê Thị Thu','ten'=>'Hiền','idusers'=>27,'idlop'=>4,'gioitinh'=>2],
            ['ho' => 'Nguyễn Huy','ten'=>'Hoàng','idusers'=>28,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Trần Quốc','ten'=>'Toản','idusers'=>29,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Phùng Thế','ten'=>'Vinh','idusers'=>30,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Nguyễn Thị','ten'=>'Nin','idusers'=>31,'idlop'=>5,'gioitinh'=>2],
            ['ho' => 'Phan Quang','ten'=>'Nam','idusers'=>32,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Phạm Ninh','ten'=>'Dung','idusers'=>33,'idlop'=>3,'gioitinh'=>2],
            ['ho' => 'Vũ Gia','ten'=>'Bảo','idusers'=>34,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Lê Nhật','ten'=>'Nam','idusers'=>35,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Nguyễn Công','ten'=>'Thành','idusers'=>36,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Vũ Đức','ten'=>'Anh','idusers'=>37,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Nguyễn Ngọc','ten'=>'Hiền','idusers'=>38,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Đào Lê Duy','ten'=>'Hùng','idusers'=>39,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Văn Tấn','ten'=>'Long','idusers'=>40,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Trương Ngọc','ten'=>'Anh','idusers'=>41,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Trần Hoàng','ten'=>'Anh','idusers'=>42,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Nhữ Gia','ten'=>'Hoàng','idusers'=>43,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Nguyễn Đình','ten'=>'Quỳ','idusers'=>44,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Huỳnh Thị Huyền','ten'=>'Trinh','idusers'=>45,'idlop'=>5,'gioitinh'=>2],
            ['ho' => 'Nguyễn Thị Trà','ten'=>'My','idusers'=>46,'idlop'=>5,'gioitinh'=>2],
            ['ho' => 'Trần Phước','ten'=>'Tân','idusers'=>47,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Nguyễn Quang','ten'=>'Linh','idusers'=>48,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Nguyễn Ngọc','ten'=>'Thắng','idusers'=>49,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Trịnh Phúc','ten'=>'Tâm','idusers'=>50,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Vũ Tấn','ten'=>'Hùng','idusers'=>51,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Nguyễn Hữu','ten'=>'Khang','idusers'=>52,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Hoàng Tiến','ten'=>'Thành','idusers'=>53,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Đàng Ngọc','ten'=>'Thắng','idusers'=>54,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Lê Văn','ten'=>'Tùng','idusers'=>55,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Nguyễn Ngọc','ten'=>'Thiên','idusers'=>56,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Phạm Công','ten'=>'Danh','idusers'=>57,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Trần Vĩnh','ten'=>'Khang','idusers'=>58,'idlop'=>4,'gioitinh'=>1],
            ['ho' => "Y' Huy",'ten'=>"B'ol",'idusers'=>59,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Nguyễn Trọng','ten'=>'Nghĩa','idusers'=>60,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Hoàng Thiên','ten'=>'Phú','idusers'=>61,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Đỗ Quang','ten'=>'Minh','idusers'=>62,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Lê Khả','ten'=>'Lĩnh','idusers'=>63,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Nguyễn Hùng','ten'=>'Hào','idusers'=>64,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Nguyễn Gia Khánh','ten'=>'Tùng','idusers'=>65,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Hoàng Trần Anh','ten'=>'Tuấn','idusers'=>66,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Đào Tứ','ten'=>'Thuận','idusers'=>67,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Đặng Quốc','ten'=>'Bảo','idusers'=>68,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Diệp Thái','ten'=>'Bảo','idusers'=>69,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Trần Thị Thanh','ten'=>'Kiều','idusers'=>70,'idlop'=>3,'gioitinh'=>2],
            ['ho' => 'Lý Thị Bích','ten'=>'Liên','idusers'=>71,'idlop'=>3,'gioitinh'=>2],
            ['ho' => 'Châu Bá','ten'=>'Vinh','idusers'=>72,'idlop'=>3,'gioitinh'=>1],
            ['ho' => 'Trần Minh','ten'=>'Ân','idusers'=>73,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Lý Phú','ten'=>'Nam','idusers'=>74,'idlop'=>5,'gioitinh'=>1],
            ['ho' => 'Hoàng Huy','ten'=>'Hùng','idusers'=>75,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Nguyễn Quang Bảo','ten'=>'Minh','idusers'=>76,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Nguyễn Văn','ten'=>'Duy','idusers'=>77,'idlop'=>4,'gioitinh'=>1],
            ['ho' => 'Nguyễn Thành','ten'=>'Công','idusers'=>78,'idlop'=>4,'gioitinh'=>1], 
            ['ho' => 'Nguyễn Cao Hà','ten'=>'Linh','idusers'=>79,'idlop'=>6,'gioitinh'=>2],
            ['ho' => 'Phạm Văn','ten'=>'Mạnh','idusers'=>80,'idlop'=>7,'gioitinh'=>1],
            ['ho' => 'Nguyễn Phương','ten'=>'Quỳnh','idusers'=>81,'idlop'=>8,'gioitinh'=>2],
            ['ho' => 'Lung Thị','ten'=>'Linh','idusers'=>82,'idlop'=>6,'gioitinh'=>2]
        ]);
        detai::insert([
            ['tendetai' => 'Nghiên cứu lập trình WPF trong xây dựng ứng dụng học tiếng Anh',
            'tomtat'=>'Nghiên cứu lập trình WPF trong xây dựng ứng dụng học tiếng Anh',
            'noidung'=>'Nghiên cứu lập trình WPF trong xây dựng ứng dụng học tiếng Anh',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 19,'idgvhd'=> 1],
            ['tendetai' => 'Tìm hiểu hệ mã nguồn mở Laravel và ứng dụng xây dựng trang thương mại điện tử',
            'tomtat'=>'Tìm hiểu hệ mã nguồn mở Laravel và ứng dụng xây dựng trang thương mại điện tử',
            'noidung'=>'Tìm hiểu hệ mã nguồn mở Laravel và ứng dụng xây dựng trang thương mại điện tử',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 20,'idgvhd'=> 1],
            ['tendetai' => 'Xây dựng ứng dụng di động cho chợ nông sản Khánh Hòa trực tuyến',
            'tomtat'=>'Xây dựng ứng dụng di động cho chợ nông sản Khánh Hòa trực tuyến',
            'noidung'=>'Xây dựng ứng dụng di động cho chợ nông sản Khánh Hòa trực tuyến',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 21,'idgvhd'=> 1],
            ['tendetai' => 'Xây dựng website hỗ trợ tiêu thụ nông sản sạch dựa trên nền tảng Laravel',
            'tomtat'=>'Xây dựng website hỗ trợ tiêu thụ nông sản sạch dựa trên nền tảng Laravel',
            'noidung'=>'Xây dựng website hỗ trợ tiêu thụ nông sản sạch dựa trên nền tảng Laravel',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 22,'idgvhd'=> 1],
            ['tendetai' => 'Ứng dụng Laravel để xây dựng website quản lý  phim',
            'tomtat'=>'Ứng dụng Laravel để xây dựng website quản lý  phim',
            'noidung'=>'Ứng dụng Laravel để xây dựng website quản lý  phim',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 23,'idgvhd'=> 1],
            ['tendetai' => 'Xây dựng hệ thống quản lý nhân sự Bệnh viện Phụ Sản Hà Nội',
            'tomtat'=>'Xây dựng hệ thống quản lý nhân sự Bệnh viện Phụ Sản Hà Nội',
            'noidung'=>'Xây dựng hệ thống quản lý nhân sự Bệnh viện Phụ Sản Hà Nội',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 24,'idgvhd'=> 2],
            ['tendetai' => 'Xây dựng phần mềm quản lý sinh viên theo tín chỉ trường Đại học Nha Trang',
            'tomtat'=>'Xây dựng phần mềm quản lý sinh viên theo tín chỉ trường Đại học Nha Trang',
            'noidung'=>'Xây dựng phần mềm quản lý sinh viên theo tín chỉ trường Đại học Nha Trang',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 25,'idgvhd'=> 2],
            ['tendetai' => 'Xây dựng phần mềm quản lý chuyến bay tại sân bay Tuy Hòa',
            'tomtat'=>'Xây dựng phần mềm quản lý chuyến bay tại sân bay Tuy Hòa',
            'noidung'=>'Xây dựng phần mềm quản lý chuyến bay tại sân bay Tuy Hòa',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 26,'idgvhd'=> 2],
            ['tendetai' => 'Nghiên cứu, xây dựng quy trình kiểm thử phần mềm sử dụng công cụ Postman.',
            'tomtat'=>'Nghiên cứu, xây dựng quy trình kiểm thử phần mềm sử dụng công cụ Postman.',
            'noidung'=>'Nghiên cứu, xây dựng quy trình kiểm thử phần mềm sử dụng công cụ Postman.',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 27,'idgvhd'=> 2],
            ['tendetai' => 'Triển khai giả lập phòng thí nghiệm an ninh mạng với EVE-NG',
            'tomtat'=>'Triển khai giả lập phòng thí nghiệm an ninh mạng với EVE-NG',
            'noidung'=>'Triển khai giả lập phòng thí nghiệm an ninh mạng với EVE-NG',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 28,'idgvhd'=> 2],
            ['tendetai' => 'Xây dựng hệ thống quản lý vật tư, trang thiết bị trường Sĩ quan thông tin',
            'tomtat'=>'Xây dựng hệ thống quản lý vật tư, trang thiết bị trường Sĩ quan thông tin',
            'noidung'=>'Xây dựng hệ thống quản lý vật tư, trang thiết bị trường Sĩ quan thông tin',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 29,'idgvhd'=> 2],
            ['tendetai' => 'Xây dựng phần mềm quản lý trung tâm tiếng anh SUN',
            'tomtat'=>'Xây dựng phần mềm quản lý trung tâm tiếng anh SUN',
            'noidung'=>'Xây dựng phần mềm quản lý trung tâm tiếng anh SUN',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 30,'idgvhd'=> 2],
            ['tendetai' => 'Ứng dụng từ điển Anh - Việt trên nền tảng Android',
            'tomtat'=>'Ứng dụng từ điển Anh - Việt trên nền tảng Android',
            'noidung'=>'Ứng dụng từ điển Anh - Việt trên nền tảng Android',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 31,'idgvhd'=> 2],
            ['tendetai' => 'Nghiên cứu công nghệ Ảo hóa Hyper-V ứng dụng vào xây dựng hệ thống ảo hóa tại phòng máy chủ của trường ĐHTTLL',
            'tomtat'=>'Nghiên cứu công nghệ Ảo hóa Hyper-V ứng dụng vào xây dựng hệ thống ảo hóa tại phòng máy chủ của trường ĐHTTLL',
            'noidung'=>'Nghiên cứu công nghệ Ảo hóa Hyper-V ứng dụng vào xây dựng hệ thống ảo hóa tại phòng máy chủ của trường ĐHTTLL',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 32,'idgvhd'=> 3],
            ['tendetai' => 'Nghiên cứu hệ mật RSA và ứng dụng',
            'tomtat'=>'Nghiên cứu hệ mật RSA và ứng dụng',
            'noidung'=>'Nghiên cứu hệ mật RSA và ứng dụng',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 33,'idgvhd'=> 3],
            ['tendetai' => 'Các phương pháp giấu tin trong ảnh',
            'tomtat'=>'Các phương pháp giấu tin trong ảnh',
            'noidung'=>'Các phương pháp giấu tin trong ảnh',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 34,'idgvhd'=> 3],
            ['tendetai' => 'Nghiên cứu thiết bị Firewall FortiGate và ứng dụng.',
            'tomtat'=>'Nghiên cứu thiết bị Firewall FortiGate và ứng dụng.',
            'noidung'=>'Nghiên cứu thiết bị Firewall FortiGate và ứng dụng.',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 35,'idgvhd'=> 3],
            ['tendetai' => 'Nghiên cứu thuật toán AES và ứng dụng ',
            'tomtat'=>'Nghiên cứu thuật toán AES và ứng dụng ',
            'noidung'=>'Nghiên cứu thuật toán AES và ứng dụng ',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 36,'idgvhd'=> 3],
            ['tendetai' => 'Triển khai giải pháp giả lập thiết bị mạng với Unetlab-EVE',
            'tomtat'=>'Triển khai giải pháp giả lập thiết bị mạng với Unetlab-EVE',
            'noidung'=>'Triển khai giải pháp giả lập thiết bị mạng với Unetlab-EVE',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 37,'idgvhd'=> 3],
            ['tendetai' => 'Nghiên cứu công nghệ  Web và xây dựng hệ thống tra cứu Tour du lịch tại Nha Trang Khánh Hòa',
            'tomtat'=>'Nghiên cứu công nghệ  Web và xây dựng hệ thống tra cứu Tour du lịch tại Nha Trang Khánh Hòa',
            'noidung'=>'Nghiên cứu công nghệ  Web và xây dựng hệ thống tra cứu Tour du lịch tại Nha Trang Khánh Hòa',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 38,'idgvhd'=> 4],
            ['tendetai' => 'Xây dựng ứng dụng quản lý và tra cứu danh mục các công trình nghiên cứu khoa học',
            'tomtat'=>'Xây dựng ứng dụng quản lý và tra cứu danh mục các công trình nghiên cứu khoa học',
            'noidung'=>'Xây dựng ứng dụng quản lý và tra cứu danh mục các công trình nghiên cứu khoa học',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 39,'idgvhd'=> 4],
            ['tendetai' => 'Xây dựng ứng dụng website quản lý cây giống nông nghiệp trên địa bàn tỉnh Khánh Hòa',
            'tomtat'=>'Xây dựng ứng dụng website quản lý cây giống nông nghiệp trên địa bàn tỉnh Khánh Hòa',
            'noidung'=>'Xây dựng ứng dụng website quản lý cây giống nông nghiệp trên địa bàn tỉnh Khánh Hòa',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 40,'idgvhd'=> 4],
            ['tendetai' => 'Xây dựng cổng thông tin điện tử Hội liên hiệp phụ nữ tỉnh Khánh Hòa',
            'tomtat'=>'Xây dựng cổng thông tin điện tử Hội liên hiệp phụ nữ tỉnh Khánh Hòa',
            'noidung'=>'Xây dựng cổng thông tin điện tử Hội liên hiệp phụ nữ tỉnh Khánh Hòa',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 41,'idgvhd'=> 4],
            ['tendetai' => 'Xây dựng ứng dụng quản lý khách sạn Star City Nha Trang trên Android ',
            'tomtat'=>'Xây dựng ứng dụng quản lý khách sạn Star City Nha Trang trên Android ',
            'noidung'=>'Xây dựng ứng dụng quản lý khách sạn Star City Nha Trang trên Android ',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 42,'idgvhd'=> 4],
            ['tendetai' => 'Xây dựng ứng dụng quản lý nhà hàng NAGIKI trên công nghệ ASP ',
            'tomtat'=>'Xây dựng ứng dụng quản lý nhà hàng NAGIKI trên công nghệ ASP ',
            'noidung'=>'Xây dựng ứng dụng quản lý nhà hàng NAGIKI trên công nghệ ASP ',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 43,'idgvhd'=> 4],
            ['tendetai' => 'Xây dựng ứng dụng quản lý bán hàng trên Android',
            'tomtat'=>'Xây dựng ứng dụng quản lý bán hàng trên Android',
            'noidung'=>'Xây dựng ứng dụng quản lý bán hàng trên Android',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 44,'idgvhd'=> 4],
            ['tendetai' => 'Nghiên cứu giải pháp xây dựng phần mềm quản lý thư viện trên phần mềm nguồn mở Dspace tại trung tâm học liệu trường ĐHTTLL',
            'tomtat'=>'Nghiên cứu giải pháp xây dựng phần mềm quản lý thư viện trên phần mềm nguồn mở Dspace tại trung tâm học liệu trường ĐHTTLL',
            'noidung'=>'Nghiên cứu giải pháp xây dựng phần mềm quản lý thư viện trên phần mềm nguồn mở Dspace tại trung tâm học liệu trường ĐHTTLL',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 45,'idgvhd'=> 4],
            ['tendetai' => 'Xây dựng phần mềm quản lý cung ứng vật tư của công ty TM',
            'tomtat'=>'Xây dựng phần mềm quản lý cung ứng vật tư của công ty TM',
            'noidung'=>'Xây dựng phần mềm quản lý cung ứng vật tư của công ty TM',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 46,'idgvhd'=> 5],
            ['tendetai' => 'Xây dựng hệ thống nhận dạng chữ viết tay sử dụng công nghệ xử lý ảnh',
            'tomtat'=>'Xây dựng hệ thống nhận dạng chữ viết tay sử dụng công nghệ xử lý ảnh',
            'noidung'=>'Xây dựng hệ thống nhận dạng chữ viết tay sử dụng công nghệ xử lý ảnh',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 47,'idgvhd'=> 5],
            ['tendetai' => 'Nghiên cứu mô hình mạng phân lớp, ứng dụng vào xây dựng hệ thống mạng cho doanh nghiệp',
            'tomtat'=>'Nghiên cứu mô hình mạng phân lớp, ứng dụng vào xây dựng hệ thống mạng cho doanh nghiệp',
            'noidung'=>'Nghiên cứu mô hình mạng phân lớp, ứng dụng vào xây dựng hệ thống mạng cho doanh nghiệp',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 48,'idgvhd'=> 6],
            ['tendetai' => 'Nghiên cứu tường lửa pfSense triển khai một số dịch vụ chủ yếu trên môi trường ảo hóa.',
            'tomtat'=>'Nghiên cứu tường lửa pfSense triển khai một số dịch vụ chủ yếu trên môi trường ảo hóa.',
            'noidung'=>'Nghiên cứu tường lửa pfSense triển khai một số dịch vụ chủ yếu trên môi trường ảo hóa.',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 49,'idgvhd'=> 6],
            ['tendetai' => 'Xây dựng hệ thống phòng chống xâm nhập (IPS) trên nàn tảng Snort',
            'tomtat'=>'Xây dựng hệ thống phòng chống xâm nhập (IPS) trên nàn tảng Snort',
            'noidung'=>'Xây dựng hệ thống phòng chống xâm nhập (IPS) trên nàn tảng Snort',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 50,'idgvhd'=> 6],
            ['tendetai' => 'Nghiên cứu một số phương pháp phát hiện mã độc, virus đa hình và ứng dụng',
            'tomtat'=>'Nghiên cứu một số phương pháp phát hiện mã độc, virus đa hình và ứng dụng',
            'noidung'=>'Nghiên cứu một số phương pháp phát hiện mã độc, virus đa hình và ứng dụng',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 51,'idgvhd'=> 6],
            ['tendetai' => 'Nghiên cứu tìm hiểu về hệ thống tường lửa, ứng dụng cài đặt hệ thống tường lửa ASA trên nền tảng ảo hóa',
            'tomtat'=>'Nghiên cứu tìm hiểu về hệ thống tường lửa, ứng dụng cài đặt hệ thống tường lửa ASA trên nền tảng ảo hóa',
            'noidung'=>'Nghiên cứu tìm hiểu về hệ thống tường lửa, ứng dụng cài đặt hệ thống tường lửa ASA trên nền tảng ảo hóa',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 52,'idgvhd'=> 6],
            ['tendetai' => 'Nghiên cứu công nghệ SDN, đề xuất ứng dụng vào thiết kế hệ thống mạng tại trường ĐHTTLL',
            'tomtat'=>'Nghiên cứu công nghệ SDN, đề xuất ứng dụng vào thiết kế hệ thống mạng tại trường ĐHTTLL',
            'noidung'=>'Nghiên cứu công nghệ SDN, đề xuất ứng dụng vào thiết kế hệ thống mạng tại trường ĐHTTLL',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 53,'idgvhd'=> 6],
            ['tendetai' => 'Xây dựng ứng dụng chat trên nền tảng Android ',
            'tomtat'=>'Xây dựng ứng dụng chat trên nền tảng Android ',
            'noidung'=>'Xây dựng ứng dụng chat trên nền tảng Android ',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 54,'idgvhd'=> 6],
            ['tendetai' => 'Xây dựng hệ thống phát hiện xâm nhập (IDS) trên nàn tảng Suricata',
            'tomtat'=>'Xây dựng hệ thống phát hiện xâm nhập (IDS) trên nàn tảng Suricata',
            'noidung'=>'Xây dựng hệ thống phát hiện xâm nhập (IDS) trên nàn tảng Suricata',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 55,'idgvhd'=> 6],
            ['tendetai' => 'Xây dựng ứng dụng quản lý phòng trọ trên thiết bị di động',
            'tomtat'=>'Xây dựng ứng dụng quản lý phòng trọ trên thiết bị di động',
            'noidung'=>'Xây dựng ứng dụng quản lý phòng trọ trên thiết bị di động',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 56,'idgvhd'=> 7],
            ['tendetai' => 'Xây dựng website quản lý khách sạn OneNight trên mô hình MVC',
            'tomtat'=>'Xây dựng website quản lý khách sạn OneNight trên mô hình MVC',
            'noidung'=>'Xây dựng website quản lý khách sạn OneNight trên mô hình MVC',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 57,'idgvhd'=> 7],
            ['tendetai' => 'Xây dựng cổng thông tin điện tử cho công ty bất động sản Hưng Thịnh',
            'tomtat'=>'Xây dựng cổng thông tin điện tử cho công ty bất động sản Hưng Thịnh',
            'noidung'=>'Xây dựng cổng thông tin điện tử cho công ty bất động sản Hưng Thịnh',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 58,'idgvhd'=> 7],
            ['tendetai' => 'Nghiên cứu công cụ hỗ trợ điều tra số Autopsy và ứng dụng',
            'tomtat'=>'Nghiên cứu công cụ hỗ trợ điều tra số Autopsy và ứng dụng',
            'noidung'=>'Nghiên cứu công cụ hỗ trợ điều tra số Autopsy và ứng dụng',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 59,'idgvhd'=> 7],
            ['tendetai' => 'Xây dựng ứng dụng hỗ trợ quản lý kho thuốc trên thiết bị di động',
            'tomtat'=>'Xây dựng ứng dụng hỗ trợ quản lý kho thuốc trên thiết bị di động',
            'noidung'=>'Xây dựng ứng dụng hỗ trợ quản lý kho thuốc trên thiết bị di động',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 60,'idgvhd'=> 8],
            ['tendetai' => 'Xây dựng ứng dụng hỗ trợ du lịch Khánh Hòa trên thiết bị di động.',
            'tomtat'=>'Xây dựng ứng dụng hỗ trợ du lịch Khánh Hòa trên thiết bị di động.',
            'noidung'=>'Xây dựng ứng dụng hỗ trợ du lịch Khánh Hòa trên thiết bị di động.',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 61,'idgvhd'=> 8],
            ['tendetai' => 'Nghiên cứu công nghệ Webservice xây dựng phần mềm hỗ trợ đặt vé xe khách và đồng bộ hóa trên thiết bị di động',
            'tomtat'=>'Nghiên cứu công nghệ Webservice xây dựng phần mềm hỗ trợ đặt vé xe khách và đồng bộ hóa trên thiết bị di động',
            'noidung'=>'Nghiên cứu công nghệ Webservice xây dựng phần mềm hỗ trợ đặt vé xe khách và đồng bộ hóa trên thiết bị di động',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 62,'idgvhd'=> 8],
            ['tendetai' => 'Tìm hiểu công nghệ mã nguồn mở Laravel và ứng dụng xây dựng Website bất động sản New city Nha Trang',
            'tomtat'=>'Tìm hiểu công nghệ mã nguồn mở Laravel và ứng dụng xây dựng Website bất động sản New city Nha Trang',
            'noidung'=>'Tìm hiểu công nghệ mã nguồn mở Laravel và ứng dụng xây dựng Website bất động sản New city Nha Trang',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 63,'idgvhd'=> 8],
            ['tendetai' => 'Xây dựng ứng dụng mạng xã hội du lịch SNT( Social Networking of Tour)',
            'tomtat'=>'Xây dựng ứng dụng mạng xã hội du lịch SNT( Social Networking of Tour)',
            'noidung'=>'Xây dựng ứng dụng mạng xã hội du lịch SNT( Social Networking of Tour)',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 64,'idgvhd'=> 8],
            ['tendetai' => 'Xây dựng ứng dụng học Tiếng Anh cho học sinh tiểu học trên Android',
            'tomtat'=>'Xây dựng ứng dụng học Tiếng Anh cho học sinh tiểu học trên Android',
            'noidung'=>'Xây dựng ứng dụng học Tiếng Anh cho học sinh tiểu học trên Android',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 65,'idgvhd'=> 8],
            ['tendetai' => 'Xây dựng ứng dụng “Tự học IELTS” trên Android',
            'tomtat'=>'Xây dựng ứng dụng “Tự học IELTS” trên Android',
            'noidung'=>'Xây dựng ứng dụng “Tự học IELTS” trên Android',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 66,'idgvhd'=> 8],
            ['tendetai' => 'Tìm giểu Laravel và xây dựng Website quản lý cửa hàng bán xe máy',
            'tomtat'=>'Tìm giểu Laravel và xây dựng Website quản lý cửa hàng bán xe máy',
            'noidung'=>'Tìm giểu Laravel và xây dựng Website quản lý cửa hàng bán xe máy',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 67,'idgvhd'=> 8],
            ['tendetai' => 'Nghiên cứu các kỹ thuật phát hiện và kiểm duyệt các trang web dựa trên nhận dạng hình ảnh',
            'tomtat'=>'Nghiên cứu các kỹ thuật phát hiện và kiểm duyệt các trang web dựa trên nhận dạng hình ảnh',
            'noidung'=>'Nghiên cứu các kỹ thuật phát hiện và kiểm duyệt các trang web dựa trên nhận dạng hình ảnh',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 68,'idgvhd'=> 9],
            ['tendetai' => 'Xây dựng, thử nghiệm công cụ phát hiện và khai thác lỗ hổng an ninh mạng không dây',
            'tomtat'=>'Xây dựng, thử nghiệm công cụ phát hiện và khai thác lỗ hổng an ninh mạng không dây',
            'noidung'=>'Xây dựng, thử nghiệm công cụ phát hiện và khai thác lỗ hổng an ninh mạng không dây',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 69,'idgvhd'=> 9],
            ['tendetai' => 'Phần mềm quản lý thu chi nhà hàng Thịnh Vương',
            'tomtat'=>'Phần mềm quản lý thu chi nhà hàng Thịnh Vương',
            'noidung'=>'Phần mềm quản lý thu chi nhà hàng Thịnh Vương',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 70,'idgvhd'=> 10],
            ['tendetai' => 'Xây dựng phần mềm quản lý siêu thị Ngọc Thạch',
            'tomtat'=>'Xây dựng phần mềm quản lý siêu thị Ngọc Thạch',
            'noidung'=>'Xây dựng phần mềm quản lý siêu thị Ngọc Thạch',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 71,'idgvhd'=> 10],
            ['tendetai' => 'Xây dựng hệ thống mạng cho doanh nghiệp CBV',
            'tomtat'=>'Xây dựng hệ thống mạng cho doanh nghiệp CBV',
            'noidung'=>'Xây dựng hệ thống mạng cho doanh nghiệp CBV',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 72,'idgvhd'=> 10],
            ['tendetai' => 'Xây dựng phần mềm quản lý kho hàng mỹ phẩm cho công ty thương mại quốc tế GIA PHÚC VINH',
            'tomtat'=>'Xây dựng phần mềm quản lý kho hàng mỹ phẩm cho công ty thương mại quốc tế GIA PHÚC VINH',
            'noidung'=>'Xây dựng phần mềm quản lý kho hàng mỹ phẩm cho công ty thương mại quốc tế GIA PHÚC VINH',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 73,'idgvhd'=> 10],
            ['tendetai' => 'Xây dựng ứng dụng bán hàng Yến sào Khánh Hòa trên Android',
            'tomtat'=>'Xây dựng ứng dụng bán hàng Yến sào Khánh Hòa trên Android',
            'noidung'=>'Xây dựng ứng dụng bán hàng Yến sào Khánh Hòa trên Android',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 74,'idgvhd'=> 10],
            ['tendetai' => 'Nghiên cứu các giải pháp đảm bảo an ninh an toàn thông tin cho các cổng thông tin điện tử',
            'tomtat'=>'Nghiên cứu các giải pháp đảm bảo an ninh an toàn thông tin cho các cổng thông tin điện tử',
            'noidung'=>'Nghiên cứu các giải pháp đảm bảo an ninh an toàn thông tin cho các cổng thông tin điện tử',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 75,'idgvhd'=> 11],
            ['tendetai' => 'Nghiên cứu ứng dụng giải thuật Gen trong một số bài toán phổ biến',
            'tomtat'=>'Nghiên cứu ứng dụng giải thuật Gen trong một số bài toán phổ biến',
            'noidung'=>'Nghiên cứu ứng dụng giải thuật Gen trong một số bài toán phổ biến',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 76,'idgvhd'=> 12],
            ['tendetai' => 'Xây dựng phần mềm quản lý thuốc của quân y trường Sĩ quan Thông tin.',
            'tomtat'=>'Xây dựng phần mềm quản lý thuốc của quân y trường Sĩ quan Thông tin.',
            'noidung'=>'Xây dựng phần mềm quản lý thuốc của quân y trường Sĩ quan Thông tin.',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 77,'idgvhd'=> 13],
            ['tendetai' => 'Tìm hiểu phương pháp quản lý dự án và ứng dụng giải quyết bài toán lập lịch thi công công trình',
            'tomtat'=>'Tìm hiểu phương pháp quản lý dự án và ứng dụng giải quyết bài toán lập lịch thi công công trình',
            'noidung'=>'Tìm hiểu phương pháp quản lý dự án và ứng dụng giải quyết bài toán lập lịch thi công công trình',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>1,'idtacgia'=> 78,'idgvhd'=> 13],
            ['tendetai' => 'Ứng dụng bản đồ số xây dựng website tìm kiếm và cho thuê bất động sản khu vực Hà Nội',
            'tomtat'=>'Ứng dụng bản đồ số xây dựng website tìm kiếm và cho thuê bất động sản khu vực Hà Nội',
            'noidung'=>'Ứng dụng bản đồ số xây dựng website tìm kiếm và cho thuê bất động sản khu vực Hà Nội',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>0,'idtacgia'=> 79,'idgvhd'=> 14],
            ['tendetai' => 'Tìm hiểu, nghiên cứu, quản trị mạng Windows Server 2012 – Ứng dụng cài đặt hệ điều hành Windows tự động qua mạng.',
            'tomtat'=>'Tìm hiểu, nghiên cứu, quản trị mạng Windows Server 2012 – Ứng dụng cài đặt hệ điều hành Windows tự động qua mạng.',
            'noidung'=>'Tìm hiểu, nghiên cứu, quản trị mạng Windows Server 2012 – Ứng dụng cài đặt hệ điều hành Windows tự động qua mạng.',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>0,'idtacgia'=> 80,'idgvhd'=> 15],
            ['tendetai' => 'Nghiên cứu và xây dựng ứng dụng iOS Camera với các hiệu ứng',
            'tomtat'=>'Nghiên cứu và xây dựng ứng dụng iOS Camera với các hiệu ứng',
            'noidung'=>'Nghiên cứu và xây dựng ứng dụng iOS Camera với các hiệu ứng',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>0,'idtacgia'=> 81,'idgvhd'=> 15],
            ['tendetai' => 'Xây dựng hệ thống booking online',
            'tomtat'=>'Xây dựng hệ thống booking online',
            'noidung'=>'Xây dựng hệ thống booking online',
            'thoigianthuchien'=>"2020-03-20",'thoigianketthuc'=>"2020-07-20",
            'daduyet'=>0,'idtacgia'=> 82,'idgvhd'=> 16]
        ]);
        tiendo::insert([
            ['cosolythuyet' => 50,'ptthietkehethong'=> 50,
            'ketquadatduoc'=> 50,'phantramhoanthanh'=> 50,'iddetai'=> 1],
            ['cosolythuyet' => 20,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 6.67,'iddetai'=> 2],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 30,'phantramhoanthanh'=> 60,'iddetai'=> 3],
            ['cosolythuyet' => 80,'ptthietkehethong'=> 70,
            'ketquadatduoc'=> 30,'phantramhoanthanh'=> 50,'iddetai'=> 4],
            ['cosolythuyet' => 80,'ptthietkehethong'=> 40,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 10,'iddetai'=> 5],
            ['cosolythuyet' => 30,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 60,'iddetai'=> 6],
            ['cosolythuyet' => 70,'ptthietkehethong'=> 50,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 30,'iddetai'=> 7],
            ['cosolythuyet' => 60,'ptthietkehethong'=> 30,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 26.67,'iddetai'=> 8],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 9],
            ['cosolythuyet' => 20,'ptthietkehethong'=> 10,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 10,'iddetai'=> 10],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 11],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 12],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 13],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 14],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 15],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 16],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 17],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 18],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 19],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 20],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 21],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 22],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 23],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 24],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 25],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 26],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 27],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 28],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 29],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 30],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 31],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 32],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 33],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 34],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 35],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 36],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 37],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 38],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 39],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 40],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 41],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 42],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 43],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 44],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 45],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 46],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 47],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 48],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 49],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 50],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 51],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 52],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 53],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 54],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 55],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 56],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 57],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 58],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 59],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 60],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 61],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 62],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 63],
            ['cosolythuyet' => 0,'ptthietkehethong'=> 0,
            'ketquadatduoc'=> 0,'phantramhoanthanh'=> 0,'iddetai'=> 64],
            
        ]);
        nghiemthu::insert([
            ['iddetai'=> 1],['iddetai'=> 2],['iddetai'=> 3],['iddetai'=> 4],
            ['iddetai'=> 5],['iddetai'=> 6],['iddetai'=> 7],['iddetai'=> 8],
            ['iddetai'=> 9],['iddetai'=> 10],['iddetai'=> 11],['iddetai'=> 12],
            ['iddetai'=> 13],['iddetai'=> 14],['iddetai'=> 15],['iddetai'=> 16],
            ['iddetai'=> 17],['iddetai'=> 18],['iddetai'=> 19],['iddetai'=> 20],
            ['iddetai'=> 21],['iddetai'=> 22],['iddetai'=> 23],['iddetai'=> 24],
            ['iddetai'=> 25],['iddetai'=> 26],['iddetai'=> 27],['iddetai'=> 28],
            ['iddetai'=> 29],['iddetai'=> 30],['iddetai'=> 31],['iddetai'=> 32],
            ['iddetai'=> 33],['iddetai'=> 34],['iddetai'=> 35],['iddetai'=> 36],
            ['iddetai'=> 37],['iddetai'=> 38],['iddetai'=> 39],['iddetai'=> 40],
            ['iddetai'=> 41],['iddetai'=> 42],['iddetai'=> 43],['iddetai'=> 44],
            ['iddetai'=> 45],['iddetai'=> 46],['iddetai'=> 47],['iddetai'=> 48],
            ['iddetai'=> 49],['iddetai'=> 50],['iddetai'=> 51],['iddetai'=> 52],
            ['iddetai'=> 53],['iddetai'=> 54],['iddetai'=> 55],['iddetai'=> 56],
            ['iddetai'=> 57],['iddetai'=> 58],['iddetai'=> 59],['iddetai'=> 60],
            ['iddetai'=> 61],['iddetai'=> 62],['iddetai'=> 63],['iddetai'=> 64],

        ]);
        // thanhvien::insert([
        //     ['iddetai'=> 1,'idsv'=> 2,'idgv'=> 3],
        //     ['iddetai'=> 2,'idsv'=> 3,'idgv'=> 1],
        //     ['iddetai'=> 3,'idsv'=> 1,'idgv'=> 5],
        //     ['iddetai'=> 4,'idsv'=> 5,'idgv'=> 6],
        //     ['iddetai'=> 5,'idsv'=> 6,'idgv'=> 2],
        //     ['iddetai'=> 6,'idsv'=> 8,'idgv'=> 4],
        //     ['iddetai'=> 7,'idsv'=> 9,'idgv'=> 3],
        //     ['iddetai'=> 8,'idsv'=> 10,'idgv'=> 1],
        //     ['iddetai'=> 9,'idsv'=> 4,'idgv'=> 2],
        //     ['iddetai'=> 10,'idsv'=> 7,'idgv'=> 1],
        // ]);
        sukien::insert([
            ['tensukien' => 'Đội SQ26 - TCU chiến thắng rực rỡ tại vòng bán kết Cuộc thi Cuộc đua số khu vực miền Nam',
            'tomtat'=>'Đội SQ26 - TCU chiến thắng rực rỡ tại vòng bán kết Cuộc thi Cuộc đua số khu vực miền Nam', 
            'noidung'=>'<h2>Đội SQ26 - TCU chiến thắng rực rỡ tại v&ograve;ng b&aacute;n kết Cuộc thi Cuộc đua số khu vực miền Nam</h2>

            <p>Được khởi động từ th&aacute;ng 11/2018 với sự đồng h&agrave;nh của VTV (Đ&agrave;i truyền h&igrave;nh Việt Nam) v&agrave; sự bảo trợ của Bộ Khoa học v&agrave; C&ocirc;ng nghệ, Bộ Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng.... V&ograve;ng b&aacute;n kết cuộc thi Cuộc đua số 2018 - 2019 khu vực miền Nam đ&atilde; diễn ra l&uacute;c 14.00 ng&agrave;y 07/4/2019 tại Nh&agrave; thi đấu Đại học B&aacute;ch khoa (Cơ sở 2), Đại học quốc gia TP.Hồ Ch&iacute; Minh, l&agrave;ng Đại học quốc gia, thị x&atilde; Dĩ An, tỉnh B&igrave;nh Dương.<br />
            &nbsp;</p>
            
            <p><img alt="" src="http://tcu.edu.vn/sites/www/dataupload/files/cms/BK-CDS1.jpg" /><br />
            <br />
            <em>Ban Tổ chức trao giải cho c&aacute;c đội thi</em></p>
            
            <p>&nbsp;<br />
            V&ograve;ng sơ khảo ở hai khu vực Nam bộ v&agrave; miền Trung, T&acirc;y Nguy&ecirc;n trong th&aacute;ng 1/2019, đ&atilde; chọn ra 8 đội xuất sắc nhất v&agrave;o v&ograve;ng b&aacute;n kết khu vực miền Nam. Trong đ&oacute;, đến từ ĐH B&aacute;ch khoa TP.Hồ Ch&iacute; Minh c&oacute; 2 đội: KOR v&agrave; PPL Lover; 2 đại diện của Trường ĐH Lạc Hồng l&agrave; đội LHU Speed v&agrave; LHU The Walkers. Hai th&agrave;nh vi&ecirc;n của ĐH Khoa học tự nhi&ecirc;n TP.Hồ Ch&iacute; Minh l&agrave; HCMUS Team 09 v&agrave; Dateh IT c&ugrave;ng đội CDSNT2 (Trường ĐH Nha Trang) v&agrave; SQ26 của Trường ĐH Th&ocirc;ng tin li&ecirc;n lạc.<br />
            &nbsp;<br />
            Đề thi tại v&ograve;ng b&aacute;n kết năm nay (theo đ&aacute;nh gi&aacute; của Ban Tổ chức v&agrave; c&aacute;c chuy&ecirc;n gia) được cho l&agrave; kh&oacute; hơn nhiều so với hai năm trước. C&aacute;c đội thi sẽ phải lập tr&igrave;nh để xe chạy được theo l&agrave;n đường trong điều kiện &aacute;nh s&aacute;ng thay đổi; tr&aacute;nh đi l&ecirc;n vỉa h&egrave;; khoanh v&ugrave;ng, x&aacute;c định v&agrave; tr&aacute;nh được c&aacute;c vật cản (với h&igrave;nh d&aacute;ng bất kỳ) xuất hiện tr&ecirc;n đường, tự động ph&acirc;n t&iacute;ch loại vật cản để từ đ&oacute; &quot;ra quyết định&quot; di chuyển; nhận dạng v&agrave; h&agrave;nh động được theo biển b&aacute;o giao th&ocirc;ng được thay đổi ngẫu nhi&ecirc;n. Để đ&aacute;p ứng với c&aacute;c b&agrave;i to&aacute;n c&ocirc;ng nghệ ng&agrave;y c&agrave;ng cao đ&oacute;, tại cuộc thi năm nay, FPT cũng đ&atilde; cho n&acirc;ng cấp m&ocirc; h&igrave;nh &quot;xe tự h&agrave;nh&quot; l&ecirc;n tỷ lệ 1/7 thay cho 1/10 so với trước.<br />
            &nbsp;<br />
            &nbsp;Theo thể lệ của cuộc thi, mỗi đội c&oacute; 2 lượt thi đấu tr&ecirc;n sa h&igrave;nh (1 lượt tr&ecirc;n &quot;s&acirc;n đỏ&quot; v&agrave; 1 lượt tr&ecirc;n &quot;s&acirc;n xanh&quot;). Mỗi lượt gồm 2 ph&uacute;t chuẩn bị v&agrave; 3 ph&uacute;t thi đấu; c&aacute;c đội chuẩn bị xong đưa xe v&agrave;o vạch xuất ph&aacute;t, sau hiệu lệnh của trọng t&agrave;i, xe đua phải tự động xuất ph&aacute;t. Trong 3 ph&uacute;t thi đấu của mỗi lượt, mỗi đội c&oacute; thể chạy số v&ograve;ng t&ugrave;y &yacute;, Ban Tổ chức sẽ t&iacute;nh điểm dựa tr&ecirc;n v&ograve;ng thi c&oacute; kết quả cao nhất của đội thi. Khi xe bị sự cố...hoặc vi phạm quy chế cuộc thi, lượt chạy đ&oacute; kh&ocirc;ng được t&iacute;nh, đội thi phải đưa xe quay về vạch xuất ph&aacute;t v&agrave; thi lại (kh&ocirc;ng giới hạn lượt khởi động lại).<br />
            &nbsp;<br />
            Kết quả thi đấu được t&iacute;nh theo thời gian ngắn nhất khi đội thi ho&agrave;n th&agrave;nh một v&ograve;ng đua ho&agrave;n chỉnh (t&iacute;nh từ điểm xuất ph&aacute;t, đi qua c&aacute;c mốc địa điểm do Ban Tổ chức đặt sẵn, quay về điểm ban đầu). Nếu đội thi kh&ocirc;ng ho&agrave;n th&agrave;nh được trọn vẹn một v&ograve;ng đua, kết quả được t&iacute;nh theo qu&atilde;ng đường xa nhất đội đ&oacute; đi được. Trong trường hợp 2 đội c&oacute; c&ugrave;ng qu&atilde;ng đường, đội thi c&oacute; thời gian xe chạy &iacute;t hơn được t&iacute;nh kết quả cao hơn.<br />
            &nbsp;</p>
            
            <p><img alt="" src="http://tcu.edu.vn/sites/www/dataupload/files/cms/BK-CDS2.jpg" /><br />
            <br />
            <em>C&aacute;c th&agrave;nh vi&ecirc;n trong đo&agrave;n c&ocirc;ng t&aacute;c của Nh&agrave; trường chụp ảnh lưu niệm sau khi nhận giải thưởng</em></p>
            
            <p>&nbsp;<br />
            Với tinh thần quyết t&acirc;m cao, sự chuẩn bị kỹ lưỡng v&agrave; t&iacute;ch cực luyện tập, c&ugrave;ng với c&aacute;c phương &aacute;n chiến thuật hợp l&yacute;, &quot;c&aacute;c ch&agrave;ng trai &aacute;o l&iacute;nh&quot; của Trường ĐH Th&ocirc;ng tin li&ecirc;n lạc đ&atilde; l&agrave;m cho kh&aacute;n giả &quot;ngỡ ng&agrave;ng&quot; khi vượt qua c&aacute;c đối thủ &ldquo;nặng k&yacute;&rdquo; với số điểm cao nhất, gi&agrave;nh quyền v&agrave;o v&ograve;ng chung kết cuộc thi Cuộc đua số to&agrave;n quốc sẽ diễn ra v&agrave;o ng&agrave;y 25/5/2019 tại H&agrave; Nội. Như vậy, với việc lần đầu ti&ecirc;n tham gia cuộc thi Cuộc đua số v&agrave; trở th&agrave;nh một trong t&aacute;m đội tuyển mạnh nhất cả nước, SQ26 kh&ocirc;ng những đ&atilde; ho&agrave;n th&agrave;nh xuất sắc chỉ ti&ecirc;u đặt ra, m&agrave; c&ograve;n khiến Ban Tổ chức, c&aacute;c đối thủ v&agrave; kh&aacute;n giả phải &quot;ngưỡng mộ&quot; trước th&agrave;nh t&iacute;ch &ldquo;đua&rdquo; trong cả 2 v&ograve;ng thi.... G&oacute;p mặt c&ugrave;ng SQ26 tại v&ograve;ng chung kết c&ograve;n c&oacute; c&aacute;c đội CDSNTU2 (Trường ĐH Nha Trang), đội DaTeh IT (Đại học Khoa học tự nhi&ecirc;n TP. Hồ Ch&iacute; Minh) v&agrave; đội LHU The Walkers (Trường ĐH Lạc Hồng) c&ugrave;ng &quot;top 4&quot; c&aacute;c đội tuyển của c&aacute;c trường đại học khu vực miền Bắc kh&aacute;c. Ngay sau khi x&aacute;c định được &quot;top 4 b&aacute;n kết khu vực miền Nam&quot;, Ban tổ chức đ&atilde; c&ocirc;ng bố đề thi tại v&ograve;ng chung kết Cuộc thi Cuộc đua số to&agrave;n quốc. Đội v&ocirc; địch tại v&ograve;ng chung kết sẽ được nhận phần thưởng c&oacute; gi&aacute; trị hơn 1,1 tỷ đồng, trong đ&oacute; c&oacute; 15 triệu đồng tiền mặt; một chuyến trải nghiệm, t&igrave;m hiểu về c&ocirc;ng nghệ mới tại Nhật Bản trong một tuần, một suất học bổng tiến sĩ trị gi&aacute; 700 triệu đồng d&agrave;nh cho th&iacute; sinh xuất sắc nhất,...;<br />
            &nbsp;<br />
            Với bản lĩnh, tr&iacute; tuệ, t&agrave;i năng của những sĩ quan chỉ huy, tham mưu th&ocirc;ng tin tương lai.... Hy vọng, đội SQ26 của Trường ĐH Th&ocirc;ng tin li&ecirc;n lạc sẽ lại thi đấu xuất sắc tạo n&ecirc;n điều bất ngờ lớn tại v&ograve;ng chung kết Cuộc thi Cuộc đua số to&agrave;n quốc sắp tới.</p>
            
            <p><strong><em>CTV</em></strong></p>',
            'img'=>'img/BK-CDS2.jpg'],

            ['tensukien' => 'Ban đề tài cấp Bộ Quốc phòng tổ chức khảo sát, tọa đàm tại các đơn vị thông tin trên địa bàn Quân khu 5',
            'tomtat'=>'Ban đề tài cấp Bộ Quốc phòng tổ chức khảo sát, tọa đàm tại các đơn vị thông tin trên địa bàn Quân khu 5', 
            'noidung'=>'<h2>Ban đề t&agrave;i cấp Bộ Quốc ph&ograve;ng tổ chức khảo s&aacute;t, tọa đ&agrave;m tại c&aacute;c đơn vị th&ocirc;ng tin tr&ecirc;n địa b&agrave;n Qu&acirc;n khu 5</h2>

            <p>Chiều ng&agrave;y 04/4/2018, tại Lữ đo&agrave;n Th&ocirc;ng tin 575/QK5 (Đ&agrave; Nẵng), Ban đề t&agrave;i cấp Bộ Quốc ph&ograve;ng &ldquo;Ph&aacute;t triển l&yacute; luận tổ chức, bảo đảm th&ocirc;ng tin li&ecirc;n lạc trong t&aacute;c chiến ph&ograve;ng thủ qu&acirc;n khu&rdquo;&nbsp;đ&atilde; tổ chức tọa đ&agrave;m, trao đổi sau khi khảo s&aacute;t, thu thập th&ocirc;ng tin tại c&aacute;c đơn vị th&ocirc;ng tin tr&ecirc;n địa b&agrave;n Qu&acirc;n khu 5. Đại t&aacute;, PGS.TS B&ugrave;i Sơn H&agrave; - Hiệu trưởng, Chủ nhiệm đề t&agrave;i chủ tr&igrave; buổi tọa đ&agrave;m.</p>
            
            <p>&nbsp;</p>
            
            <p><img alt="" src="http://tcu.edu.vn/sites/www/dataupload/files/cms/Anh%20soan%20tin%20cho%20Web/Nam%20hoc%202017-2018/Quy2.2018/Toadamdetai.jpg" /></p>
            
            <p>&nbsp;</p>
            
            <p><br />
            Tham dự tọa đ&agrave;m c&oacute; đại biểu Bộ Tham mưu Qu&acirc;n khu 5;&nbsp;đại biểu Lữ đo&agrave;n Th&ocirc;ng tin 132/Binh chủng Th&ocirc;ng tin li&ecirc;n lạc; đại biểu Bộ chỉ huy qu&acirc;n sự th&agrave;nh phố Đ&agrave; Nẵng; đại biểu&nbsp;chỉ huy Ph&ograve;ng Th&ocirc;ng tin Qu&acirc;n khu; Chỉ huy Lữ đo&agrave;n, ban chỉ huy c&aacute;c tiểu đo&agrave;n v&agrave; c&aacute;n bộ, sĩ quan c&aacute;c cơ quan trực thuộc Lữ đo&agrave;n Th&ocirc;ng tin 575.<br />
            &nbsp;<br />
            Sau khi nghe b&aacute;o c&aacute;o đề dẫn v&agrave; gợi &yacute; của đồng ch&iacute; Chủ nhiệm đề t&agrave;i, c&aacute;c đại biểu đ&atilde; tiến h&agrave;nh thảo luận, trao đổi, đ&oacute;ng g&oacute;p &yacute; kiến l&agrave;m r&otilde; những luận chứng, đồng thời cung cấp th&ecirc;m c&aacute;c luận cứ khoa học cho đề t&agrave;i. Nội dung thảo luận xoay quanh c&aacute;c vấn đề: x&acirc;y dựng thế trận th&ocirc;ng tin li&ecirc;n lạc của qu&acirc;n khu; Tổ chức hệ thống th&ocirc;ng tin trong t&aacute;c chiến ph&ograve;ng thủ qu&acirc;n khu; c&ocirc;ng t&aacute;c phối hợp giữa th&ocirc;ng tin qu&acirc;n khu với c&aacute;c lực lượng th&ocirc;ng tin kh&aacute;c tr&ecirc;n địa b&agrave;n; tổ chức bi&ecirc;n chế trang bị phương tiện th&ocirc;ng tin của lực lượng th&ocirc;ng tin qu&acirc;n khu; thực trạng trang bị phương tiện th&ocirc;ng tin v&agrave; định hướng ph&aacute;t triển trong tương lai; thực trạng nguồn nh&acirc;n lực bảo đảm th&ocirc;ng tin li&ecirc;n lạc; c&ocirc;ng t&aacute;c huấn luyện, luyện tập, diễn tập; những kh&oacute; khăn, kiến nghị của c&aacute;c đơn vị th&ocirc;ng tin qu&acirc;n khu; ...<br />
            <br />
            Buổi tọa đ&agrave;m đ&atilde; diễn ra s&ocirc;i nổi v&agrave; th&agrave;nh c&ocirc;ng tốt đẹp. Ban đề t&agrave;i đ&atilde; nhận được nhiều &yacute; kiến đ&oacute;ng g&oacute;p bổ &iacute;ch từ kinh nghiệm thực tiễn tổ chức, bảo đảm th&ocirc;ng tin li&ecirc;n lạc v&agrave; x&acirc;y dựng đơn vị của c&aacute;c đại biểu. Qua đ&oacute;, Ban đề t&agrave;i tiếp tục nghi&ecirc;n cứu ho&agrave;n chỉnh c&aacute;c nội dung ch&iacute;nh cần giải quyết m&agrave; mục ti&ecirc;u đề t&agrave;i đ&atilde; đặt ra. Theo kế hoạch, ban đề t&agrave;i sẽ tiếp tục khảo s&aacute;t, nghi&ecirc;n cứu thực tiễn tại một số qu&acirc;n khu v&agrave; c&aacute;c đơn vị th&ocirc;ng tin trong to&agrave;n qu&acirc;n.</p>
            
            <p><br />
            <strong><em>CTV</em></strong></p>',
            'img'=>'img/Toadamdetai.jpg'],
            
            ['tensukien' => 'Trường Đại học Thông tin liên lạc đạt giải cao tại vòng Sơ khảo Cuộc đua số năm 2019 do FPT tổ chức',
            'tomtat'=>'Trường Đại học Thông tin liên lạc đạt giải cao tại vòng Sơ khảo Cuộc đua số năm 2019 do FPT tổ chức',
            'noidung'=>'<h2>Trường Đại học Th&ocirc;ng tin li&ecirc;n lạc đạt giải cao tại v&ograve;ng Sơ khảo Cuộc đua số năm 2019 do FPT tổ chức</h2>

            <p>Chiều ng&agrave;y 16/01, v&ograve;ng Sơ khảo Cuộc đua số năm 2019 do Tập đo&agrave;n FPT tổ chức đ&atilde; ch&iacute;nh thức diễn ra tại Hội trường F, Trường Đại học B&aacute;ch khoa Đ&agrave; Nẵng với 12 đội đại diện cho 4 trường đại học thuộc khu vực Miền Trung tham gia tranh t&agrave;i. Trường Đại học th&ocirc;ng tin li&ecirc;n lạc c&oacute; 6 đội tham gia (SQ26/Tiểu đo&agrave;n 26, TCU STT/Tiểu đo&agrave;n 30, TCU Racer/Tiểu đo&agrave;n 28, H20/Hệ 20, AT_AI/Khoa Kỹ thuật viễn th&ocirc;ng, K6_AITech/Khoa C&ocirc;ng nghệ th&ocirc;ng tin)</p>
            
            <p><em>&nbsp;<img alt="" src="http://tcu.edu.vn/sites/www/dataupload/files/cms/Anh%20soan%20tin%20cho%20Web/Nam%202019/Quy%201.2019/CDS0.jpeg" /><br />
            <br />
            C&aacute;c đội của Nh&agrave; trường tham dự Cuộc thi</em></p>
            
            <p>Ngo&agrave;i 6 đội của Trường Đại học th&ocirc;ng tin li&ecirc;n lạc c&ograve;n c&oacute; 1 đội của Trường Đại học Nha Trang, 2 đội của Trường Đại học Quy Nhơn v&agrave; 3 đội của Trường Đại học B&aacute;ch khoa Đ&agrave; Nẵng. C&aacute;c đội tham gia tranh t&agrave;i qua 3 phần thi với thể thức loại trực tiếp: Xử l&yacute; ảnh, Phản biện v&agrave; Lập tr&igrave;nh nhanh. Cơ cấu điểm cho 3 phần lần lượt l&agrave; 40%, 30% v&agrave; 30%. Sẽ c&oacute; 6 đội đạt điểm số cao nhất ở phần Xử l&yacute; ảnh được Ban Tổ chức lựa chọn v&agrave;o thi phần Phản biện. Ở phần Phản biện, Ban Tổ chức lựa chọn 4 đội c&oacute; điểm số cao nhất để v&agrave;o thi phần Lập tr&igrave;nh nhanh. Hai đội đạt điểm cao nhất ở v&ograve;ng Sơ khảo sẽ được lựa chọn thi v&ograve;ng B&aacute;n kết v&agrave;o th&aacute;ng 3 năm 2019 tại th&agrave;nh phố Hồ Ch&iacute; Minh.<br />
            &nbsp;<br />
            Trong phần Xử l&yacute; ảnh: C&aacute;c đội tiến h&agrave;nh lập tr&igrave;nh cho chiếc xe ảo chạy tr&ecirc;n sa h&igrave;nh, thời gian lập tr&igrave;nh l&agrave; 30 ph&uacute;t, thời gian chạy l&agrave; 2 ph&uacute;t. Kết th&uacute;c phần Xử l&yacute; ảnh c&oacute; 3 đội của Nh&agrave; trường đứng ở vị tr&iacute; thứ 2, 3, 6 (đội SQ26/Tiểu đo&agrave;n 26, đội TCU Racer/Tiểu đo&agrave;n 28, đội TCU STT/Tiểu đo&agrave;n 30) v&agrave; lọt v&agrave;o v&ograve;ng trong. C&ugrave;ng đi tiếp v&agrave;o v&ograve;ng trong c&oacute; đội Cosntu2 của Trường Đại học Nha Trang (đứng ở vị tr&iacute; thứ 1) v&agrave; 2 đội của Trường Đại học B&aacute;ch khoa Đ&agrave; Nẵng (đứng ở vị tr&iacute; thứ 4 v&agrave; thứ 5).<br />
            &nbsp;<br />
            Trong phần thi Phản biện: C&aacute;c đội thi c&oacute; 2 ph&uacute;t để tr&igrave;nh b&agrave;y thuật to&aacute;n, 2 ph&uacute;t trả lời chất vấn của đội bạn v&agrave; 3 ph&uacute;t trả lời c&aacute;c c&acirc;u hỏi của Ban Gi&aacute;m khảo. Kết quả sau phần thi Phản biện, đội Cosntu2 của Trường Đại học Nha Trang vẫn tiếp tục đứng ở vị tr&iacute; thứ 1, xếp thứ 2 l&agrave; đội SQ26/Tiểu đo&agrave;n 26, xếp thứ 3 l&agrave; đội TCU Racer/Tiểu đo&agrave;n 28, thứ 4 l&agrave; đội Duckies của Trường Đại học B&aacute;ch khoa Đ&agrave; Nẵng v&agrave; tiếp tục đi tiếp v&agrave;o phần thi Lập tr&igrave;nh nhanh.<br />
            &nbsp;<br />
            &nbsp;</p>
            
            <p><img alt="" src="http://tcu.edu.vn/sites/www/dataupload/files/cms/Anh%20soan%20tin%20cho%20Web/Nam%202019/Quy%201.2019/CDS1..jpeg" /><br />
            <br />
            <em>Đội SQ26/Tiểu đo&agrave;n 26 nhận giải Nhất do Ban Tổ chức Cuộc thi trao</em></p>
            
            <p>&nbsp;<br />
            Ở phần thi Lập tr&igrave;nh nhanh, c&aacute;c đội đ&atilde; xuất sắc ho&agrave;n th&agrave;nh c&aacute;c b&agrave;i thi của m&igrave;nh. Kh&ocirc;ng kh&iacute; trở n&ecirc;n s&ocirc;i động hơn khi sang b&agrave;i lập tr&igrave;nh số 2 v&agrave; số 3, đội SQ26/Tiểu đo&agrave;n 26 đ&atilde; xuất sắc vượt qua c&aacute;c đội để vươn l&ecirc;n dẫn đầu. Kết quả chung cuộc, đội SQ26/Tiểu đo&agrave;n 26 đ&atilde; gi&agrave;nh chiến thắng sau 3 v&ograve;ng thi với tổng số điểm vượt trội l&agrave; 8.98, xếp thứ 2 l&agrave; đội của Trường Đại học Nha Trang với số điểm 8.11, c&ugrave;ng đứng ở vị tr&iacute; thứ 3 l&agrave; đội TCU Racer/Tiểu đo&agrave;n 28 v&agrave; đội Duckies của Trường Đại học B&aacute;ch khoa Đ&agrave; Nẵng.<br />
            &nbsp;<br />
            Đội đạt giải Nhất v&agrave; giải Nh&igrave; được trao m&ocirc; h&igrave;nh xe đua mới để l&agrave;m quen khi chạy ở m&ocirc;i trường thực tế. Ri&ecirc;ng đội SQ26/Tiểu đo&agrave;n 26 đạt giải Nhất được nhận tiền thưởng bằng tiền mặt l&agrave; 5 triệu đồng v&agrave; c&oacute; cơ hội được nhận 1 xuất học bổng to&agrave;n phần kh&oacute;a đ&agrave;o tạo Automative online do FPT tổ chức trị gi&aacute; 20 triệu đồng.<br />
            &nbsp;</p>
            
            <p><strong><em>Việt Dũng</em></strong></p>',
            'img'=>'img/CDS0.jpeg']
        ]);
        thamkhao::insert([
            ['tieude' => 'Bài 1: Giới thiệu về ngôn ngữ lập trình PHP và hướng dẫn cài đặt',
            'tomtat'=>'Bài 1: Giới thiệu về ngôn ngữ lập trình PHP và hướng dẫn cài đặt', 
            'noidung'=>'<h1><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/227-bai-1-gioi-thieu-ve-ngon-ngu-lap-trinh-php-va-huong-dan-cai-dat.html">B&agrave;i 1: Giới thiệu về ng&ocirc;n ngữ lập tr&igrave;nh PHP v&agrave; hướng dẫn c&agrave;i đặt</a></h1>

            <p><strong>PHP</strong>&nbsp;- viết tắt hồi quy của&nbsp;<strong>&quot;Hypertext Preprocessor&quot;</strong>, l&agrave; một ng&ocirc;n ngữ lập tr&igrave;nh kịch bản được chạy ở ph&iacute;a server nhằm sinh ra m&atilde; html tr&ecirc;n client.&nbsp;PHP đ&atilde; trải qua rất nhiều phi&ecirc;n bản v&agrave; được tối ưu h&oacute;a cho c&aacute;c ứng dụng web, với c&aacute;ch viết m&atilde; r&otilde; r&atilde;ng, tốc độ nhanh, dễ học n&ecirc;n PHP đ&atilde; trở th&agrave;nh một ng&ocirc;n ngữ&nbsp;<a href="https://hoclaptrinhweb.org/hoc-thiet-ke-web/lap-trinh-web.html">lập tr&igrave;nh web</a>&nbsp;rất phổ biến v&agrave; được ưa chuộng.</p>
            
            <p>&nbsp;PHP chạy tr&ecirc;n m&ocirc;i trường Webserver v&agrave; lưu trữ dữ liệu th&ocirc;ng qua hệ quản trị cơ sở dữ liệu n&ecirc;n PHP thường đi k&egrave;m với Apache, MySQL v&agrave; hệ điều h&agrave;nh Linux (LAMP).</p>
            
            <ul>
                <li>Apache l&agrave; một phần mềm web server c&oacute; nhiệm vụ tiếp nhận request từ tr&igrave;nh duyệt người d&ugrave;ng sau đ&oacute; chuyển giao cho PHP xử l&yacute; v&agrave; gửi trả lại cho tr&igrave;nh duyệt.</li>
                <li>MySQL cũng tương tự như c&aacute;c hệ quản trị cơ sở dữ liệu kh&aacute;c (Postgress, Oracle, SQL server...) đ&oacute;ng vai tr&ograve; l&agrave; nơi lưu trữ v&agrave; truy vấn dữ liệu.</li>
                <li>Linux: Hệ điều h&agrave;nh m&atilde; nguồn mở được sử dụng rất rộng r&atilde;i cho c&aacute;c webserver. Th&ocirc;ng thường c&aacute;c phi&ecirc;n bản được sử dụng nhiều nhất l&agrave; RedHat Enterprise Linux, Ubuntu...&nbsp;</li>
            </ul>
            
            <p><strong>PHP hoạt động như thế n&agrave;o?</strong></p>
            
            <p>Khi người sử dụng gọi trang PHP, Web Server sẽ triệu gọi PHP Engine để th&ocirc;ng dịch dịch trang PHP v&agrave; trả kết quả cho người d&ugrave;ng như h&igrave;nh b&ecirc;n dưới.</p>
            
            <p><img alt="hoc lap trinh php" src="https://hoclaptrinhweb.org/images/ecode/hoc-lap-trinh-web/php/hoc-lap-trinh-php.jpg" /></p>
            
            <p><strong>C&aacute;c bước c&agrave;i đặt Web server:</strong></p>
            
            <p><strong>Bước 1:</strong>&nbsp;Download XAMPP tại&nbsp;<a href="https://www.apachefriends.org/download.html">https://www.apachefriends.org/download.html</a>&nbsp;v&agrave; tiến h&agrave;nh c&agrave;i đặt như c&aacute;c chương tr&igrave;nh th&ocirc;ng thường.</p>
            
            <p><strong>Bước 2:</strong>&nbsp;Start Apache v&agrave; MySQL trong XAMPP control panel</p>
            
            <p><img alt="cai dat xampp" src="https://hoclaptrinhweb.org/images/ecode/hoc-lap-trinh-web/php/cai-dat-xampp.jpg" /></p>
            
            <p><strong>Bước 3:</strong>&nbsp;G&otilde; v&agrave;o tr&igrave;nh duyệt địa chỉ localhost. Nếu hiện ra m&agrave;n h&igrave;nh sau th&igrave; việc c&agrave;i đặt đ&atilde; th&agrave;nh c&ocirc;ng.</p>
            
            <p><img alt="cai dat xampp 2" src="https://hoclaptrinhweb.org/images/ecode/hoc-lap-trinh-web/php/cai-dat-xampp-2.jpg" /></p>
            
            <p><strong>Bước 4:</strong>&nbsp;V&agrave;o thư mục c&agrave;i đặt XAMPP/htdocs v&agrave; tiến h&agrave;nh tạo file test.php với nội dung như sau:</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/227-bai-1-gioi-thieu-ve-ngon-ngu-lap-trinh-php-va-huong-dan-cai-dat.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
                        </td>
                        <td>
                        <p><code>&lt;?php</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>echo</code> <code>&quot;Hello World&quot;</code><code>;</code></p>
            
                        <p><code>?&gt;</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>G&otilde; tr&ecirc;n tr&igrave;nh duyệt địa chỉ localhost/test.php. Nếu hiện ra d&ograve;ng chữ Hello World nghĩa l&agrave; ứng dụng PHP đầu ti&ecirc;n đ&atilde; chạy th&agrave;nh c&ocirc;ng.</p>
            
            <p><img alt="cai dat xampp 3" src="https://hoclaptrinhweb.org/images/ecode/hoc-lap-trinh-web/php/cai-dat-xampp-3.jpg" /></p>
            
            <p><strong>TIPS:</strong>&nbsp;Để lập tr&igrave;nh PHP ch&uacute;ng ta c&oacute; thể sử dụng c&aacute;c IDE sau: Netbeans, Eclipse, Zend Studio, PHP Storm...để đẩy nhanh qu&aacute; tr&igrave;nh ph&aacute;t triển v&agrave; hạn chế lỗi xảy ra trong qu&aacute; tr&igrave;nh lập tr&igrave;nh.</p>',
            'img'=>'NULL'],

            ['tieude' => 'Bài 2: Cú pháp khai báo PHP, sử dụng hằng và biến',
            'tomtat'=>'Bài 2: Cú pháp khai báo PHP, sử dụng hằng và biến', 
            'noidung'=>'<h1><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/228-bai-2-cu-phap-khai-bao-php-su-dung-hang-va-bien.html">B&agrave;i 2: C&uacute; ph&aacute;p khai b&aacute;o PHP, sử dụng hằng v&agrave; biến</a></h1>

            <p>C&uacute; ph&aacute;p v&agrave; ngữ nghĩa c&aacute;c h&agrave;m của PHP cũng tương tự như hầu hết c&aacute;c ng&ocirc;n ngữ lập tr&igrave;nh kh&aacute;c (C, Java, Perl) chỉ kh&aacute;c l&agrave; m&atilde; PHP được chứa trong một thẻ c&oacute; dạng như sau:</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/228-bai-2-cu-phap-khai-bao-php-su-dung-hang-va-bien.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
                        </td>
                        <td>
                        <p><code>&lt;?php</code></p>
            
                        <p><code>//code của bạn</code></p>
            
                        <p><code>?&gt;</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>hoặc</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/228-bai-2-cu-phap-khai-bao-php-su-dung-hang-va-bien.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
                        </td>
                        <td>
                        <p><code>&lt;?</code></p>
            
                        <p><code>//code của bạn</code></p>
            
                        <p><code>?&gt;</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>Lưu &yacute; l&agrave; nếu sử dụng c&aacute;ch thứ hai trong file php.ini phải cấu h&igrave;nh&nbsp;<strong>short_open_tag=On.&nbsp;</strong>Nếu bạn sử dụng sharehosting v&agrave; muốn ứng dụng web của m&igrave;nh tương th&iacute;ch với c&aacute;c hosting th&igrave; n&ecirc;n khai b&aacute;o theo c&aacute;ch 1. Để PHP Engine c&oacute; thể th&ocirc;ng dịch được file chứa m&atilde; nguồn PHP phải được lưu dưới dạng .php thay v&igrave; .html</p>
            
            <p><strong>Hằng</strong>:&nbsp;Tương tự như trong những ng&ocirc;n ngữ lập tr&igrave;nh kh&aacute;c, hằng trong PHP cũng l&agrave; một gi&aacute; trị được khai b&aacute;o trước khi sử dụng. N&oacute; phải bắt đầu bằng chữ c&aacute;i hoặc dấu gạch dưới _ v&agrave; kh&ocirc;ng được bắt đầu bằng số, n&oacute; c&oacute; thể l&agrave; một chuỗi. Hằng trong PHP được định nghĩa bằng h&agrave;m define(). N&oacute; kh&ocirc;ng thay đổi v&agrave; kh&ocirc;ng được được định nghĩa lại.</p>
            
            <p>V&iacute; dụ:&nbsp;</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/228-bai-2-cu-phap-khai-bao-php-su-dung-hang-va-bien.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
            
                        <p>4</p>
            
                        <p>5</p>
                        </td>
                        <td>
                        <p><code>&lt;?php</code></p>
            
                        <p><code>define (&ldquo;OS&rdquo;, &ldquo;Linux&rdquo;);</code></p>
            
                        <p><code>echo</code> <code>&ldquo;My operating system is &ldquo;;</code></p>
            
                        <p><code>echo</code> <code>OS;</code></p>
            
                        <p><code>?&gt;</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>Kết quả xuất ra: My operating system is Linux</p>
            
            <p><strong>Biến</strong>:&nbsp;Kh&ocirc;ng giống như hằng, biến kh&ocirc;ng cần định nghĩa, c&oacute; thể thay đổi trong chương tr&igrave;nh. C&aacute;ch đặt t&ecirc;n của biến cũng giống như c&aacute;ch đặt t&ecirc;n của hằng. Biến ph&acirc;n biệt chữ hoa v&agrave; chữ thường.&nbsp;Tất cả biến trong PHP đều bắt đầu bằng dấu &quot;$&quot;. PHP tự động hiểu c&aacute;c kiểu biến n&ecirc;n người d&ugrave;ng kh&ocirc;ng cần phải khai b&aacute;o kiểu biến.</p>
            
            <p>V&iacute; dụ:</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/228-bai-2-cu-phap-khai-bao-php-su-dung-hang-va-bien.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
            
                        <p>4</p>
            
                        <p>5</p>
                        </td>
                        <td>
                        <p><code>&lt;?php</code></p>
            
                        <p><code>$movierate</code> <code>= 5;</code></p>
            
                        <p><code>echo</code> <code>&quot;My movie rating for this movie is: &quot;</code><code>;</code></p>
            
                        <p><code>echo</code> <code>$movierate</code><code>;</code></p>
            
                        <p><code>?&gt;</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>Kết quả xuất ra:&nbsp;My movie rating for this movie is: 5</p>
            
            <p>Truyền biến giữa c&aacute;c trang:&nbsp;C&oacute; bốn c&aacute;ch cơ bản để truyền biến giữa c&aacute;c trang: truyền biến trong URL, qua session, cookie hoặc với một HTML form.</p>
            
            <p>Truyền biến qua URL:</p>
            
            <p>V&iacute; dụ: Để truyền gi&aacute; trị 123 cho biến id v&agrave; gi&aacute; trị 4 cho biến category v&agrave;o trong file product.php ta sử dụng url sau:</p>
            
            <p><a href="http://example.com/product.php?id=123&amp;category=4">http://example.com/product.php?id=123&amp;categoryid=4</a></p>
            
            <p>Trong file product.php ch&uacute;ng ta sẽ tiến h&agrave;nh hiển thị gi&aacute; trị của c&aacute;c biến n&agrave;y:</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/228-bai-2-cu-phap-khai-bao-php-su-dung-hang-va-bien.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
            
                        <p>4</p>
            
                        <p>5</p>
            
                        <p>6</p>
            
                        <p>7</p>
            
                        <p>8</p>
            
                        <p>9</p>
            
                        <p>10</p>
            
                        <p>11</p>
                        </td>
                        <td>
                        <p><code>&lt;html&gt;</code></p>
            
                        <p><code>&lt;body&gt;</code></p>
            
                        <p><code>&lt;?php</code></p>
            
                        <p><code>echo</code> <code>&ldquo;ID of product is &ldquo;;</code></p>
            
                        <p><code>echo</code> <code>$id</code><code>;</code></p>
            
                        <p><code>echo</code> <code>&ldquo;&lt;br&gt;&rdquo;;</code></p>
            
                        <p><code>echo</code> <code>&ldquo;Category id of product is &ldquo;;</code></p>
            
                        <p><code>echo</code> <code>$categoryid</code><code>;</code></p>
            
                        <p><code>?&gt;</code></p>
            
                        <p><code>&lt;/body&gt;</code></p>
            
                        <p><code>&lt;/html&gt;</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>Kết quả xuất ra:&nbsp;</p>
            
            <p>ID of product is 123<br />
            Category id of product is 4</p>
            
            <p>C&aacute;c h&igrave;nh thức truyền biến qua session, cookie v&agrave; html form ch&uacute;ng ta sẽ lần lượt t&igrave;m hiểu trong c&aacute;c b&agrave;i tiếp theo.</p>
            
            <p>&nbsp;</p>',
            'img'=>'NULL'],

            ['tieude' => 'Bài 3: Các kiểu dữ liệu và phạm vi biến trong PHP',
            'tomtat'=>'Bài 3: Các kiểu dữ liệu và phạm vi biến trong PHP', 
            'noidung'=>'<h1><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/229-bai-3-cac-kieu-du-lieu-va-pham-vi-bien-trong-php.html">B&agrave;i 3: C&aacute;c kiểu dữ liệu v&agrave; phạm vi biến trong PHP</a></h1>

            <p>PHP c&oacute; tổng cộng t&aacute;m loại dữ liệu được sử dụng cho c&aacute;c biến, c&aacute;c kiểu dữ liệu n&agrave;y thường được hiểu ngầm dựa v&agrave;o gi&aacute; trị của biến m&agrave; kh&ocirc;ng cần phải khai b&aacute;o. Để c&oacute; thể&nbsp;<a href="https://hoclaptrinhweb.org/hoc-thiet-ke-web/lap-trinh-web.html">học lập tr&igrave;nh php</a>&nbsp;ch&uacute;ng ta cần phải nắm vững c&aacute;c kiểu dữ liệu v&agrave; to&aacute;n tử của PHP.</p>
            
            <ul>
                <li>
                <p>Integers:&nbsp;l&agrave; kiểu số nguy&ecirc;n, kh&ocirc;ng c&oacute; dấu thập ph&acirc;n, v&iacute; dụ 1234.</p>
                </li>
                <li>
                <p>Doubles:&nbsp;l&agrave; kiểu số thực, v&iacute; dụ 3.64576.</p>
                </li>
                <li>
                <p>Booleans:&nbsp;chỉ c&oacute; hai gi&aacute; trị true hoặc false.</p>
                </li>
                <li>
                <p>NULL:&nbsp;l&agrave; một kiểu dữ liệu đặc biệt chỉ c&oacute; một gi&aacute; trị: NULL.</p>
                </li>
                <li>
                <p>Strings:&nbsp;l&agrave; chuỗi k&yacute; tự, giống như &#39;t&ocirc;i học php&#39;.</p>
                </li>
                <li>
                <p>Array: kiểu dữ liệu mảng - l&agrave; một tập hợp c&aacute;c phần tử c&oacute; c&ugrave;ng kiểu dữ liệu với nhau.</p>
                </li>
                <li>
                <p>Object:&nbsp;l&agrave; 1 thể hiện (instance) của 1 lớp đ&atilde; được định nghĩa trước - được sử dụng trong lập tr&igrave;nh hướng đối tượng.</p>
                </li>
                <li>Resource: l&agrave; kiểu dữ liệu đặc biệt d&ugrave;ng để lưu trữ tham chiếu đến c&aacute;c t&agrave;i nguy&ecirc;n b&ecirc;n ngo&agrave;i PHP chẳng hạn như kết nối đến database.</li>
            </ul>
            
            <p>Kh&ocirc;ng c&oacute; giới hạn về độ d&agrave;i của chuỗi - trong phạm vi giới hạn sẵn c&oacute; của bộ nhớ, bạn c&oacute; thể tạo chuỗi d&agrave;i t&ugrave;y &yacute;.</p>
            
            <p>Chuỗi được bao quanh bởi c&aacute;c dấu ngoặc k&eacute;p (v&iacute; dụ &quot;abc&quot;) hoặc ngoặc đơn (v&iacute; dụ &#39;cde&#39;). Để nối c&aacute;c chuỗi lại với nhau ch&uacute;ng ta d&ugrave;ng dấu &quot;.&quot; Một số k&yacute; tự bắt đầu bằng dấu gạch ch&eacute;o ngược (\) được sử dụng để thay thế cho c&aacute;c k&yacute; tự đặc biệt</p>
            
            <p><strong>Một số k&yacute; tự đặc biệt trong chuỗi:</strong></p>
            
            <ul>
                <li>
                <p>\ N được thay thế bằng k&yacute; tự xuống d&ograve;ng</p>
                </li>
                <li>\ R được thay thế bởi k&yacute; tự&nbsp;carriage-return (di chuyển con trỏ đến vị tr&iacute; bắt đầu của d&ograve;ng hiện tại m&agrave; kh&ocirc;ng thay đổi tọa độ y)&nbsp;</li>
                <li>
                <p>\ T được thay thế bằng k&yacute; tự tab</p>
                </li>
                <li>
                <p>\ $ Được thay thế bằng &nbsp;k&yacute; hiệu $</p>
                </li>
                <li>
                <p>\ &quot;Được thay thế bằng một dấu nh&aacute;y k&eacute;p (&quot;)</p>
                </li>
                <li>
                <p>\\ Được thay thế bằng một dấu gạch ch&eacute;o ngược (\)</p>
                </li>
            </ul>
            
            <p>V&iacute; dụ:</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/229-bai-3-cac-kieu-du-lieu-va-pham-vi-bien-trong-php.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
            
                        <p>4</p>
            
                        <p>5</p>
            
                        <p>6</p>
            
                        <p>7</p>
            
                        <p>8</p>
                        </td>
                        <td>
                        <p><code>&lt;?php</code></p>
            
                        <p><code>$line</code> <code>=&nbsp;</code><code>&quot;A newline is \n&quot;</code><code>;</code></p>
            
                        <p><code>$line</code> <code>.=&nbsp;</code><code>&quot;A carriage return is \r&quot;</code><code>;</code></p>
            
                        <p><code>$line</code> <code>.=&nbsp;</code><code>&quot;A tab is \t&quot;</code><code>;</code></p>
            
                        <p><code>$line</code> <code>.=&nbsp;</code><code>&quot;A dollar sign is \$&quot;</code><code>;</code></p>
            
                        <p><code>$line</code> <code>.=&nbsp;</code><code>&quot;A double-quote is \&quot;&quot;</code><code>;</code></p>
            
                        <p><code>echo</code> <code>$line</code><code>;</code></p>
            
                        <p><code>?&gt;</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>Dấu .= được sử dụng để nối gi&aacute; trị hiện tại của biến với gi&aacute; trị mới của biến (sử dụng cho chuỗi).<br />
            Kết quả in ra:</p>
            
            <p>A newline is&nbsp;<br />
            A carriage return is&nbsp;<br />
            A tab is &nbsp;&nbsp;&nbsp; A dollar sign is $A double-quote is &quot;</p>
            
            <p><strong>Phạm vi của biến trong PHP</strong></p>
            
            <p>&nbsp;<strong>Biến cục bộ</strong>:&nbsp;Một biến được khai b&aacute;o trong một h&agrave;m được xem l&agrave; cục bộ (local);&nbsp;nghĩa l&agrave; n&oacute; chỉ c&oacute; thể được tham chiếu chỉ trong h&agrave;m đ&oacute;.&nbsp;Việc g&aacute;n biến b&ecirc;n ngo&agrave;i h&agrave;m sẽ được xem như l&agrave; một biến kh&aacute;c.</p>
            
            <p>V&iacute; dụ:</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/229-bai-3-cac-kieu-du-lieu-va-pham-vi-bien-trong-php.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
            
                        <p>4</p>
            
                        <p>5</p>
            
                        <p>6</p>
            
                        <p>7</p>
            
                        <p>8</p>
            
                        <p>9</p>
            
                        <p>10</p>
            
                        <p>11</p>
                        </td>
                        <td>
                        <p><code>&lt;?php</code></p>
            
                        <p><code>$y</code> <code>= 4;</code></p>
            
                        <p><code>function</code> <code>assign_y () {</code></p>
            
                        <p><code>$y</code> <code>= 0;</code></p>
            
                        <p><code>print</code> <code>&quot;\</code><code>$y</code> <code>inside&nbsp;</code><code>function</code> <code>is&nbsp;</code><code>$y</code><code>.</code></p>
            
                        <p><code>&quot;;</code></p>
            
                        <p><code>}</code></p>
            
                        <p><code>assign_y();</code></p>
            
                        <p><code>print</code> <code>&quot;\</code><code>$y</code> <code>outside of&nbsp;</code><code>function</code> <code>is&nbsp;</code><code>$y</code><code>.</code></p>
            
                        <p><code>&quot;;</code></p>
            
                        <p><code>?&gt;</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>Kết quả xuất ra:</p>
            
            <p>$y inside function is 0.&nbsp;<br />
            $y outside of function is 4.&nbsp;</p>
            
            <p><strong>Tham số</strong>: Tham số được khai b&aacute;o sau t&ecirc;n h&agrave;m v&agrave; nằm trong dấu ().</p>
            
            <p>V&iacute; dụ:</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/229-bai-3-cac-kieu-du-lieu-va-pham-vi-bien-trong-php.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
            
                        <p>4</p>
            
                        <p>5</p>
            
                        <p>6</p>
            
                        <p>7</p>
            
                        <p>8</p>
                        </td>
                        <td>
                        <p><code>&lt;?</code></p>
            
                        <p><code>function</code> <code>multiply (</code><code>$value</code><code>) {</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>$value</code> <code>=&nbsp;</code><code>$value</code> <code>* 10;</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>return</code> <code>$value</code><code>;</code></p>
            
                        <p><code>}</code></p>
            
                        <p><code>$retval</code> <code>= multiply (10);</code></p>
            
                        <p><code>Print</code> <code>&quot;Return value is $retval\n&quot;</code><code>;</code></p>
            
                        <p><code>?&gt;</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>&nbsp;Kết quả in ra:</p>
            
            <p>Return value is 100</p>
            
            <p><strong>Biến to&agrave;n cục:</strong>&nbsp;kh&aacute;c với biến cục bộ, biến to&agrave;n cục c&oacute; thể được truy cập từ bất k&igrave; đ&acirc;u trong chương tr&igrave;nh.&nbsp;Tuy nhi&ecirc;n, để c&oacute; thể được sửa đổi, một biến to&agrave;n cục phải được khai b&aacute;o l&agrave; global trong h&agrave;m bằng c&aacute;ch đặt c&aacute;c từ kh&oacute;a&nbsp;<strong>GLOBAL</strong>&nbsp;ở ph&iacute;a trước của biến đ&atilde; c&oacute; sẵn.</p>
            
            <p>V&iacute; dụ:</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/229-bai-3-cac-kieu-du-lieu-va-pham-vi-bien-trong-php.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
            
                        <p>4</p>
            
                        <p>5</p>
            
                        <p>6</p>
            
                        <p>7</p>
                        </td>
                        <td>
                        <p><code>$a</code> <code>= 15;</code></p>
            
                        <p><code>function</code> <code>add () {</code></p>
            
                        <p><code>GLOBAL&nbsp;</code><code>$a</code><code>;</code></p>
            
                        <p><code>$a</code><code>++;</code></p>
            
                        <p><code>print</code> <code>&quot;value of a is $a&quot;</code><code>;</code></p>
            
                        <p><code>}</code></p>
            
                        <p><code>add ();</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>Kết quả in ra:</p>
            
            <p>value of a is 16</p>
            
            <p>Biến tĩnh (static): kh&aacute;c với tham số sẽ bị mất gi&aacute; trị khi tho&aacute;t khỏi h&agrave;m, biến tĩnh kh&ocirc;ng bị mất gi&aacute; trị khi tho&aacute;t khỏi h&agrave;m. Biến tĩnh được khai b&aacute;o bằng từ kh&oacute;a STATIC.</p>
            
            <p>V&iacute; dụ:</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/229-bai-3-cac-kieu-du-lieu-va-pham-vi-bien-trong-php.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
            
                        <p>4</p>
            
                        <p>5</p>
            
                        <p>6</p>
            
                        <p>7</p>
            
                        <p>8</p>
            
                        <p>9</p>
            
                        <p>10</p>
                        </td>
                        <td>
                        <p><code>function</code> <code>keep_track() {</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;</code><code>STATIC&nbsp;</code><code>$count</code> <code>= 0;</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;</code><code>$count</code><code>++;</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;</code><code>print</code> <code>$count</code><code>;</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;</code><code>print</code> <code>&quot;</code></p>
            
                        <p><code>&quot;;</code></p>
            
                        <p><code>}</code></p>
            
                        <p><code>keep_track();</code></p>
            
                        <p><code>keep_track();</code></p>
            
                        <p><code>keep_track();</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p>&nbsp;Kết quả in ra</p>
            
            <p>1<br />
            2<br />
            3</p>',
            'img'=>'NULL'],
            
            ['tieude' => 'Bài 4: Toán tử trong PHP',
            'tomtat'=>'Bài 4: Toán tử trong PHP',
            'noidung'=>'<h1><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/233-bai-4-toan-tu-trong-php.html">B&agrave;i 4: To&aacute;n tử trong PHP</a></h1>

            <p>To&aacute;n tử l&agrave; g&igrave;? V&iacute; dụ ta c&oacute; một biểu thức sau: 1+2=3 th&igrave; 1 v&agrave; 2 được gọi l&agrave; to&aacute;n hạng c&ograve;n + được gọi l&agrave; to&aacute;n tử. PHP hỗ trợ 5 loại to&aacute;n tử sau:</p>
            
            <ul>
                <li>To&aacute;n tử số học (Arithmetic Operators)</li>
                <li>To&aacute;n tử so s&aacute;nh (Comparision Operators)</li>
                <li>To&aacute;n tử logic (Logical Operators)</li>
                <li>To&aacute;n tử g&aacute;n (Assignment Operators)</li>
                <li>To&aacute;n tử điều kiện (Conditional Operators)</li>
            </ul>
            
            <p><strong>To&aacute;n tử số học:</strong></p>
            
            <p>V&iacute; dụ: A=10;B=20</p>
            
            <table>
                <tbody>
                    <tr>
                        <td>To&aacute;n tử</td>
                        <td>M&ocirc; tả</td>
                        <td>V&iacute; dụ</td>
                    </tr>
                    <tr>
                        <td>+</td>
                        <td>Cộng 2 số</td>
                        <td>A + B = 30</td>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>Trừ 2 số</td>
                        <td>A - B = -10</td>
                    </tr>
                    <tr>
                        <td>*</td>
                        <td>Nh&acirc;n 2 số</td>
                        <td>A * B = 200</td>
                    </tr>
                    <tr>
                        <td>/</td>
                        <td>Chia 2 số</td>
                        <td>B / A = 2</td>
                    </tr>
                    <tr>
                        <td>%</td>
                        <td>To&aacute;n tử Modulo - lấy số dư c&ograve;n lại sau khi chia 2 số</td>
                        <td>B % A = 0</td>
                    </tr>
                    <tr>
                        <td>++</td>
                        <td>Cộng th&ecirc;m 1</td>
                        <td>A++ = 11</td>
                    </tr>
                    <tr>
                        <td>--</td>
                        <td>Trừ đi 1</td>
                        <td>A-- = 9</td>
                    </tr>
                </tbody>
            </table>
            
            <p><strong>To&aacute;n tử so s&aacute;nh:</strong></p>
            
            <table>
                <tbody>
                    <tr>
                        <td>To&aacute;n tử</td>
                        <td>M&ocirc; tả</td>
                        <td>V&iacute; dụ</td>
                    </tr>
                    <tr>
                        <td>==</td>
                        <td>Kiểm tra gi&aacute; trị 2 to&aacute;n hạng c&oacute; bằng nhau hay kh&ocirc;ng, nếu bẳng trả về true, ngược lại l&agrave; false.</td>
                        <td>(A == B) is not true.</td>
                    </tr>
                    <tr>
                        <td>!=</td>
                        <td>Kiểm tra gi&aacute; trị 2 to&aacute;n hạng c&oacute; kh&ocirc;ng bằng nhau hay kh&ocirc;ng, nếu kh&ocirc;ng bẳng trả về true, ngược lại l&agrave; false.</td>
                        <td>(A != B) is true.</td>
                    </tr>
                    <tr>
                        <td>&gt;</td>
                        <td>Kiểm tra to&aacute;n hạng b&ecirc;n tr&aacute;i c&oacute; lớn hơn b&ecirc;n phải hay kh&ocirc;ng, nếu đ&uacute;ng trả về true.</td>
                        <td>(A &gt; B) is not true.</td>
                    </tr>
                    <tr>
                        <td>&lt;</td>
                        <td>Kiểm tra to&aacute;n hạng b&ecirc;n tr&aacute;i c&oacute; nhỏ hơn b&ecirc;n phải hay kh&ocirc;ng, nếu đ&uacute;ng trả về true.</td>
                        <td>(A &lt; B) is true.</td>
                    </tr>
                    <tr>
                        <td>&gt;=</td>
                        <td>Kiểm tra to&aacute;n hạng b&ecirc;n tr&aacute;i c&oacute; lớn hơn hoặc bằng b&ecirc;n phải hay kh&ocirc;ng, nếu đ&uacute;ng trả về true.</td>
                        <td>(A &gt;= B) is not true.</td>
                    </tr>
                    <tr>
                        <td>&lt;=</td>
                        <td>Kiểm tra to&aacute;n hạng b&ecirc;n tr&aacute;i c&oacute; nhỏ hơn hoặc bằng b&ecirc;n phải hay kh&ocirc;ng, nếu đ&uacute;ng trả về true.</td>
                        <td>(A &lt;= B) is true.</td>
                    </tr>
                </tbody>
            </table>
            
            <p><strong>To&aacute;n tử g&aacute;n</strong></p>
            
            <table>
                <tbody>
                    <tr>
                        <td>To&aacute;n tử</td>
                        <td>M&ocirc; tả</td>
                        <td>V&iacute; dụ</td>
                    </tr>
                    <tr>
                        <td>=</td>
                        <td>G&aacute;n gi&aacute; trị to&aacute;n hạng b&ecirc;n phải sang to&aacute;n hạng b&ecirc;n tr&aacute;i</td>
                        <td>C = A + B sẽ g&aacute;n gi&aacute; trị của A + B cho C</td>
                    </tr>
                    <tr>
                        <td>+=</td>
                        <td>
                        <p>Cộng to&aacute;n hạng b&ecirc;n tr&aacute;i với to&aacute;n hạng b&ecirc;n phải v&agrave; g&aacute;n kết quả cho to&aacute;n hạng b&ecirc;n tr&aacute;i</p>
                        </td>
                        <td>C += A tương đương với C = C + A</td>
                    </tr>
                    <tr>
                        <td>-=</td>
                        <td>Trừ to&aacute;n hạng b&ecirc;n tr&aacute;i với to&aacute;n hạng b&ecirc;n phải v&agrave; g&aacute;n kết quả cho to&aacute;n hạng b&ecirc;n tr&aacute;i</td>
                        <td>C -= A tương đương với C = C - A</td>
                    </tr>
                    <tr>
                        <td>*=</td>
                        <td>Nh&acirc;n to&aacute;n hạng b&ecirc;n tr&aacute;i với to&aacute;n hạng b&ecirc;n phải v&agrave; g&aacute;n kết quả cho to&aacute;n hạng b&ecirc;n tr&aacute;i</td>
                        <td>C *= A tương đương với C = C * A</td>
                    </tr>
                    <tr>
                        <td>/=</td>
                        <td>Chia to&aacute;n hạng b&ecirc;n tr&aacute;i với to&aacute;n hạng b&ecirc;n phải v&agrave; g&aacute;n kết quả cho to&aacute;n hạng b&ecirc;n tr&aacute;i</td>
                        <td>C /= A tương đương với C = C / A</td>
                    </tr>
                    <tr>
                        <td>%=</td>
                        <td>Modulo to&aacute;n hạng b&ecirc;n tr&aacute;i với to&aacute;n hạng b&ecirc;n phải v&agrave; g&aacute;n kết quả cho to&aacute;n hạng b&ecirc;n tr&aacute;i</td>
                        <td>C %= A tương đương với&nbsp;C = C % A</td>
                    </tr>
                </tbody>
            </table>
            
            <p><strong>To&aacute;n tử điều kiện</strong></p>
            
            <table>
                <tbody>
                    <tr>
                        <td>Operator</td>
                        <td>Description</td>
                        <td>Example</td>
                    </tr>
                    <tr>
                        <td>? :</td>
                        <td>Biểu thức điều kiện</td>
                        <td>Nếu điều kiện l&agrave; true ? G&aacute;n gi&aacute; trị l&agrave; X : Ngược lại l&agrave; Y</td>
                    </tr>
                </tbody>
            </table>
            
            <p>V&iacute; dụ:</p>
            
            <p><a href="https://hoclaptrinhweb.org/lap-trinh/hoc-php/233-bai-4-toan-tu-trong-php.html#">?</a></p>
            
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
            
                        <p>2</p>
            
                        <p>3</p>
            
                        <p>4</p>
            
                        <p>5</p>
            
                        <p>6</p>
            
                        <p>7</p>
            
                        <p>8</p>
            
                        <p>9</p>
                        </td>
                        <td>
                        <p><code>&lt;?php</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>$a = 10;</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>$b = 20;</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code>&nbsp;</p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>/* If điều kiện l&agrave; true th&igrave; g&aacute;n biến a cho result nếu kh&ocirc;ng sẽ g&aacute;n biến b */</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>$result = ($a &gt; $b ) ? $a :$b;</code></p>
            
                        <p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>echo &quot;Value of result is $result&lt;br/&gt;&quot;;</code></p>
            
                        <p><code>//kết quả in ra: Value of result is 20</code></p>
            
                        <p><code>?&gt;</code></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p><strong>Thứ tự ưu ti&ecirc;n của c&aacute;c to&aacute;n tử:</strong></p>
            
            <table>
                <tbody>
                    <tr>
                        <td>Operator&nbsp;</td>
                        <td>Thứ tự ưu ti&ecirc;n</td>
                    </tr>
                    <tr>
                        <td>! ++ --&nbsp;</td>
                        <td>Phải sang tr&aacute;i</td>
                    </tr>
                    <tr>
                        <td>* / %&nbsp;</td>
                        <td>Tr&aacute;i sang phải&nbsp;</td>
                    </tr>
                    <tr>
                        <td>+ -&nbsp;</td>
                        <td>Tr&aacute;i sang phải&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&lt; &lt;= &gt; &gt;=&nbsp;</td>
                        <td>Tr&aacute;i sang phải&nbsp;</td>
                    </tr>
                    <tr>
                        <td>== !=&nbsp;</td>
                        <td>Tr&aacute;i sang phải&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&amp;&amp;&nbsp;</td>
                        <td>Tr&aacute;i sang phải&nbsp;</td>
                    </tr>
                    <tr>
                        <td>||&nbsp;</td>
                        <td>Tr&aacute;i sang phải&nbsp;</td>
                    </tr>
                    <tr>
                        <td>?:&nbsp;</td>
                        <td>Phải sang tr&aacute;i</td>
                    </tr>
                    <tr>
                        <td>= += -= *= /= %=</td>
                        <td>Phải sang tr&aacute;i</td>
                    </tr>
                </tbody>
            </table>',
            'img'=>'NULL']
        ]);
        
    }
}
